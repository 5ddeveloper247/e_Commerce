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
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // Use dependency injection to bring in the PaymentEncode class
    public function __construct() {}

    public function login(Request $request)
    {
        $data['pageTitle'] = 'Login';
        return view('admin/login')->with($data);
    }

    public function loginSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 1 || $user->role == 0) {
                if ($user->status == 1) {
                    $request->session()->put('user', $user);
                    // Authentication passed...
                    return redirect()->intended('/admin/dashboard');
                } else {
                    $request->session()->flash('error', 'The user is not active, please contact admin.');
                    return redirect('/admin/login');
                }
            } else {
                $request->session()->flash('error', 'The provided credentials do not match our records.');
                return redirect('admin/login');
            }
        }
        $request->session()->flash('error', 'The provided credentials do not match our records.');
        return redirect('admin/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function dashboard(Request $request)
    {

        $data['pageTitle'] = 'Dashboard';
        return view('admin/dashboard')->with($data);
    }


    public function profileIndex(Request $request)
    {
        $pageTitle = 'Profile';
        $user = Auth::user();

        return view('admin/admin_profile', compact('user', 'pageTitle'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            // Define validation rules
            $rules = [
                'firstName' => ['required', 'min:8', 'max:15', 'regex:/^[A-Za-z]+$/'],
                'lastName' => ['required', 'min:8', 'max:15', 'regex:/^[A-Za-z]+$/'],
                'password' => [
                    'nullable',
                    'min:8',
                    'max:15',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,15}$/'
                ],
                'confirmPassword' => ['nullable', 'same:password']
            ];

            // Validate incoming request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Retrieve the authenticated user
            $authUser = Auth::user();

            if (!$authUser) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Fetch the user record based on email
            $user = User::where('email', $request->email)->first();

            // Update user details
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->username = $request->firstName . $request->lastName; // Correct concatenation syntax
            // Update password if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            // Save user record
            $user->save();
            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => $user,
                'status' => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Oops! Something went wrong, failed to update.',
                'error' => $e->getMessage() // Optional: Include error message for debugging purposes
            ], 500);
        }
    }


    //users listings

    public function userListing(Request $request)
    {
        $pageTitle = 'Users Listing';
        $usersListingRecord = User::where('role', 2)->get();
        $usersInactive = User::where('status', 0)->where('role', 2)->count();
        $usersActive = User::where('status', 1)->where('role', 2)->count();
        return view('admin.user_listing', compact('usersListingRecord', 'pageTitle', 'usersInactive', 'usersActive'));
    }

    public function adminListing(Request $request)
    {
        $pageTitle = 'Admins Listing';
        $adminsListingRecord = User::where('role', 1)->get();
        $adminsInactive = User::where('status', 0)->where('role', 1)->count();
        $adminsActive = User::where('status', 1)->where('role', 1)->count();

        return view('admin.admin_listing', compact('adminsListingRecord', 'pageTitle', 'adminsInactive', 'adminsActive'));
    }


    public function userListingAjax(Request $request)
    {
        $usersListingRecord = User::where('role', 2)->get();
        return response()->json([
            'users' => $usersListingRecord,
            'count' => count($usersListingRecord),
            'status' => 200
        ]);
    }

    public function adminListingAjax(Request $request)
    {
        $adminsListingRecord = User::where('role', 1)->get();
        return response()->json([
            'admins' => $adminsListingRecord,
            'count' => count($adminsListingRecord),
            'status' => 200
        ]);
    }


    public function updateAdminAjax(Request $request)
    {
        // Define validation rules based on the presence of the 'id' field
        $rules = [
            'id' => 'nullable|integer|exists:users,id', // If present, 'id' must be an integer and exist in the 'users' table
            'admin_name' => 'required|string|max:15',
            'admin_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($request->id), // If 'id' is present, ignore it while checking for unique emails
            ],
            'admin_password' => [
                'nullable',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            ],
            'admin_password_confirm' => 'nullable|same:admin_password',
            'admin_status' => 'required|integer|in:0,1'
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($rules);

        try {
            // Check if we are updating an existing user or creating a new one
            if ($request->has('id') && !is_null($request->id)) {
                // Find the user by ID
                $user = User::find($validatedData['id']);
                if ($user) {
                    // Update user details
                    $user->username = $validatedData['admin_name'];
                    $user->email = $validatedData['admin_email'];

                    // Update password only if provided
                    if (!empty($validatedData['admin_password'])) {
                        $user->password = Hash::make($validatedData['admin_password']);
                    }

                    $user->status = $validatedData['admin_status'];
                    $user->save();

                    // Return success response for update
                    return response()->json(['message' => 'Admin updated successfully', 'status' => 200]);
                } else {
                    // User not found
                    return response()->json(['message' => 'User not found', 'status' => 404]);
                }
            } else {
                // Create a new user if 'id' is not present
                $user = new User();
                $user->username = $validatedData['admin_name'];
                $user->email = $validatedData['admin_email'];
                $user->password = Hash::make($validatedData['admin_password']);
                $user->status = $validatedData['admin_status'];
                $user->role = 1; //0 for super admin 1 for admin 2 for user
                $user->save();

                // Return success response for creation
                return response()->json(['message' => 'Admin created successfully', 'status' => 200]);
            }
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error updating admin: ' . $e->getMessage());

            // Return server error response
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }


    //updateUserAjax
    public function updateUserAjax(Request $request)
    {
        // Define validation rules based on the presence of the 'id' field
        $rules = [
            'id' => 'nullable|integer|exists:users,id', // If present, 'id' must be an integer and exist in the 'users' table
            'user_name' => 'required|string|max:15',
            'user_email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($request->id), // If 'id' is present, ignore it while checking for unique emails
            ],
            'user_password' => [
                'nullable',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            ],
            'user_password_confirm' => 'nullable|same:user_password',
            'user_status' => 'required|integer|in:0,1'
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($rules);

        try {
            // Check if we are updating an existing user or creating a new one
            if ($request->has('id') && !is_null($request->id)) {
                // Find the user by ID
                $user = User::find($validatedData['id']);
                if ($user) {
                    // Update user details
                    $user->username = $validatedData['user_name'];
                    $user->email = $validatedData['user_email'];

                    // Update password only if provided
                    if (!empty($validatedData['user_password'])) {
                        $user->password = Hash::make($validatedData['user_password']);
                    }

                    $user->status = $validatedData['user_status'];
                    $user->save();

                    // Return success response for update
                    return response()->json(['message' => 'User updated successfully', 'status' => 200]);
                } else {
                    // User not found
                    return response()->json(['message' => 'User not found', 'status' => 404]);
                }
            } else {
                // Create a new user if 'id' is not present
                $user = new User();
                $user->username = $validatedData['user_name'];
                $user->email = $validatedData['user_email'];
                $user->password = Hash::make($validatedData['user_password']);
                $user->status = $validatedData['user_status'];
                $user->role = 2; //0 for super admin 1 for admin 2 for user
                $user->save();

                // Return success response for creation
                return response()->json(['message' => 'User created successfully', 'status' => 200]);
            }
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error updating user: ' . $e->getMessage());

            // Return server error response
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }



    public function deleteAdminAjax(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'User not found', 'status' => 404]);
        }
    }


    public function updateAdminStatusAjax(Request $request)
    {
        $id = $request->id;

        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Toggle the status: if 1, set to 0; if 0, set to 1
            $currentStatus = $user->status;
            $user->status = $currentStatus == 1 ? 0 : 1;

            // Save the updated user status
            $user->save();

            // Return success response
            return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
        } else {
            // Return error response if user not found
            return response()->json(['message' => 'User not found', 'status' => 404]);
        }
    }


    //site settings

    public function siteSettings(Request $request)
    {

        $data['pageTitle'] = 'Site Settings';
        $pageTitle = 'Site Settings';
        $siteSettings = SiteSetting::with('settingFiles')->first();

        return view('admin.settings.website_settings', compact('data', 'pageTitle', 'siteSettings'));
    }


    public function storeSiteSettingsAjax(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'required|regex:/^[0-9]{9,15}$/|max:15|min:9',
            'email' => 'required|email|max:50',
            'address' => 'required|string|max:255',
            'website_name' => 'required|string|max:50',
            'banner_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'property_photos' => 'nullable|array',
            'property_photos.*' => 'image|mimes:jpeg,png,ico|max:2048'
        ]);

        try {
            // Check if a SiteSetting record already exists
            $siteSetting = SiteSetting::first();

            if ($siteSetting) {
                // Update the existing SiteSetting record
                $siteSetting->update($validatedData);

                // Handle logo upload if a new logo is provided
                if ($request->hasFile('logo')) {
                    // Delete the old logo if it exists
                    if ($siteSetting->logo) {
                        Storage::disk('public')->delete($siteSetting->logo);
                    }

                    // Store the new logo
                    $logo = $request->file('logo');
                    $logoPath = $logo->store('logo', 'public');

                    // Update the SiteSetting record with the new logo path
                    $siteSetting->update(['logo' => $logoPath]);
                }

                // Handle property photos
                if ($request->hasFile('property_photos')) {
                    // Delete old photos if any
                    // $existingPhotos = SiteSettingsFiles::where('settings_id', $siteSetting->id)->get();
                    // foreach ($existingPhotos as $existingPhoto) {
                    //     Storage::disk('public')->delete($existingPhoto->file_path);
                    //     $existingPhoto->delete();
                    // }
                    // Upload and save new photos
                    foreach ($request->file('property_photos') as $photo) {
                        $photoName = time() . '_' . $photo->getClientOriginalName();
                        $photoPath = $photo->storeAs('property_photos', $photoName, 'public');

                        // Save each new photo path in the SiteSettingsFiles table
                        SiteSettingsFiles::create([
                            'settings_id' => $siteSetting->id,
                            'file_path' => $photoPath,
                        ]);
                    }
                }
            } else {
                // Create a new SiteSetting record if it doesn't exist
                $siteSetting = SiteSetting::create([
                    'logo' => $request->hasFile('logo') ? $request->file('logo')->store('logo', 'public') : null,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'website_name' => $request->website_name,
                    'banner_heading' => $request->banner_heading,
                    'sub_heading' => $request->sub_heading,
                ]);

                // Handle property photos upload for the new record
                if ($request->hasFile('property_photos')) {
                    foreach ($request->file('property_photos') as $photo) {
                        $photoName = time() . '_' . $photo->getClientOriginalName();
                        $photoPath = $photo->storeAs('property_photos', $photoName, 'public');

                        // Save each new photo path in the SiteSettingsFiles table
                        SiteSettingsFiles::create([
                            'settings_id' => $siteSetting->id,
                            'file_path' => $photoPath,
                        ]);
                    }
                }
            }

            return response()->json(['message' => 'Site settings saved successfully', 'status' => 200]);
        } catch (Exception $e) {
            Log::error('Error saving site settings: ' . $e->getMessage());
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }



    public function getSiteSettingsAjax(Request $request)
    {
        $siteSetting = SiteSetting::with('settingFiles')->first();
        if ($siteSetting) {
            return response()->json(['settings' => $siteSetting, 'status' => 200]);
        } {
            return response()->json(['message' => 'No site settings found', 'status' => 404]);
        }
    }


    public function settingsFileRemove(Request $request)
    {

        try {
            // Get the ID of the settings file to be removed from the request data
            $id = $request->input('id');
            $settingsFile = SiteSettingsFiles::find($id);
            if ($settingsFile) {
                Storage::disk('public')->delete($settingsFile->file_path);
                $settingsFile->delete();
                return response()->json(['message' => 'File removed successfully', 'status' => 200]);
            } else {
                return response()->json(['message' => 'File not found', 'status' => 404]);
            }
        } catch (Exception $e) {
            Log::error('Error removing settings file: ' . $e->getMessage());
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }




    //category


    public function categoryGet(Request $request)
    {
        $pageTitle = 'Categories';
        $data["pageTitle"] = "Categories";
        $categoriesListingRecord = Category::all();
        $categoryInactive = Category::where('status', 0)->count();
        $categoryActive = Category::where('status', 1)->count();
        return view('admin.category_listing', compact('data', 'pageTitle', 'categoriesListingRecord', 'categoryInactive', 'categoryActive'));
    }



    public function categoryListingAjax(Request $request)
    {
        $categoryListingRecord = Category::all();
        return response()->json([
            'category' => $categoryListingRecord,
            'count' => count($categoryListingRecord),
            'status' => 200
        ]);
    }


    public function updateCategoryAjax(Request $request)
    {

        // Define validation rules based on the presence of the 'id' field
        $rules = [
            'id' => 'nullable|integer|exists:users,id', // If present, 'id' must be an integer and exist in the 'users' table
            'category_name' => 'required|string|max:50|unique:categories,category_name',
            'category_description' => 'required|string|max:255',
            'category_status' => 'required|integer|in:0,1'
        ];

        // Validate the incoming request data
        $validatedData = $request->validate($rules);

        try {
            // Check if we are updating an existing user or creating a new one
            if ($request->has('id') && !is_null($request->id)) {
                // Find the user by ID
                $category = Category::find($validatedData['id']);
                if ($category) {
                    // Update user details
                    $category->category_name = $validatedData['category_name'];
                    $category->description = $validatedData['category_description'];
                    $category->status = $validatedData['category_status'];
                    $category->save();

                    // Return success response for update
                    return response()->json(['message' => 'Category updated successfully', 'status' => 200]);
                } else {
                    // User not found
                    return response()->json(['message' => 'Category not found', 'status' => 404]);
                }
            } else {
                // Create a new user if 'id' is not present
                $category = new Category();
                $category->category_name = $validatedData['category_name'];
                $category->description = $validatedData['category_description'];
                $category->status = $validatedData['category_status'];
                $category->save();

                // Return success response for creation
                return response()->json(['message' => 'Category created successfully', 'status' => 200]);
            }
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Error updating category: ' . $e->getMessage());

            // Return server error response
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }



    public function updateCategoryStatusAjax(Request $request)
    {
        $id = $request->id;

        // Find the user by ID
        $category = Category::find($id);


        if ($category) {
            // Toggle the status: if 1, set to 0; if 0, set to 1
            $currentStatus = $category->status;
            $category->status = $currentStatus == 1 ? 0 : 1;

            // Save the updated user status
            $category->save();

            // Return success response
            return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
        } else {
            // Return error response if user not found
            return response()->json(['message' => 'Category not found', 'status' => 404]);
        }
    }
}
