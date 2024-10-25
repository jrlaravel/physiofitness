@extends('layout/sidebar')

@section('pagedesignation')
Team-member Details 
@endsection

@section('content')
<form action="{{route('store-team-member')}}" method="post" enctype="multipart/form-data">
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
        <label  class="form-label" for="member_image">Member Image</label>
        <input type="file" class="form-control" id="member_image" name="member_image">
        <span class="">Only 392*400 image supported</span>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="member_title">Name</label>
        <input type="text" class="form-control" id="member_title" name="member_title" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="member_designation">designation</label>
        <input type="text" class="form-control" id="member_designation" name="member_designation" required>
    </div>
    <div class="form-group">
        <label  class="form-label  mt-3" for="member_description">Description</label>
        <textarea class="form-control" id="member_description" name="member_description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>     
</form>


<h2>Team-member Listing</h2>
<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Member Image</th>
              <th>Name</th>
              <th>designation</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($members as $key => $member) 
            <tr>
              <td>{{ $key + 1 }}</td>
              <td class="text-secondary" >
                <img src="{{ asset('storage/member/'.$member->image)}}" alt="member_image" width="100" height="100">
              </td>
              <td>{{$member->name}}</td>
              <td class="text-secondary">{{$member->designation}}</td>
              <td class="text-secondary">{{ substr($member->description,0 ,100) }}</td>
              <td>
                <a href="#" class="btn btn-primary edit-btn" 
                  data-id="{{ $member->id }}" 
                  data-name="{{ $member->name }}" 
                  data-designation="{{ $member->designation }}" 
                  data-description="{{ $member->description }}">
                  Edit
                </a>
                <a href="{{route('delete-team-member',$member->id)}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<!-- Edit Member Modal -->
<div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMemberModalLabel">Edit Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editMemberForm" action="{{ route('store-team-member') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="member_id" id="member_id">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" id="designation" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*">
            <span>Only JPEG, PNG, GIF formats are allowed</span>
          </div>
          <button type="submit" class="btn btn-primary">Update Member</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editMemberModal = new bootstrap.Modal(document.getElementById('editMemberModal'));

    editButtons.forEach(button => {
      button.addEventListener('click', function() {
        const memberId = this.getAttribute('data-id');
        const memberName = this.getAttribute('data-name');
        const memberDesignation = this.getAttribute('data-designation');
        const memberDescription = this.getAttribute('data-description');

        // Set the values in the modal
        document.getElementById('member_id').value = memberId;
        document.getElementById('name').value = memberName;
        document.getElementById('designation').value = memberDesignation;
        document.getElementById('description').value = memberDescription;

        // Show the modal
        editMemberModal.show();
      });
    });
  });
</script>


@endsection