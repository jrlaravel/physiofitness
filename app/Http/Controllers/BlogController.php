<?php

namespace App\Http\Controllers;

use App\Models\Blog_detail;
use App\Models\Member_detail;
use App\Models\Service_detail;
use Illuminate\Http\Request;
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
                if ($request->has('title')) {
                    $member->title = $request->title;
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
        return view('appointment');
    }

    
}
