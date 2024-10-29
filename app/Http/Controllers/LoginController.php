<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    public function index()
    {   
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user(); // Get the authenticated user
            
            // Example: Store user data in session
            session()->put('admin', $user);
    
            // Redirect to the dashboard
            return redirect()->route('dashboard');
        }
    
        // If authentication fails, return back with an error message
        return back()->with('message', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');   
    }    

    public function forget_password()
    {
        return view('email-varification');
    }

    public function varifyEmail(Request $request)
    {   
        // Validate email input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Check if user exists
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            // Generate token
            $token = Str::random(60);
            
            // Insert token into password_reset_tokens table
            $res = DB::table('password_reset_tokens')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
            ]);
    
            if ($res) {
                // Attempt to send the reset password email
                try {
                    Mail::send('reset-password-link', ['token' => $token], function($message) use ($request) {
                        $message->to($request->email)->subject('Reset Password');
                    });
    
                    return back()->with('success    ', 'We have e-mailed your password reset link!');
                } catch (\Exception $e) {
                    return back()->with('error', 'Failed to send reset password link. Error: ' . $e->getMessage());
                }
            } else {
                return back()->with('error', 'Failed to generate reset token. Please try again.');
            }
        } else {
            return back()->with('error', 'User not found!');
        }
    }
    
    public function newpassword($token)
    {
        return view('forgotpass', ['token' => $token]);
    }

    public function reset_password(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);


        if($validator->passes()){
            $updatePassword = DB::table('password_reset_tokens')
                                ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                                ])
                                ->first();

            if(!$updatePassword){
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email', $request->email)
                        ->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
          
            return redirect()->route('login')->with('success', 'Your password has been changed!');
        }
        else{
            return back()->withInput()->withErrors($validator);
        }
    }
}
