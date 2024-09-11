<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderStatus;


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
        // Validate the request input;

        // Find the order status based on the provided status name
        $orderStatus = OrderStatus::where('name', 'LIKE', $request->status)->first();

        // Check if the order status was found
        if ($orderStatus) {
            // Find the order by orderId
            $order = Order::find($request->orderId);

            // Check if the order was found
            if ($order) {
                // Update the status and save the order
                $order->status = $orderStatus->id;
                $order->save();

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
}
