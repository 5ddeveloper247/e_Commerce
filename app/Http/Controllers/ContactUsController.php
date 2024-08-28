<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Exception;

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
        // Validate the request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'order_number' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'rma_number' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);
        // Check if 'contact_id' is present in the request
        if ($request->has('contact_id')) {
            // Update existing record
            $contact = ContactUs::findOrFail($request->contact_id);
            $contact->update($request->all());
            return response()->json(['message' => 'Contact updated successfully.', 'status' => 200]);
        } else {
            // Create a new contact record
            ContactUs::create($request->all());
            return response()->json(['message' => 'Contact created successfully.', 'status' => 201]);
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
}
