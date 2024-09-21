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
use App\Models\Enquiry;
use App\Models\EnquiryMessages;
use App\Models\EnquiryAttachments;


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
        $inactive = User::where('status', 0)->where('role', 2)->count();
        $active = User::where('status', 1)->where('role', 2)->count();
        return response()->json([
            'users' => $usersListingRecord,
            'count' => count($usersListingRecord),
            'status' => 200,
            'inactive' => $inactive,
            'active' => $active
        ]);
    }

    public function adminListingAjax(Request $request)
    {
        $adminsListingRecord = User::where('role', 1)->get();
        $active = User::where('role', 1)->where('status', 1)->count();
        $inactive = User::where('role', 1)->where('status', 0)->count();
        return response()->json([
            'admins' => $adminsListingRecord,
            'count' => count($adminsListingRecord),
            'status' => 200,
            'active' => $active,
            'inactive' => $inactive
        ]);
    }




    public function updateAdminAjax(Request $request)
    {
        // Define validation rules based on whether the 'id' exists (update) or not (create)
        if (!$request->filled('id')) {
            // Creating a new admin
            $rules = [
                'admin_name' => 'required|string|max:15',
                'admin_email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email'), // Email must be unique when creating a new admin
                ],
                'admin_password' => [
                    'required',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // Password requirements
                ],
                'admin_confirm_password' => 'required|same:admin_password', // Must confirm the password
                'admin_status' => 'required|integer|in:0,1'
            ];
        } else {
            // Updating an existing admin
            $rules = [
                'id' => 'required|integer|exists:users,id',
                'admin_name' => 'required|string|max:15',
                'admin_email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($request->id), // Ignore current admin's email for uniqueness
                ],
                'admin_status' => 'required|integer|in:0,1'
            ];
            // If the password is provided during update, validate it
            if ($request->filled('admin_password')) {
                $rules['admin_password'] = [
                    'nullable',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // Password requirements
                ];
                $rules['admin_confirm_password'] = 'nullable|same:admin_password'; // Must confirm the password
            }
            if ($request->admin_password !== null) {
                if ($request->admin_confirm_password == null || $request->admin_confirm_password == '') {
                    return response()->json([
                        'message' => 'Confirm password is required',
                        'status' => 422,
                        'errors' => [
                            'admin_confirm_password' => [
                                'Confirm password is required'
                            ]
                        ]
                    ], 422);
                }
            }
        }
        // Custom messages for validation errors
        $messages = [
            'admin_password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
            'admin_confirm_password.same' => 'Password confirmation must match the password.',
        ];
        // Validate the incoming request data
        $validatedData = $request->validate($rules, $messages);

        try {
            // Check if we are updating an existing user or creating a new one
            if ($request->filled('id')) {
                // Update the existing user
                $user = User::find($validatedData['id']);
                if ($user) {
                    $user->username = $validatedData['admin_name'];
                    $user->email = $validatedData['admin_email'];

                    // Update password only if provided
                    if (!empty($validatedData['admin_password'])) {
                        $user->password = Hash::make($validatedData['admin_password']);
                    }

                    $user->status = $validatedData['admin_status'];
                    $user->save();

                    // Return success response
                    return response()->json(['message' => 'Admin updated successfully', 'status' => 200]);
                } else {
                    return response()->json(['message' => 'User not found', 'status' => 404]);
                }
            } else {
                // Create a new admin
                $user = new User();
                $user->username = $validatedData['admin_name'];
                $user->email = $validatedData['admin_email'];
                $user->password = Hash::make($validatedData['admin_password']);
                $user->status = $validatedData['admin_status'];
                $user->role = 1; // 0 for super admin, 1 for admin, 2 for user
                $user->save();

                // Return success response
                return response()->json(['message' => 'Admin created successfully', 'status' => 200]);
            }
        } catch (Exception $e) {
            Log::error('Error updating or creating admin: ' . $e->getMessage());
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }



    //updateUserAjax
    public function updateUserAjax(Request $request)
    {
        // Define validation rules based on the presence of the 'id' field
        if (!$request->filled('id')) {
            // Creating a new admin
            $rules = [
                'user_name' => 'required|string|max:15',
                'user_email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email'), // Email must be unique when creating a new admin
                ],
                'user_password' => [
                    'required',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // Password requirements
                ],
                'user_confirm_password' => 'required|same:user_password', // Must confirm the password
                'user_status' => 'required|integer|in:0,1'
            ];
        } else {
            // Updating an existing admin
            $rules = [
                'id' => 'required|integer|exists:users,id',
                'user_name' => 'required|string|max:15',
                'user_email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($request->id), // Ignore current admin's email for uniqueness
                ],
                'user_status' => 'required|integer|in:0,1'
            ];
            // If the password is provided during update, validate it
            if ($request->filled('user_password')) {
                $rules['user_password'] = [
                    'nullable',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', // Password requirements
                ];
                $rules['user_confirm_password'] = 'nullable|same:user_password'; // Must confirm the password
            }
            if ($request->user_password !== null) {
                if ($request->user_confirm_password == null || $request->user_confirm_password == '') {
                    return response()->json([
                        'message' => 'Confirm password is required',
                        'status' => 422,
                        'errors' => [
                            'user_confirm_password' => [
                                'Confirm password is required'
                            ]
                        ]
                    ], 422);
                }
            }
        }
        // Custom messages for validation errors
        $messages = [
            'user_password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
            'user_confirm_password.same' => 'Password confirmation must match the password.',
        ];
        // Validate the incoming request data
        $validatedData = $request->validate($rules, $messages);


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
            'logo' => 'nullable|mimes:jpg,jpeg,png,gif,bmp,svg,webp|max:10240', // 10 MB for logo
            'phone' => 'required|regex:/^[0-9]{9,15}$/|max:15|min:9',
            'email' => 'required|email|max:50',
            'address' => 'required|string|max:255',
            'website_name' => 'required|string|max:50',
            'banner_heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'banner_images.*' => 'mimes:jpg,jpeg,png,gif,bmp,svg,webp|max:10240', // 10 MB for banner images
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
                    if ($siteSetting->logo && file_exists(public_path($siteSetting->logo))) {
                        unlink(public_path($siteSetting->logo)); // Remove the old logo from public directory
                    }

                    // Store the new logo directly in the public directory
                    $logo = $request->file('logo');
                    $logoName = time() . '_' . $logo->getClientOriginalName();
                    $logoPath = 'public/logo/' . $logoName;

                    // Move the new logo to public/logo directory
                    $logo->move(public_path('logo'), $logoName);

                    // Update the SiteSetting record with the new logo path
                    $siteSetting->update(['logo' => $logoPath]);
                }

                // Handle banner images
                if ($request->hasFile('banner_images')) {
                    foreach ($request->banner_images as $photo) {
                        $photoName = time() . '_' . $photo->getClientOriginalName();
                        $photoPath = 'public/banner_images/' . $photoName;

                        // Move each banner image to the public/banner_images directory
                        $photo->move(public_path('banner_images'), $photoName);

                        // Save the new banner image path in the SiteSettingsFiles table
                        SiteSettingsFiles::create([
                            'settings_id' => $siteSetting->id,
                            'file_path' => $photoPath,
                        ]);
                    }
                }
            } else {
                // Create a new SiteSetting record if it doesn't exist
                $siteSetting = SiteSetting::create([
                    'logo' => $request->hasFile('logo') ? 'public/logo/' . time() . '_' . $request->file('logo')->getClientOriginalName() : null,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'website_name' => $request->website_name,
                    'banner_heading' => $request->banner_heading,
                    'sub_heading' => $request->sub_heading,
                ]);

                // Move the logo to the public directory if provided
                if ($request->hasFile('logo')) {
                    $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
                    $request->file('logo')->move(public_path('logo'), $logoName);
                    $siteSetting->update(['logo' => 'public/logo/' . $logoName]);
                }

                // Handle banner images upload for the new record
                if ($request->hasFile('banner_images')) {
                    foreach ($request->file('banner_images') as $photo) {
                        $photoName = time() . '_' . $photo->getClientOriginalName();
                        $photoPath = 'public/banner_images/' . $photoName;

                        // Move each banner image to the public/banner_images directory
                        $photo->move(public_path('banner_images'), $photoName);

                        // Save the new banner image path in the SiteSettingsFiles table
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
            'active' => Category::where('status', 1)->count(),
            'inactive' => Category::where('status', 0)->count(),
            'status' => 200
        ]);
    }


    public function updateCategoryAjax(Request $request)
    {
        // Define initial validation rules
        if ($request->has('id') && !is_null($request->id)) {
            // When updating an existing category
            $rules = [
                'id' => 'required|integer|exists:categories,id', // 'id' must be an integer and exist in the 'categories' table
                'category_name' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:categories,category_name,' . $request->id . ',id' // Unique validation, excluding the current record
                ],
                'category_description' => 'required|string|max:255',
                'category_status' => 'required|integer|in:0,1'
            ];
        } else {
            // When creating a new category
            $rules = [
                'category_name' => [
                    'required',
                    'string',
                    'max:50',
                    'unique:categories,category_name' // Unique validation across all records
                ],
                'category_description' => 'required|string|max:255',
                'category_status' => 'required|integer|in:0,1'
            ];
        }

        // Validate the incoming request data
        $validatedData = $request->validate($rules);

        try {
            // Check if we are updating an existing category or creating a new one
            if ($request->has('id') && !is_null($request->id)) {
                // Find the category by ID
                $category = Category::find($validatedData['id']);
                if ($category) {
                    // Update category details
                    $category->category_name = $validatedData['category_name'];
                    $category->description = $validatedData['category_description'];
                    $category->status = $validatedData['category_status'];
                    $category->save();

                    // Return success response for update
                    return response()->json(['message' => 'Category updated successfully', 'status' => 200]);
                } else {
                    // Category not found
                    return response()->json(['message' => 'Category not found', 'status' => 404]);
                }
            } else {
                // Create a new category if 'id' is not present
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
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500, 'errorx' => $e]);
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


    public function enquiryIndex(Request $request)
    {
        $pageTitle = 'Enquiries';
        return view('admin.enquiry_listing', compact('pageTitle'));
    }



   
}
