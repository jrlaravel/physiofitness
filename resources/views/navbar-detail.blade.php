@extends('layout/sidebar')

@section('pagetitle')
Navbar-Details 
@endsection

@section('content')
<form action="{{ route('store') }}" method="post">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
       {{ session('success') }}
    </div>
    @endif  
    @csrf

    @if(isset($navLink->id))
        <input type="hidden" name="id" value="{{ $navLink[0]->id }}">
    @endif

    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Instagram Link</label>
            <input type="text" class="form-control" name="instagram_url" placeholder="Instagram Link" value="{{ old('instagram_url', $navLink[0]->instagram_url ?? '') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Facebook Link</label>
            <input type="text" class="form-control" name="facebook_url" placeholder="Facebook Link" value="{{ old('facebook_url', $navLink[0]->facebook_url ?? '') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label class="form-label">YouTube Link</label>
            <input type="text" class="form-control" name="youtube_url" placeholder="YouTube Link" value="{{ old('youtube_url', $navLink[0]->youtube_url ?? '') }}">
        </div>
        <div class="col-md-6 mt-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address', $navLink[0]->address ?? '') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label class="form-label">Phone No.</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Phone No." value="{{ old('phone', $navLink[0]->phone ?? '') }}">
        </div>
        <div class="col-md-6 mt-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{ old('email', $navLink[0]->email ?? '') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
@endsection
