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
            @foreach($services as $key => $service)
            <tr>
              <td >{{$key + 1}}</td>
              <td class="text-secondary" >
                <img src="{{asset('storage/service/'.$service->image)}}" alt="Image" style="width: 100px;">
              </td>
              <td>{{$service->title}}</td>
              <td class="text-secondary" >{{$service->image_title}}</td>
              <td class="text-secondary" >{{substr($service->description, 0, 100)}}</td>
              <td>
                <a href="#" class="btn btn-primary edit-btn" 
                  data-id="{{ $service->id }}" 
                  data-title="{{ $service->title }}" 
                  data-image-title="{{ $service->image_title }}" 
                  data-description="{{ $service->description }}">
                  Edit
                </a>
                <a href="{{route('delete-service', $service->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editServiceForm" action="{{ route('store-service') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="service_id" id="service_id">
          <div class="mb-3">
            <label for="title" class="form-label">Service Title</label>
            <input type="text" class="form-control" name="service_title" id="title" required>
          </div>
          <div class="mb-3">
            <label for="image_title" class="form-label">Service Image Title</label>
            <input type="text" class="form-control" name="image_title" id="image_title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" class="form-control" name="service_image" id="image" accept="image/*">
            <span>Only JPEG, PNG, GIF formats are allowed</span>
          </div>
          <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editServiceModal = new bootstrap.Modal(document.getElementById('editServiceModal'));

    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        const serviceId = this.getAttribute('data-id');
        const serviceTitle = this.getAttribute('data-title');
        const serviceImageTitle = this.getAttribute('data-image-title');
        const serviceDescription = this.getAttribute('data-description');

        // Populate the modal fields
        document.getElementById('service_id').value = serviceId;
        document.getElementById('title').value = serviceTitle;
        document.getElementById('image_title').value = serviceImageTitle;
        document.getElementById('description').value = serviceDescription;

        // Show the modal
        editServiceModal.show();
      });
    });
  });
</script>

@endsection