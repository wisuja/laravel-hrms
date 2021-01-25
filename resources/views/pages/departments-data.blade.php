@extends('layouts.admin')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Departments' Data</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <button class="btn btn-outline-dark mb-3 w-25 align-self-end">
          <i class="fas fa-print mr-1"></i>
          <span> Print</span>
        </button>
        <table class="table table-light table-striped table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="table-dark">#</th>
              <th scope="col" class="table-dark">Name</th>
              <th scope="col" class="table-dark">Code</th>
              <th scope="col" class="table-dark">Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($departments as $department)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><a href="#">{{ $department->name }}</a></td>
              <td>{{ $department->code }}</td>
              <td>{{ $department->address }}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $departments->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection