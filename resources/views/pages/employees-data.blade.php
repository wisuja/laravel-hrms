@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'employees'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employees' Data</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          <a href="{{ route('employees-data.create') }}" class="btn btn-outline-dark mb-3 w-25">
            <i class="fas fa-print mr-1"></i>
              <span> Create</span>
          </a>
          <a href="#" class="btn btn-outline-dark mb-3 w-25">
            <i class="fas fa-print mr-1"></i>
              <span> Print</span>
          </a>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-light table-striped table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="table-dark">#</th>
              <th scope="col" class="table-dark">Name</th>
              <th scope="col" class="table-dark">Position</th>
              <th scope="col" class="table-dark">Department</th>
              <th scope="col" class="table-dark">Start of Contract</th>
              <th scope="col" class="table-dark">End of Contract</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)
            <tr>
              <th scope="row">{{ $loop->iteration + $employees->firstItem() - 1 }}</th>
              <td><a href="{{ route('employees-data.show', ['employee' => $employee->id]) }}">{{ $employee->name }}</a></td>
              <td>{{ $employee->position->name }}</td>
              <td>{{ $employee->department->name }}</td>
              <td>{{ $employee->start_of_contract }}</td>
              <td>{{ $employee->end_of_contract }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $employees->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection