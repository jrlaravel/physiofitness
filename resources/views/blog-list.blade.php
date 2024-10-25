@extends('layout/sidebar')

@section('pagetitle')
Blog Details 
@endsection

@section('content')
<form action="{{route('store-blog')}}" method="post" enctype="multipart/form-data">
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
        <label  class="form-label" for="blog_image">Blog Image</label>
        <input type="file" class="form-control" id="blog_image" name="blog_image">
        <span class="">Only 672*400 image supported</span>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="blog_title">Image Title</label>
        <input type="text" class="form-control" name="image_title" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="blog_title">Blog Title</label>
        <input type="text" class="form-control" id="blog_title" name="blog_title" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="blog_description">Blog Description</label>
        <textarea class="form-control" id="blog_description" name="blog_description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>     
</form>


<h2>Blog-details Listing</h2>
<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Image</th>
              <th>Blog Title</th>
              <th>Image title</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($blogs as $key => $blog)
            <tr>
              <td >{{$key + 1}}</td>
              <td class="text-secondary" >
                <img src="{{asset('storage/blog/'.$blog->image)}}" alt="Image" style="width: 100px;">
              </td>
              <td>{{$blog->title}}</td>
              <td class="text-secondary" >{{$blog->image_title}}</td>
              <td class="text-secondary" >{{substr($blog->description, 0, 100)}}</td>
              <td>
                <a href="#" class="btn btn-primary edit-btn" 
                  data-id="{{ $blog->id }}" 
                  data-title="{{ $blog->title }}" 
                  data-image-title="{{ $blog->image_title }}" 
                  data-description="{{ $blog->description }}">
                  Edit
                </a>

                <a href="{{route('delete-blog',$blog->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Edit Blog Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store-blog') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="blog_id" id="blog_id">
          <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
          </div>
          <div class="mb-3">
            <label for="image_title" class="form-label">Image Title</label>
            <input type="text" class="form-control" name="image_title" id="image_title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" class="form-control" name="image" id="image">
            <span>Only JPEG, PNG, GIF formats are allowed</span>
          </div>
          <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editBlogModal = new bootstrap.Modal(document.getElementById('editBlogModal'));

    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        const blogId = this.getAttribute('data-id');
        const title = this.getAttribute('data-title');
        const imageTitle = this.getAttribute('data-image-title');
        const description = this.getAttribute('data-description');

        // Set the values in the modal
        document.getElementById('blog_id').value = blogId;
        document.getElementById('title').value = title;
        document.getElementById('image_title').value = imageTitle;
        document.getElementById('description').value = description;

        // Show the modal
        editBlogModal.show();
      });
    });
  });
</script>


@endsection