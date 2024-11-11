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
    if (confirm('Are you sure you want to change the status of your appointment')) {
      updateStatus(appointmentId, checkbox);
    } else {
      checkbox.checked = false;
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
        window.location.reload(); 
        document.getElementById(`appointment-${appointmentId}`).classList.add('bg-success', 'text-white');
        checkbox.disabled = true; 
      } else {
        alert('Failed to update status. Please try again.');
        checkbox.checked = !checkbox.checked; 
      }
    })
  }
</script>

@endsection