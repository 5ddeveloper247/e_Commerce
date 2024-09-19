<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //
    public function testimonialIndex(Request $request)
    {
        $pageTitle = "Testimonials";
        return view('admin.testimonials', compact('pageTitle'));
    }


    public function testimonialListing(Request $request)
    {
        $testimonials = Testimonial::all();
        $active = Testimonial::where('status', 1)->count();
        $inactive = Testimonial::where('status', 0)->count();
        if ($testimonials) {
            return response()->json([
                'status' => 200,
                'data' => $testimonials,
                'active' => $active,
                'inactive' => $inactive,
                'total' => $testimonials->count(),
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No testimonial found',
                'data' => $testimonials
            ]);
        }
    }



    public function createOrUpdate(Request $request)
    {
        // Validate request inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'designation' => 'nullable|string',
            'file' => 'nullable|mimes:jpeg,jpg,png,gif|max:10240', // only allow these file types and limit the size to 10 MB
            'testimonial_id' => 'nullable|exists:testimonials,id', // Ensure testimonial_id, if provided, exists in the database
        ]);

        // Handle file upload if present
        $mediaPath = $request->hasFile('file') ? $request->file('file')->store('testimonials', 'public') : null;

        // Determine the status
        $status = $request->has('status') ? 1 : 0;

        // Check if testimonial_id is provided, not null, and exists
        if (!is_null($validatedData['testimonial_id'])) {
            // Find the existing testimonial
            $testimonial = Testimonial::find($validatedData['testimonial_id']);

            if ($testimonial) {
                // Update existing testimonial
                $testimonial->update([
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'],
                    'designation' => $validatedData['designation'],
                    'mediaPath' => $mediaPath ?? $testimonial->mediaPath, // Update mediaPath only if a new file is uploaded
                    'status' => $status,
                ]);

                return response()->json([
                    'message' => 'Testimonial updated successfully',
                    'status' => 200,
                ]);
            } else {
                return response()->json([
                    'message' => 'Testimonial not found',
                    'status' => 404,
                ], 404);
            }
        } else {
            // Create a new testimonial
            $testimonial = Testimonial::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'designation' => $validatedData['designation'],
                'mediaPath' => $mediaPath,
                'status' => $status,
            ]);

            return response()->json([
                'message' => 'Testimonial added successfully',
                'status' => 200,
                'testimonial_id' => $testimonial->id,
            ]);
        }
    }




    public function testimonialDelete(Request $request)
    {
        $testimonial = Testimonial::find($request->id);
        if ($testimonial) {
            $testimonial->delete();
            return response()->json(['message' => 'Testimonial deleted successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Testimonial not found', 'status' => 404]);
        }
    }



    public function updateStatus(Request $request)
    {
        $id = $request->id;

        // Find the user by ID
        $testimonial = Testimonial::find($id);

        if ($testimonial) {
            // Toggle the status: if 1, set to 0; if 0, set to 1
            $currentStatus = $testimonial->status;
            $testimonial->status = $currentStatus == 1 ? 0 : 1;

            // Save the updated user status
            $testimonial->save();

            // Return success response
            return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
        } else {
            // Return error response if user not found
            return response()->json(['message' => 'Record not found', 'status' => 404]);
        }
    }
}
