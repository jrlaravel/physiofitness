@extends('layout/sidebar')

@section('pagetitle')
Home-Banner Details 
@endsection

@section('content')

<form action="{{ route('add-home-banner') }}" method="post" enctype="multipart/form-data">
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
      <label class="form-label" for="image">Banner Image</label>
      <input type="file" class="form-control" id="image" name="image" required>
      <span>Only 1920*1080 image supported</span>
  </div>
  <div class="form-group">
      <label class="form-label mt-3" for="title">Banner Title</label>
      <input type="text" class="form-control" id="title" name="title" required>
  </div>
  <div class="form-group">
    <label class="form-label mt-3" for="title">Banner name</label>
    <input type="text" class="form-control" id="title" name="name" required>
</div>
  <div class="form-group">
      <label class="form-label mt-3" for="description">Banner Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>     
</form>


<h2>Header-details Listing</h2>
<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Image</th>
              <th>Title</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bannerDetail as $key => $banner)
            <tr>
              <td >{{$key + 1}}</td>
              <td class="text-secondary" >
                <img src="{{ asset('storage/banner/'.$banner->image)}}" alt="Image" width="150" height="100">
              </td>
              <td class="text-secondary" ><a href="#" class="text-reset">{{$banner->title}}</a></td>
              <td class="text-secondary" 
                  title="{{ $banner->description }}">  <!-- This will show the full description on hover -->
                  {{ \Illuminate\Support\Str::limit($banner->description, 20) }}  <!-- Show only the first 20 words -->
              </td>
              <td>
                <a href="#" class="btn btn-primary edit-banner" 
                data-id="{{ $banner->id }}" 
                data-title="{{ $banner->title }}" 
                data-name="{{ $banner->name }}"
                data-description="{{ $banner->description }}" 
                data-image="{{ $banner->image }}" 
                data-bs-toggle="modal" 
                data-bs-target="#editModal">Edit</a>
             
                  <a href="{{route('delete-home-banner', $banner->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Banner</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="editForm" action="{{route('add-home-banner') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="banner_id" id="bannerId">
                  <div class="form-group">
                      <label for="title" class="mb-2">Banner Title</label>
                      <input type="text" class="form-control" id="bannerTitle" name="title" required>
                  </div>
                  <div class="form-group">
                    <label for="title" class="mb-2">Banner name</label>
                    <input type="text" class="form-control" id="bannername" name="name" required>
                </div>
                  <div class="form-group mt-3">
                      <label for="description" class="mb-2">Banner Description</label>
                      <textarea class="form-control" id="bannerDescription" name="description" rows="3" required></textarea>
                  </div>
                  <div class="form-group mt-3">
                      <label for="image" class="mb-2">Banner Image</label>
                      <input type="file" class="form-control" id="bannerImage" name="image">
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Update</button>
              </form>
          </div>
      </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Attach click event to all edit buttons
      document.querySelectorAll('.edit-banner').forEach(button => {
          button.addEventListener('click', function () {
              // Get the data from the button
              const id = this.getAttribute('data-id');
              const title = this.getAttribute('data-title');
              const description = this.getAttribute('data-description');
              const image = this.getAttribute('data-image');

              // Populate the modal fields with data
              document.getElementById('bannerId').value = id;
              document.getElementById('bannerTitle').value = title;
              document.getElementById('bannername').value = name;
              document.getElementById('bannerDescription').value = description;

              // Optionally, you can show the current image if needed
              // You can add an <img> tag in the modal to display the image
              document.getElementById('currentImage').src = image;
          });
      });
  });
</script>

@endsection