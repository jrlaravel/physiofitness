<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
}
