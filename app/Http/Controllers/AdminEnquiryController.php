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




    public function createEnquiries(Request $request)
    {
        // Validate the incoming request
        $files = $request->file('files'); // Retrieve the files
        $request->validate([
            'enquiry_title' => 'required|string|max:255',
            'enquiry_fullName' => 'required|string|max:255',
            'enquiry_email' => 'required|email|max:255',
            'enquiry_phoneNumber' => 'required|numeric',
            'enquiry_user_to' => 'required|integer',
            'enquiry_description' => 'required|string|max:1000',
        ], [
            'enquiry_user_to.required' => "Please Select a user"
        ]);
        // Create a new enquiry
        $enquiry = Enquiry::create([
            'user_id' => $request->enquiry_user_to, // Authenticated user ID
            'title' => $request->enquiry_title,
            'name' => $request->enquiry_fullName,
            'email' => $request->enquiry_email,
            'phone' => $request->enquiry_phoneNumber,
            'description' => $request->enquiry_description,
            'status' => 1, // Status set to 1 (pending or active)
        ]);

        // Create an enquiry message
        $enquiryMessage = EnquiryMessages::create([
            'enquiry_id' => $enquiry->id,
            'message' => $request->enquiry_description,
            'source_id' => $request->enquiry_user_to,
            'source_from' => Auth::user()->id,
        ]);

        //Handle file uploads if files are provided
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

        // Check if enquiry was successfully created
        if ($enquiry) {
            return response()->json([
                'status' => 200,
                'message' => 'Enquiry created successfully',
                'enquiry' => $enquiry,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to create enquiry',
            ]);
        }
    }
}
