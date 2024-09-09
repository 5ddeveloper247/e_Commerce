<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function makePayment(Request $request)
    {

        Log::info("hello are you here");

        try {
            // Set Stripe secret API key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create the charge
            $charge = Charge::create([
                'amount' => $request->amount * 100, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment of Ecommerce ',
            ]);

            // Log the charge response
            Log::info('Payment response:', [
                'id' => $charge->id,
                'amount' => $charge->amount / 100,
                'currency' => $charge->currency,
                'status' => $charge->status,
                'description' => $charge->description,
                'receipt_url' => $charge->receipt_url,
                'created_at' => $charge->created,
            ]);

            Log::info("hello");
            // Return JSON response
            return response()->json([
                'success' => true,
                'transaction_id' => $charge->id,
                'paymentResponse' => $charge
            ]);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Payment exception: ' . $e->getMessage());
            // Return JSON error response
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
