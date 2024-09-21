<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class NewsLetterController extends Controller
{
    //

    public function newsletterIndex(Request $request)
    {
        $pageTitle = "Newsletter";
        return view('admin.newsletter', compact('pageTitle'));
    }

    public function newLetterCreate(Request $request)
    {
        // Validation rules
        $rules = [
            'email' => 'required|email|unique:news_letters,email,' . $request->news_id
        ];

        // Check if it's an update or a new record
        if ($request->filled('news_id')) {
            $newsletter = Newsletter::find($request->news_id);

            if (!$newsletter) {
                return response()->json([
                    'status' => 404,
                    'message' => "Newsletter record not found."
                ]);
            }

            // Validate input for update operation
            $request->validate($rules);

            // Update existing record
            $newsletter->update(['email' => $request->email]);

            return response()->json([
                'status' => 200,
                'message' => "Operation completed successfully."
            ]);
        } else {
            // Validate input for create operation
            $rules['email'] = 'required|email|unique:news_letters';
            $request->validate($rules);

            // Create new record
            $newRecord = Newsletter::create(['email' => $request->email]);

            if ($newRecord) {
                return response()->json([
                    'status' => 200,
                    'message' => "You have been successfully subscribed to our newsletter."
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Failed to subscribe to our newsletter. Please try again."
                ]);
            }
        }
    }



    public function newsLetterListing(Request $request)
    {
        $newsletters = Newsletter::all();
        return response()->json([
            'newsletters' => $newsletters,
            'status' => 200,
            'total' => $newsletters->count()
        ]);
    }

    public function newsletterDelete(Request $request)
    {
        $newsletter = Newsletter::find($request->id);
        if ($newsletter) {
            $newsletter->delete();
            return response()->json([
                'status' => 200,
                'message' => "Newsletter deleted successfully."
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "Newsletter not found."
            ]);
        }
    }
}
