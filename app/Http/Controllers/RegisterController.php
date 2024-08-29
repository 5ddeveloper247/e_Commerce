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
use App\Models\Country;
use App\Models\States;
use App\Models\City;


class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // Use dependency injection to bring in the PaymentEncode class
    public function __construct() {}

    public function register(Request $request)
    {
        $data['pageTitle'] = 'Register';
        return view('website/register')->with($data);
    }

    public function forget_password(Request $request)
    {
        $data['pageTitle'] = 'Forget Password';
        return view('website/forget_password')->with($data);
    }

    public function getRegisterPageData(Request $request){

        $data['countries'] = Country::where('status', '1')->get();
        
        return response()->json(['status' => 200, 'message' => "",'data' => $data]);
    }

    public function getSpecificStates(Request $request){

        $data['states'] = States::where('country_id', $request->country_id)->where('status', '1')->get();
        $data['cities'] = City::where('country_id', $request->country_id)->where('status', '1')->get();
        
        return response()->json(['status' => 200, 'message' => "",'data' => $data]);
    }

    public function getSpecificCities(Request $request){

        $data['cities'] = City::where('state_id', $request->state_id)->orWhere('country_id', $request->country_id)->where('status', '1')->get();
        
        return response()->json(['status' => 200, 'message' => "",'data' => $data]);
    }

    public function saveUserData(Request $request){
        
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                'max:100',
                'unique:users',
                'regex:/^[\w.%+-]+@[A-Za-z0-9.-]+\.[A-Z]{2,}$/i'
            ],
            'phone_number' => 'required|numeric|digits_between:7,18',
            'company_name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'zipcode' => 'required|string|max:50',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                'confirmed'
            ],
            'recaptcha' => 'required',
        ], [
            'recaptcha.required' => '"I am not a robot" check first.',
            'email.regex' => 'The email must be a valid email address with a proper domain.',
            'password_confirmation.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]); 
        
        $user = new User();
        $user->username = $request->first_name. ' ' .$request->last_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = '2';
        $user->email = $request->email;
        $user->status = '1';
        $user->company_name = $request->company_name;
        $user->address = $request->address;
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->zip_code = $request->zipcode;
        $user->password= bcrypt($request->password);
        $user->save();

        return response()->json(['status' => 200, 'message' => 'User registration successfully completed, now login with your email and password.']);
        
    }

    public function login(Request $request)
    {
        $data['pageTitle'] = 'Login';
        return view('website/sign_in')->with($data);
    }

    public function loginSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 2) {
                if ($user->status == 1) {
                    $request->session()->put('user', $user);
                    // Authentication passed...
                    return redirect()->intended('/home');
                } else {
                    $request->session()->flash('error', 'The user is not active, please contact admin.');
                    return redirect('login');
                }
            } else {
                $request->session()->flash('error', 'The provided credentials do not match our records.');
                return redirect('login');
            }
        }
        $request->session()->flash('error', 'The provided credentials do not match our records.');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    
    public function verifyEmailForget(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where("email", $request->email)->where('role', '2')->first();
        
        if(!$user){
            return response()->json(['status' => 402, 'message' => "The selected email is invalid."]);
        }else{
            $mailData = [];
            $otp = implode('', array_map(function() {
                return mt_rand(0, 9);
            }, range(1, 5)));
            $user->otp = $otp;
            $user->otp_created_at = date('Y-m-d H:i:s');
            $user->save();

            $mailData['otp'] = $otp;
            $mailData['username'] = $user->first_name;
            $body = view('emails.forgot_password', $mailData);
            $userEmailsSend[] = $user->email;
            
            sendMail($user->first_name, $userEmailsSend, 'E-commerce', 'Password Reset Request', $body);
        }
        
        return response()->json(['status' => 200, 'message' => 'One Time Password (OTP) successfully send to your given email address.']);
    }

    public function verifyOtpForget(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'otp' => 'required',
        ]);

        $user = User::where("email", $request->email)->where('role', '2')->first();
        
        if($user){
            if($request->otp == $user->otp){
                
                return response()->json(['status' => 200, 'message' => 'One Time Password (OTP) successfully send to your given email address.']); 
            }else{
                return response()->json(['status' => 402, 'message' => "OTP is not valid."]);
            }
        }else{
            return response()->json(['status' => 402, 'message' => "Something went wrong."]);
        }
    }

    public function changePassForget(Request $request){
        
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users',
            'otp' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                'confirmed'
            ],
        ], [
            'password_confirmation.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);

        $user = User::where("email", $request->email)->where('role', '2')->first();
        
        if($user){
            if($request->otp == $user->otp){

                $user->password = bcrypt($request->password);
                $user->otp = null;
                $user->otp_created_at = null;
                $user->save();

                return response()->json(['status' => 200, 'message' => 'Password change successfully, now login with your new email and password.']); 
            }else{
                return response()->json(['status' => 402, 'message' => "Something went wrong."]);
            }
        }else{
            return response()->json(['status' => 402, 'message' => "Something went wrong."]);
        }
    }
}
