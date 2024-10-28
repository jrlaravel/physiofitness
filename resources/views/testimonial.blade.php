@extends('layout/sidebar')

@section('pagetitle')
Testimonial Details 
@endsection

@section('content')
<form action="{{route('store-testimonial')}}" method="post" enctype="multipart/form-data">
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
        <label  class="form-label" for="testimonial_video">Upload Video</label>
        <input type="file" class="form-control" id="testimonial_video" name="testimonial_video">
        <span class="">Only 812*650 video supported</span>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="testimonial_name">Patient Name</label>
        <input type="text" class="form-control" id="testimonial_name" name="testimonial_name" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="testimonial_problem">Problem</label>
        <input type="text" class="form-control" name="testimonial_problem" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="testimonial_description">Review</label>
        <textarea class="form-control" id="testimonial_description" name="testimonial_description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>     
</form>


<h2>Testimonial Listing</h2>
<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Video</th>
              <th>Name</th>
              <th>Problem</th>
              <th>Review</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($testimonials as $key => $value)
            <tr>
              <td>{{$key + 1}}</td>
              <td><video src="{{asset('storage/testimonial/'.$value->video)}}" width="50px"></video></td>
              <td>{{$value->name}}</td>
              <td>{{$value->problem}}</td>
              <td>{{substr($value->review,0,100)}}</td>
              <td>
                <a href="#" 
                class="btn btn-primary edit-btn" 
                data-id="{{ $value->id }}"
                data-name="{{ $value->name }}"
                data-problem="{{ $value->problem }}"
                data-review="{{ $value->review }}">
               Edit
             </a>
                <a href="{{route('delete-testimonial',$value->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTestimonialModalLabel">Edit Testimonial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editTestimonialForm" action="{{route('store-testimonial')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="testimonial_id" id="edit_testimonial_id">
          <div class="mb-3">
            <label for="edit_testimonial_video" class="form-label">Upload Video</label>
            <input type="file" class="form-control" name="testimonial_video" id="edit_testimonial_video" accept="video/*">
            <span>Only 812x650 video supported</span>
          </div>
          <div class="mb-3">
            <label for="edit_testimonial_name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="testimonial_name" id="edit_testimonial_name" required>
          </div>
          <div class="mb-3">
            <label for="edit_testimonial_problem" class="form-label">Problem</label>
            <input type="text" class="form-control" name="testimonial_problem" id="edit_testimonial_problem" required>
          </div>
          <div class="mb-3">
            <label for="edit_testimonial_description" class="form-label">Review</label>
            <textarea class="form-control" name="testimonial_description" id="edit_testimonial_description" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editTestimonialModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'));

    editButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            
            // Retrieve data attributes from the button
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const problem = this.getAttribute('data-problem');
            const review = this.getAttribute('data-review');
            
            // Populate the modal fields
            document.getElementById('edit_testimonial_id').value = id;
            document.getElementById('edit_testimonial_name').value = name;
            document.getElementById('edit_testimonial_problem').value = problem;
            document.getElementById('edit_testimonial_description').value = review;

            // Show the modal
            editTestimonialModal.show();
        });
    });
});

</script>
@endsection