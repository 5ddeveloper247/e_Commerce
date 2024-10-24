<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs; 
use Exception;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    //
    public function contactIndex(Request $request)
    {
        $pageTitle = "Contact Us";
        return view('admin.contact_us', compact('pageTitle'));
    }


    public function storeOrUpdate(Request $request)
    {
        // Common validation rules
        $rules = [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'order_number' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'rma_number' => 'nullable|string|max:255',
            'comment' => 'required|string|max:255',
            'status' => 'nullable|in:on,off,0,1',
        ];

        // Add specific validation rule for 'reply' based on request
        if ($request->has('contact_id')) {
            $rules['reply'] = 'required|string|max:255';
        } else {
            $rules['reply'] = 'nullable|string|max:255';
        }

        // Validate the request
        $request->validate($rules);

        // Prepare data for insert or update
        $data = [
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email_address' => $request->email,
            'order_number' => $request->order_number,
            'company_name' => $request->company_name,
            'rma_number' => $request->rma_number,
            'comment' => $request->comment,
            'status' => $request->status == "on" ? 1 : 0,
            'reply' => $request->reply
        ];

        if ($request->has('contact_id')) {
            // Update existing record
            $contact = ContactUs::findOrFail($request->contact_id);
            $contact->update($data);

            try {
                // Prepare email content and send email
                $body = view('emails.contact_us', compact('data'))->render();  // Ensure compact uses variable name as string
                sendMail($request->full_name, $request->email, "E Commerce", "Contact Reply", $body);
            } catch (Exception $e) {
                Log::info("An error occurred while sending email on contact reply: " . $e->getMessage());
            }

            return response()->json(['message' => 'Contact updated successfully.', 'status' => 200]);
        } else {
            // Create a new contact record
            ContactUs::create($data);

            return response()->json(['message' => 'Contact created successfully.', 'status' => 200]);
        }
    }



    public function contactUsAjax(Request $request)
    {
        $contacts = ContactUs::all();
        $activeContact = ContactUs::where('status', 1)->count();
        $inactiveContact = ContactUs::where('status', 0)->count();
        return response()->json([
            'contacts' => $contacts,
            'active' => $activeContact,
            'inactive' => $inactiveContact,
            'total' => $contacts->count(),
            'status' => 200,
        ]);
    }


    public function getContactUsAjax(Request $request)
    {
        try {

            $contact = ContactUs::findOrFail($request->id);
            return response()->json([
                'message' => 'Contact fetched successfully',
                'status' => 200,
                'contact' => $contact
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => 'No contact found', 'status' => 404]);
        }
    }



    public function updateContactAjax(Request $request)
    {
        $contact = ContactUs::find($request->id);
        $contact->update([
            'status' => $request->status == "1" ? 1 : 0,
        ]);
        return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
    }
}
