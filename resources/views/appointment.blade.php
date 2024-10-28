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
              <th>Email</th>
              <th>Phone Number</th>
              <th>Phone No.</th>
              <th>Age</th>
              <th>Quetions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $key => $value)
            <tr>
              <td>{{$key + 1}}</td>
              <td class="text-secondary" >
                {{$value->name}}
              </td>
              <td class="text-secondary" ><a href="#" class="text-reset">{{$value->email}}</a></td>
              <td class="text-secondary">{{$value->phone}}</td>
              <td class="text-secondary" >
                {{$value->age}}
              </td>
              <td>
                {{$value->message}}
              </td>
              <td>
                <a href="#">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection