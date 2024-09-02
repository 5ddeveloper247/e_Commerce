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
        //Validate the request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'order_number' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'rma_number' => 'required|string|max:255',
            'comment' => 'required|string|max:255',
            'status' => 'nullable|in:on,off,0,1',
            'reply' => 'nullable|string|max:255'
        ]);
        // Check if 'contact_id' is present in the request
        if ($request->has('contact_id')) {

            // Update existing record
            $contact = ContactUs::findOrFail($request->contact_id);
            $contact->update([
                $contact->full_name = $request->full_name,
                'phone_number' => $request->phone_number,
                'email_address' => $request->email,
                'order_number' => $request->order_number,
                'company_name' => $request->company_name,
                'rma_number' => $request->rma_number,
                'comment' => $request->comment,
                'status' => $request->status == "on" ? 1 : 0,
                'reply' => $request->reply,
            ]);
            return response()->json(['message' => 'Contact updated successfully.', 'status' => 200]);
        } else {
            // Create a new contact record
            ContactUs::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'email_address' => $request->email,
                'order_number' => $request->order_number,
                'company_name' => $request->company_name,
                'rma_number' => $request->rma_number,
                'comment' => $request->comment,
                'status' => $request->status == "on" ? 1 : 0,
            ]);
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
    public function updateContactAjax(Request $request)
    {
        $contact = ContactUs::find($request->id);
        $contact->update([
            'status' => $request->status == "1" ? 1 : 0,
        ]);
        return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
    }
}
