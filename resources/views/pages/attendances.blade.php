@extends('layouts.admin')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Attendances</h4>
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
              <th scope="col" class="table-dark">Employee Name</th>
              <th scope="col" class="table-dark">In / Out</th>
              <th scope="col" class="table-dark">Type</th>
              <th scope="col" class="table-dark">Message</th>
              <th scope="col" class="table-dark">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($attendances as $attendance)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $attendance->employee->name }}</td>
              <td>{{ $attendance->attendanceTime->name }}</td>
              <td>{{ $attendance->attendanceType->name }}</td>
              <td>{{ $attendance->message }}</td>
              <td>{{ $attendance->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $attendances->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection