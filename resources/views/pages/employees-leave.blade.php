@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'leave'])

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
              <th scope="col" class="table-dark">Status</th>
              <th scope="col" class="table-dark">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employeeLeaves as $leave)
              @foreach ($leave->employeeLeaveRequest as $leaveReq)
                <tr>
                  <th scope="row">{{ $loop->iteration + $employeeLeaves->firstItem() - 1 }}</th>
                  <td>{{ $leave->name }}</td>
                  <td>{{ $leaveReq->from }}</td>
                  <td>{{ $leaveReq->to }}</td>
                  <td>{{ $leaveReq->message }}</td>
                  <td>{{ $leaveReq->status }}</td>
                  <td>
                    <a href="#" class="btn btn-outline-primary">Accept</a>
                    <a href="#" class="btn btn-outline-info">Detail</a>
                    <a href="#" class="btn btn-outline-danger">Cancel</a>
                  </td>
                </tr>
              @endforeach
            @endforeach
          </tbody>
        </table>
        {{ $employeeLeaves->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection