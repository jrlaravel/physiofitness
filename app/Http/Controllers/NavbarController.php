<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nav_link;
use App\Models\Banner_detail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class NavbarController extends Controller
{
    public function index()
    {
        $navLink = Nav_link::get();
        return view('navbar-detail',compact('navLink'));
    }

    public function home_banner()
    {
        $bannerDetail = Banner_detail::all();
        return view('home_banner',compact('bannerDetail'));
    }

    public function storeOrUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);
    
        // Attempt to retrieve the first Nav_link entry or create a new one
        $navLink = Nav_link::updateOrCreate(
            ['id' => $request->input('id') ?? Nav_link::first()->id ?? null],  // Uses the first record's id if it exists, otherwise null
            $validatedData
        );
    
        return redirect()->back()->with('success', 'Navigation link details saved successfully.');
    }

    public function store_banner(Request $request)
    {
        // return $request->all();
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|max:255',
            'name' => 'sometimes|required|max:255',
            'description' => 'sometimes|required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Check if this is an update
        if ($request->banner_id) {
            // Update existing banner
            $banner = Banner_detail::find($request->banner_id);
            
            if ($banner) {
                // Update only fields that are provided
                if ($request->has('title')) {
                    $banner->title = $request->title;
                }

                if ($request->has('name')) {
                    $banner->name = $request->name;
                }
    
                if ($request->has('description')) {
                    $banner->description = $request->description;
                }
    
                if ($request->hasFile('image')) {
                    // Delete old image from local folder
                    if (file_exists(public_path('storage/banner/'.$banner->image))) {
                        unlink(public_path('storage/banner/'.$banner->image));
                    }
    
                    // Upload new image
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('storage/banner'), $imageName);
                    $banner->image = $imageName;
                }
    
                // Save the updated banner
                $banner->save();
                return back()->with('success', 'Banner updated successfully.');
            }
        } else {
            // Create new banner
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/banner'), $imageName);
            }
    
            Banner_detail::create([
                'title' => $request->title,
                'name' => $request->name,
                'description' => $request->description,
                'image' => isset($imageName) ? $imageName : null, // Use null if image is not provided
            ]);
            
            return back()->with('success', 'Banner added successfully.');
        }
    }

    public function delete_banner($id)
    {
        $banner = Banner_detail::find($id);
        if ($banner) {
            // Delete the image from local folder
            if (file_exists(public_path('storage/banner/'.$banner->image))) {
                unlink(public_path('storage/banner/'.$banner->image));
            }
            $banner->delete();
            return back()->with('success', 'Banner deleted successfully.');
        }
        return back()->with('error', 'Failed to delete the banner.');
    }
    
    
}
