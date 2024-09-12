<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderShippingAddress;
use App\Models\OrderTracking;


class OrderController extends Controller
{
    //

    public function orderIndex(Request $request)
    {
        $pageTitle = "Orders";
        return view('admin.orders', compact('pageTitle'));
    }
    public function orderListing(Request $request)
    {
        if ($request->has("order_id")) {
            // Fetch the single order with the specified order_id
            $order = Order::where('id', $request->order_id)
                ->with(['user', 'orderDetails.product.productImages', 'shippingAddress', 'orderPayment', 'status']) // Load relationships
                ->first(); // Get the first record (which will be only one since order_id is unique)

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found',
                    'status' => 404,
                    'order' => $order
                ]);
            }

            // Return response for single order
            return response()->json([
                'order' => $order,
                'status' => 200,
            ]);
        } else {
            // Fetch all orders for the logged-in user with status = 1
            $orders = Order::with(['user', 'orderDetails.product.productImages', 'shippingAddress', 'orderPayment', 'status']) // Load relationships
                ->get();

            // Return response for multiple orders
            return response()->json([
                'orders' => $orders,
                'status' => 200,
                'count' => $orders->count(),
            ]);
        }
    }

    public function orderStatus(Request $request)
    {
        $orderStatus = OrderStatus::where('name', 'LIKE', $request->status)->first();
        if ($orderStatus) {
            // Find the order by orderId
            $order = Order::find($request->orderId);
            // Check if the order was found
            if ($order) {
                // Update the status and save the order
                if ($orderStatus->name == "Refund Cancel") {

                    $orderTracking = OrderTracking::create([
                        'order_id' => $order->id,
                        'status_id' => $order->status,
                        'source' => Auth::user()->role,  // Source could be user/admin
                        'source_id' => Auth::user()->id, // Authenticated user ID
                    ]);

                    $order->status = 1;
                    $order->save();
                    $orderTracking = OrderTracking::create([
                        'order_id' => $order->id,
                        'status_id' => 1,
                        'source' => Auth::user()->role,  // Source could be user/admin
                        'source_id' => Auth::user()->id, // Authenticated user ID
                    ]);
                } else {
                    $order->status = $orderStatus->id;
                    $order->save();
                }

                if ($request->has('trackingId')) {
                    $shippingAddress = OrderShippingAddress::where('order_id', $request->orderId)->first();
                    if ($shippingAddress) {
                        $shippingAddress->tracking_id = $request->trackingId;
                        $shippingAddress->save();
                    }
                }
                $orderTracking = OrderTracking::create([
                    'order_id' => $order->id,
                    'status_id' => $orderStatus->id,
                    'source' => Auth::user()->role,  // Source could be user/admin
                    'source_id' => Auth::user()->id, // Authenticated user ID
                ]);


                return response()->json([
                    'order' => $order,
                    'status' => 200,
                    'message' => 'Status updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Order not found',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Order status not found',
            ], 404);
        }
    }



    public function refundIndex(Request $rquest)
    {
        $pageTitle = "Refunds";
        return view('admin.order_refund', compact('pageTitle'));
    }
}
