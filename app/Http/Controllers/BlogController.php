<?php

namespace App\Http\Controllers;

use App\Models\Blog_detail;
use App\Models\Member_detail;
use App\Models\Service_detail;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog_detail::all();
        return view('blog-list', compact('blogs'));
    }

    public function store_blog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|max:255',  // Use 'sometimes' to allow partial updates
            'image_title' => 'sometimes|required|max:255',
            'description' => 'sometimes|required|max:255',
            'blog_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Check if this is an update
        if ($request->blog_id) {
            // Update existing blog
            $blog = Blog_detail::find($request->blog_id);
            
            if ($blog) {
                // Update only fields that are provided
                if ($request->has('blog_title')) {
                    $blog->title = $request->blog_title;
                }
    
                if ($request->has('image_title')) {
                    $blog->image_title = $request->image_title;
                }

                if ($request->has('description')) {
                    $blog->description = $request->description;
                }
    
                if ($request->hasFile('blog_image')) {
                    // Delete old image from local folder
                    if (file_exists(public_path('storage/blog/'.$blog->image))) {
                        unlink(public_path('storage/blog/'.$blog->image));
                    }
    
                    // Upload new image
                    $image = $request->file('blog_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/blog'), $imageName);
                    $blog->image = $imageName;
                }
    
                // Save the updated blog
                $blog->save();
                return back()->with('success', 'blog updated successfully.');
            }
        } else {
            // Create new blog
            $image = $request->file('blog_image');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/blog'), $imageName);
            }
    
            Blog_detail::create([
                'title' => $request->blog_title,
                'description' => $request->blog_description,
                'image_title' => $request->image_title, // Use null if image title is not provided
                'image' => isset($imageName) ? $imageName : null, // Use null if image is not provided
            ]);
            
            return back()->with('success', 'blog added successfully.');
        }
    }

    public function delete_blog($id)
    {
        $blog = Blog_detail::find($id);
        if ($blog) {
            // Delete image from local folder
            if (file_exists(public_path('storage/blog/'.$blog->image))) {
                unlink(public_path('storage/blog/'.$blog->image));
            }
            
            // Delete blog
            $blog->delete();
            return back()->with('success', 'blog deleted successfully.');
        } else {
            return back()->with('error', 'Blog not found.');
        }
    }

    public function service()
    {
        $services = Service_detail::all();
        return view('service-list',compact('services'));
    }

    public function store_service(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|max:255',  // Use 'sometimes' to allow partial updates
            'image_title' => 'sometimes|required|max:255',
            'description' => 'sometimes|required|max:255',
            'service_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        // Check if this is an update
        if ($request->service_id) {
            // Update existing service
            $service = Service_detail::find($request->service_id);
            
            if ($service) {
                // Update only fields that are provided
                if ($request->has('service_title')) {
                    $service->title = $request->service_title;
                }
    
                if ($request->has('image_title')) {
                    $service->image_title = $request->image_title;
                }

                if ($request->has('description')) {
                    $service->description = $request->description;
                }
    
                if ($request->hasFile('service_image')) {
                    // Delete old image from local folder
                    if (file_exists(public_path('storage/service/'.$service->image))) {
                        unlink(public_path('storage/service/'.$service->image));
                    }
    
                    // Upload new image
                    $image = $request->file('service_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/service'), $imageName);
                    $service->image = $imageName;
                }
    
                // Save the updated service
                $service->save();
                return back()->with('success', 'service updated successfully.');
            }
        } else {
            // Create new service
            $image = $request->file('service_image');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/service'), $imageName);
            }
    
            Service_detail::create([
                'title' => $request->service_title,
                'description' => $request->service_description,
                'image_title' => $request->image_title, // Use null if image title is not provided
                'image' => isset($imageName) ? $imageName : null, // Use null if image is not provided
            ]);
            
            return back()->with('success', 'service added successfully.');
        }
    }

    public function delete_service($id)
    {
        $service = Service_detail::find($id);
        if ($service) {
            // Delete image from local folder
            if (file_exists(public_path('storage/service/'.$service->image))) {
                unlink(public_path('storage/service/'.$service->image));
            }
            
            // Delete service
            $service->delete();
            return back()->with('success', 'service deleted successfully.');
        } else {
            return back()->with('error', 'Service not found.');
        }
    }
    public function team_member()
    {
        $members = Member_detail::all();
        return view('team-member-list', compact('members'));
    }

    public function store_team_member(Request $request)
    {
        // return $request->all();
        // Validate the request
        $validator = Validator::make($request->all(), [
            'member_name' => 'sometimes|required|max:255',  
            'member_designation' => 'sometimes|required|max:255',
            'member_description' => 'sometimes|required',
            'member_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Check if this is an update
        if ($request->member_id) {
            // Update existing member
            $member = Member_detail::find($request->member_id);
            
            if ($member) {
                // Update only fields that are provided
                if ($request->has('name')) {
                    $member->name = $request->name;
                }

                if ($request->has('designation')) {
                    $member->designation = $request->designation;
                }
    
                if ($request->has('description')) {
                    $member->description = $request->description;
                }
    
                if ($request->hasFile('member_image')) {
                    // Delete old image from local folder
                    if (file_exists(public_path('storage/member/'.$member->image))) {
                        unlink(public_path('storage/member/'.$member->image));
                    }
    
                    // Upload new image
                    $image = $request->file('member_image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/member'), $imageName);
                    $member->image = $imageName;
                }
    
                // Save the updated member
                $member->save();
                return back()->with('success', 'member updated successfully.');
            }
        } else {
            // Create new member
            $image = $request->file('member_image');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/member'), $imageName);
            }

    
            Member_detail::create([
                'name' => $request->member_title,
                'designation' => $request->member_designation,
                'description' => $request->member_description,
                'image' => isset($imageName) ? $imageName : null, // Use null if image is not provided
            ]);
            
            return back()->with('success', 'member added successfully.');
        }
    }

    public function delete_team_member($id)
    {
        $member = Member_detail::find($id);
        if ($member) {
            // Delete image from local folder
            if (file_exists(public_path('storage/member/'.$member->image))) {
                unlink(public_path('storage/member/'.$member->image));
            }
            
            // Delete member
            $member->delete();
            return back()->with('success', 'member deleted successfully.');
        } else {
            return back()->with('error', 'Member not found.');
        }
    }

    public function appointment()
    {
        $data = Appointment::all();
        return view('appointment',compact('data'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::all();
        return view('testimonial',compact('testimonials'));
    }

    public function store_testimonial(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'testimonial_name' => 'required|max:255',
            'testimonial_problem' => 'required|max:255',
            'testimonial_description' => 'required',
            'testimonial_video' => 'sometimes|file|mimes:mp4,mov,ogg,qt|max:20000', // Adjust max size if needed
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Check if this is an update
        if ($request->testimonial_id) {
            // Update existing testimonial
            $testimonial = Testimonial::find($request->testimonial_id);
    
            if ($testimonial) {
                // Update only fields that are provided
                $testimonial->name = $request->testimonial_name;
                $testimonial->problem = $request->testimonial_problem;
                $testimonial->review = $request->testimonial_description;
    
                // Handle video upload if provided
                if ($request->hasFile('testimonial_video')) {
                    // Delete the old video file if it exists
                    if (file_exists(public_path('storage/testimonial/'.$testimonial->video))) {
                        unlink(public_path('storage/testimonial/'.$testimonial->video));
                    }
    
                    // Upload the new video file
                    $video = $request->file('testimonial_video');
                    $videoName = time() . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('storage/testimonial'), $videoName);
                    $testimonial->video = $videoName;
                }
    
                // Save the updated testimonial
                $testimonial->save();
                return back()->with('success', 'Testimonial updated successfully.');
            }
        } else {
            // Create new testimonial
            $videoName = null;
            if ($request->hasFile('testimonial_video')) {
                $video = $request->file('testimonial_video');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('storage/testimonial'), $videoName);
            }
    
            Testimonial::create([
                'name' => $request->testimonial_name,
                'problem' => $request->testimonial_problem,
                'review' => $request->testimonial_description,
                'video' => $videoName,
            ]);
    
            return back()->with('success', 'Testimonial added successfully.');
        }
    }
    

    public function delete_testimonial($id)
    {
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            // Delete video from local folder
            if (file_exists(public_path('storage/testimonial/'.$testimonial->video))) {
                unlink(public_path('storage/testimonial/'.$testimonial->video));
            }

            // Delete testimonial
            $testimonial->delete();
            return back()->with('success', 'Testimonial deleted successfully.');
        } else {
            return back()->with('error', 'Testimonial not found.');
        }
    }
}
