@extends('layouts.print')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="font-weight-bold">Employees' Leave Requests</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <table class="table table-light table-striped table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="table-dark">#</th>
              <th scope="col" class="table-dark">Name</th>
              <th scope="col" class="table-dark">From</th>
              <th scope="col" class="table-dark">To</th>
              <th scope="col" class="table-dark">Message</th>
              <th scope="col" class="table-dark">Status</th>
              <th scope="col" class="table-dark">Checked By</th>
              <th scope="col" class="table-dark">Comment</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employeeLeaveRequests as $leaveReq)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $leaveReq->employee->name }}</td>
              <td>{{ $leaveReq->from }}</td>
              <td>{{ $leaveReq->to }}</td>
              <td>{{ $leaveReq->message }}</td>
              <td>{{ $leaveReq->status }}</td>
              <td>{{ $leaveReq->checkedBy->name }}</td>
              <td>{{ $leaveReq->comment }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('_script')
    <script>
      window.onload = function () {
        window.print();
      }
    </script>
@endsection