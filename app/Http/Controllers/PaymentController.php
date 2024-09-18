<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\ShippingAddress;
use App\Models\OrderShippingAddress;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        try {
            $request->validate([
                'amount' => 'required',
                'shippingAddress' => 'required'

            ]);
            $comments = $request->comments;
            $shippingAddress = $request->shippingAddress;
            $amount = $request->amount;
            $response = $this->continueCheckout($shippingAddress, $comments, $amount);
            if ($response['status'] !== 200) {
                return response()->json([
                    'success' => false,
                    'error' => $response['message'],
                    'status' => $response['status'],
                    'message' => "Failed to create order: " . $response['message']
                ]);
            }

            if ($response['order_id']) {
                // Set Stripe secret API key
                Stripe::setApiKey(env('STRIPE_SECRET'));

                // Create the charge
                $charge = Charge::create([
                    'amount' => $request->amount * 100, // amount in cents
                    'currency' => 'usd',
                    'source' => $request->stripeToken,
                    'description' => 'Payment for Ecommerce order',
                    'receipt_email' => auth()->user()->email,
                    'metadata' => [
                        'order_id' => $response['order_id'],
                        'comments' => $comments,
                        'currency' => 'usd',
                        'name' => auth()->user()->name,
                        'email' => auth()->user()->email,
                        'userId' => auth()->user()->id
                    ],
                ]);

                if ($charge->status == "succeeded") {
                    // Update the order payment details
                    $orderPayment = OrderPayment::where('order_id', $response["order_id"])->first();
                    $orderPayment->transaction_id = $charge->id;
                    $orderPayment->response = json_encode($charge);
                    $orderPayment->transaction_status = 1;
                    $orderPayment->status = 1;
                    $orderPayment->date = now();
                    $orderPayment->save();


                    $cart = Cart::where('user_id', auth()->user()->id)
                        ->where('status', 0)
                        ->first();
                    $cart->status = 1;
                    $cart->save();
                    // Log the charge response
                    Log::info('Payment response:', [
                        'id' => $charge->id,
                        'amount' => $charge->amount / 100,
                        'currency' => $charge->currency,
                        'status' => $charge->status,
                        'description' => $charge->description,
                        'receipt_url' => $charge->receipt_url,
                        'created_at' => $charge->created,
                        'charge' => json_encode($charge)
                    ]);

                    // Return success response
                    return response()->json([
                        'success' => true,
                        'transaction_id' => $charge->id,
                        'paymentResponse' => $charge,
                        'status' => 200,
                        'receipt_url' => $charge->receipt_url,
                        'message' => "Congratulations! Payment succeeded, and order record has been created successfully. You can view your receipt <br> <a href='" . $charge->receipt_url . "' target='_blank'>here</a>."
                    ]);
                } else {
                    // Return error if charge fails
                    $orderPayment = OrderPayment::where('order_id', $response["order_id"])->first();
                    $orderPayment->transaction_id = $charge->id ?? null;
                    $orderPayment->response = json_encode($charge);
                    $orderPayment->transaction_status = 0;
                    $orderPayment->status = 0;
                    $orderPayment->date = now();
                    $orderPayment->save();
                    return response()->json([
                        'success' => false,
                        'status' => 400,
                        'message' => "Payment failed: The charge could not be completed" . $charge->failure_message,
                        'error' => $charge->failure_message
                    ]);
                }
            }
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Payment exception: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'status' => 500,
                'error' => $e->getMessage(),
                'message' => "An error occurred during the payment process. Please try again later."
            ]);
        }
    }





    public function continueCheckout($shipping_Address, $comments, $amount)
    {

        try {
            //Extract request parameters
            $shippingAddress = $shipping_Address;
            $orderComments = $comments;
            $userId = auth()->user()->id;
            // Check if the authenticated user is the same as the provided user ID
            if (!$userId) {
                return [
                    'message' => 'Unauthorized: Invalid user',
                    'status' => 401
                ];
            }
            // Ensure shipping address and user ID are provided
            if (!$shippingAddress || !$userId) {
                return [
                    'message' => 'Bad request: Missing required parameters',
                    'status' => 400
                ];
            }

            // Fetch the active shipping address
            $shippingAddressActive = ShippingAddress::find($shippingAddress);
            if (!$shippingAddressActive) {
                return [
                    'message' => 'Shipping address not found',
                    'status' => 404
                ];
            }

            // Fetch user's cart
            $cart = Cart::where('user_id', auth()->user()->id)
                ->where('status', 0)
                ->first();

            if (!$cart) {
                return [
                    'message' => 'Cart not found',
                    'status' => 404
                ];
            }

            // Create a new order
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->date = now();
            $order->status = 1;
            $order->comments = $orderComments;
            $order->save();

            // Fetch cart details and create corresponding order details
            $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
            if ($cartDetails->isEmpty()) {
                return [
                    'message' => 'No items found in the cart',
                    'status' => 400
                ];
            }
            foreach ($cartDetails as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item->product_id;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->price = $item->price;
                $orderDetail->total_amount = $item->total_amount;
                $orderDetail->discounted_price = $item->discounted_price;
                $orderDetail->save();
            }

            // Create a new order shipping address
            $orderShippingAddress = new OrderShippingAddress();
            $orderShippingAddress->order_id = $order->id;
            $orderShippingAddress->shipping_address_id = $shippingAddressActive->id;
            $orderShippingAddress->name = $shippingAddressActive->name;
            $orderShippingAddress->email = $shippingAddressActive->email;
            $orderShippingAddress->phone_number = $shippingAddressActive->phone_number;
            $orderShippingAddress->address = $shippingAddressActive->address;
            $orderShippingAddress->country_id = $shippingAddressActive->country_id;
            $orderShippingAddress->city_id = $shippingAddressActive->city_id;
            $orderShippingAddress->state_id = $shippingAddressActive->state_id;
            $orderShippingAddress->save();


            // Create order payment
            $orderPayment = new OrderPayment();
            $orderPayment->order_id = $order->id;
            $orderPayment->user_id = auth()->user()->id;
            $orderPayment->amount = $amount;
            $orderPayment->transaction_id = null;
            $orderPayment->response = null;
            $orderPayment->transaction_status = 0;
            $orderPayment->status = 0;  // Payment pending
            $orderPayment->date = now();  // Payment pending
            $orderPayment->save();

            // Return success response
            return [
                'message' => 'Order successfully created',
                'status' => 200,
                'order_id' => $order->id
            ];
        } catch (\Exception $e) {
            // Handle exceptions and return error response
            return [
                'message' => 'An error occurred while creating order record, please contact to support',
                'status' => 500
            ];
        }
    }



    public function paymentIndex()
    {
        $pageTitle = "Payments";
        return view('admin.payments', compact('pageTitle'));
    }
}
