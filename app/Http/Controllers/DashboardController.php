<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\EnquiryMessages;
use App\Models\EnquiryAttachments;
use App\Models\OrderPayment;

class DashboardController extends Controller
{
    //

    public function getDashboard(Request $request)
    {
        // Get the counts of orders, users, and products
        $ordersCount = Order::count();
        $usersCount = User::count();
        $productsCount = Product::count();
        $productsPublished=Product::where('status',1)->count();
        $productsUnpublished=Product::where('status',0)->count();
        $productsDiscounted=Product::where('is_offered',1)->count();

        // Sum the 'amount' field from the OrderPayment model
        $totalAmount = OrderPayment::where('transaction_status', 1)->sum('amount');

        // Convert totalAmount to a human-readable format (e.g., 100K, 2M, 1Cr)
        $formattedTotalAmount = $this->formatAmount($totalAmount);

        // Return as JSON
        return response()->json([
            'ordersCount' => $ordersCount,
            'usersCount' => $usersCount,
            'productsCount' => $productsCount,
            'totalAmount' => $formattedTotalAmount, // Formatted amount
            'productsPublished' => $productsPublished,
            'productsUnpublished' => $productsUnpublished,
            'productsDiscounted' => $productsDiscounted,
            'status' => 200, // Success status code
        ]);
    }

    // Helper function to format the amount into K, M, Cr
    private function formatAmount($amount)
    {
        if ($amount >= 10000000) {
            // Convert to Crore (Cr)
            return round($amount / 10000000, 1) . ' Cr';
        } elseif ($amount >= 100000) {
            // Convert to Lakh (if needed, or adjust for different units)
            return round($amount / 100000, 1) . ' L';
        } elseif ($amount >= 1000) {
            // Convert to Thousand (K)
            return round($amount / 1000, 1) . ' K';
        } else {
            // Return amount as it is if less than 1000
            return $amount;
        }
    }


}
