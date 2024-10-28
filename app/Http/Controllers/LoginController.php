<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }    

    public function forget_password()
    {
        return view('forgotpass');
    }

    public function reset_password(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed', // The 'confirmed' rule requires a matching 'password_confirmation' field
        ]);
    
        // Check if the user exists in the database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email does not exist in our database.');
        }
    
        // Update the user's password in hashed format
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Redirect to the login page with success message
        return redirect()->route('login')->with('success', 'Password has been reset successfully. Please log in with your new password.');
    }
    
}
