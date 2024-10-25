@extends('layout/sidebar')

@section('pagetitle')
Appoitment List
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
              <th>Phone Number</th>
              <th>Email</th>
              <th>Age</th>
              <th>Quetions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td >1.</td>
              <td class="text-secondary" >
                UI Designer, Training
              </td>
              <td class="text-secondary" ><a href="#" class="text-reset">paweluna@howstuffworks.com</a></td>
              <td class="text-secondary" >
                User
              </td>
              <td>
                demo
              </td>
              <td>
                <a href="#">Edit</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection