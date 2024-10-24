<?php

namespace App\Http\Controllers;

use App\Models\OrderShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductSpecification;
use App\Models\ProductFeature;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\OrderStatus;
use App\Models\OrderTracking;
use App\Models\Brand;
use App\Models\Wishlist;
use App\Models\Enquiry;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\ShippingAddress;
use App\Models\EnquiryMessages;
use App\Models\EnquiryAttachments;

class AdminEnquiryController extends Controller
{
    //
    public function inquiriesIndex(Request $request)
    {
        if ($request->has('inquiryid')) {
            $inquiry = Enquiry::where('id', $request->inquiryid)
                ->with(['enquiryMessage.enquiryAttachments', 'user', 'enquiryMessage.source', 'enquiryMessage.sourceFrom'])
                ->first();  // Retrieve the first matching record
            return response()->json([
                'inquiry' => $inquiry,
                'status' => 200,
                'id' => $request->inquiryId
            ]);
        }

        $inquiries = Enquiry::with(['enquiryMessage.enquiryAttachments', 'user', 'enquiryMessage.source', 'enquiryMessage.sourceFrom'])
            ->get();
        return response()->json([
            'inquiries' => $inquiries,
            'status' => 200,
        ]);
    }

    public function enquiryMessageCreate(Request $request)
    {
        $files = $request->file('files'); // Retrieve the files

        // Create the enquiry message
        $enquiryMessage = EnquiryMessages::create([
            'enquiry_id' => $request->inquiryid,
            'message' => $request->inquirymessage,
            'source_id' => Auth::user()->id,
            'source_from' => Auth::user()->id,
        ]);

        // Check if files are provided and process each file
        if ($files && is_array($files)) {
            foreach ($files as $file) {
                // Move the file to the public/enquiry directory
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('enquiry'), $fileName);
                $path = 'enquiry/' . $fileName; // File path to be stored in the database

                // Save the file information in EnquiryAttachments table
                EnquiryAttachments::create([
                    'enquirymessage_id' => $enquiryMessage->id,
                    'filepath' => $path,
                    'filetype' => $file->getClientMimeType(), // Get the MIME type of the file
                ]);
            }
        }

        // Return success response
        if ($enquiryMessage) {
            return response()->json([
                'status' => 200,
                'message' => 'Message sent successfully',
                'enquiryMessage' => $enquiryMessage,
            ]);
        }

        // Return error response if the message creation failed
        return response()->json([
            'status' => 400,
            'message' => 'Failed to send message',
        ]);
    }
}
