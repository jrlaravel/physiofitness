<?php

namespace App\Http\Controllers;
use App\Models\Nav_link;
use App\Models\Banner_detail;
use App\Models\Blog_detail;
use App\Models\Member_detail;
use App\Models\Service_detail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function navbar()
    {
        $Nav_links = Nav_link::all();
        return response()->json($Nav_links);
    }

    public function home_banner()
    {
        $home_banner = Banner_detail::all();
        return response()->json($home_banner);
    }
    public function blog_list()
    {
        $blog = Blog_detail::all();
        return response()->json($blog);
    }
    public function service()
    {
        $service = Service_detail::all();
        return response()->json($service);
    }
    public function team_member()
    {
        $member = Member_detail::all();
        return response()->json($member);
    }



public function store(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'age' => 'required|integer|min:0',
        'message' => 'nullable|string|max:1000',
    ]);

    // If validation fails, return a JSON response with errors
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    // Attempt to create the appointment record
    try {
        $appointment = Appointment::create($request->only(['name', 'email', 'phone', 'age', 'message']));
        
        // Return a success JSON response
        return response()->json([
            'success' => true,
            'message' => 'Appointment created successfully!',
            'data' => $appointment
        ], 201);

    } catch (\Exception $e) {
        // Return an error JSON response if creation fails
        return response()->json([
            'success' => false,
            'message' => 'Failed to create appointment',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function updateStatus($id, Request $request)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->status = $request->status;
    if ($appointment->save()) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false], 500);
    }
}
}
