@extends('layouts.admin')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employees' Leaves</h4>
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
              <th scope="col" class="table-dark">From</th>
              <th scope="col" class="table-dark">To</th>
              <th scope="col" class="table-dark">Message</th>
              <th scope="col" class="table-dark">Action</th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($employees as $employee)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><a href="#">{{ $employee->name }}</a></td>
              <td>{{ $employee->position->name }}</td>
              <td>{{ $employee->department->name }}</td>
              <td>{{ $employee->start_of_contract }}</td>
              <td>{{ $employee->end_of_contract }}</td>
            </tr>
            @endforeach --}}
          </tbody>
        </table>
        {{-- {{ $employees->links() }}   --}}
      </div>
    </div>
  </div>
</div>
@endsection