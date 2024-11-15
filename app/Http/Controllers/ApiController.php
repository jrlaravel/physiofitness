<?php

namespace App\Http\Controllers;


use App\Mail\AppointmentCreated;
use Illuminate\Support\Facades\Mail;
use App\Models\Nav_link;
use App\Models\Banner_detail;
use App\Models\Blog_detail;
use App\Models\Member_detail;
use App\Models\Service_detail;
use App\Models\Appointment;
use App\Models\Testimonial;
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
    public function testimonial()
    {
        $testimonial = Testimonial::all();
        return response()->json($testimonial);
    }

    
    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'age' => 'required|integer|min:0',
            'message' => 'nullable|string|max:1000',
            'g-recaptcha-response' => 'required|string', // reCAPTCHA token
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Verify reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey = env('RECAPTCHA_SECRET_KEY');
        $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    
        $client = new \GuzzleHttp\Client();
        $response = $client->post($verifyUrl, [
            'form_params' => [
                'secret' => $secretKey,
                'response' => $recaptchaResponse,
            ],
        ]);
    
        $verification = json_decode((string) $response->getBody(), true);
    
        if (!$verification['success'] || $verification['score'] < 0.5) {
            return response()->json([
                'success' => false,
                'message' => 'reCAPTCHA verification failed'
            ], 400);
        }
    
        // Proceed to create the appointment
        try {
            $appointment = Appointment::create($request->only(['name', 'email', 'phone', 'age', 'message']));
    
            try {
                Mail::to('jrlaravel.digieagleinc@gmail.com')->send(new AppointmentCreated($appointment));
    
                return response()->json([
                    'success' => true,
                    'message' => 'Appointment created and email sent successfully!',
                    'data' => $appointment
                ], 201);
    
            } catch (\Exception $mailException) {
                $appointment->delete(); // Clean up if email fails
    
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send email',
                    'error' => $mailException->getMessage()
                ], 500);
            }
    
        } catch (\Exception $e) {
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
