@extends('layout/sidebar')

@section('pagetitle')
Appointment List
@endsection

@section('content')

<div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Full name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Age</th>
              <th>Questions</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $value)
            <tr @if($value->status === 'completed') class="bg-success text-white" @endif>
              <td>{{$key + 1}}</td>
              <td>{{$value->name}}</td>
              <td><a href="#" class="text-reset">{{$value->email}}</a></td>
              <td>{{$value->phone}}</td>
              <td>{{$value->age}}</td>
              <td>{{$value->message}}</td>
              <td>
                {{ ucfirst($value->status) }}
              </td>
              <td>
                <input type="checkbox" 
                {{ $value->status === 'completed' ? 'checked' : '' }}
                onclick="confirmStatusChange({{ $value->id }}, this)"
                @if($value->status === 'completed') @endif>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

<script>
  function confirmStatusChange(appointmentId, checkbox) {
    if (confirm('Are you sure you want to mark this appointment as completed?')) {
      updateStatus(appointmentId, checkbox);
    } else {
      checkbox.checked = false; // Revert checkbox if canceled
    }
  }

  function updateStatus(appointmentId, checkbox) {
    fetch(`api/appointment/${appointmentId}/status`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ status: checkbox.checked ? 'completed' : 'pending' })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        window.location.reload(); // Corrected line to reload the page
        document.getElementById(`appointment-${appointmentId}`).classList.add('bg-success', 'text-white');
        checkbox.disabled = true; // Disable the checkbox after marking as completed
      } else {
        alert('Failed to update status. Please try again.');
        checkbox.checked = !checkbox.checked; // Revert checkbox if failed
      }
    })
  }
</script>

@endsection