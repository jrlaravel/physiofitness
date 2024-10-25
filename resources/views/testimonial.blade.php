@extends('layout/sidebar')

@section('pagetitle')
Service Details 
@endsection

@section('content')
<form action="{{route('store-service')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
@endif
    <div class="form-group">
        <label  class="form-label" for="service_image">Service Image</label>
        <input type="file" class="form-control" id="service_image" name="service_image">
        <span class="">Only 672*400 image supported</span>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="service_title">Service image Title</label>
        <input type="text" class="form-control" id="service_title" name="service_title" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="service_title">Service Title</label>
        <input type="text" class="form-control" name="image_title" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="service_description">Service Description</label>
        <textarea class="form-control" id="service_description" name="service_description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>     
</form>


<h2>Service Listing</h2>
<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Image</th>
              <th>Service image Title</th>
              <th>Service title</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
</div>


@endsection