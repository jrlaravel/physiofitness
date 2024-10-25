<?php

namespace App\Http\Controllers;
use App\Models\Nav_link;
use App\Models\Banner_detail;
use App\Models\Blog_detail;
use App\Models\Member_detail;
use App\Models\Service_detail;
use Illuminate\Http\Request;

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
}
