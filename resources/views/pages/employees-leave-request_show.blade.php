@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'leave-request'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employees' Leave Requests</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Employee Leave Request's Detail</h5>
        <div class="mb-3">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="employee_name">Employee Name:</label>
                  <input type="text" name="employee_name" value="{{ $employeeLeaveRequest->employee->name }}" class="form-control-plaintext" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="from">From:</label>
                  <input type="date" name="from" id="from" class="form-control-plaintext" readonly value="{{ $employeeLeaveRequest->from }}">
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="to">To:</label>
                  <input type="date" name="to" id="to" class="form-control-plaintext" readonly value="{{ $employeeLeaveRequest->to }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="leaveQuota">Employee Leaves:</label>
                  <input type="number" name="leaveQuota" id="leaveQuota" value="{{ $employeeLeave->leaves_quota }}" class="form-control-plaintext" readonly>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="leaveCount">Leave Days Count:</label>
                  <input type="number" name="leaveCount" id="leaveCount" value="{{ $diff }}" class="form-control-plaintext" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="message">Message:</label>
                  <input type="text" name="message" id="message" class="form-control-plaintext" readonly value="{{ $employeeLeaveRequest->message }}">
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="status">Status:</label>
                  <input type="text" name="status" id="status" class="form-control-plaintext" readonly value="{{ $employeeLeaveRequest->status }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="checked_by">Checked By:</label>
                  <input type="text" name="checked_by" id="checked_by" class="form-control-plaintext" readonly value="{{ isset($employeeLeaveRequest->checkedBy) ? $employeeLeaveRequest->checkedBy->name : ''   }}">
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <input type="text" name="comment" id="comment" class="form-control-plaintext" readonly value="{{ $employeeLeaveRequest->comment }}">
                </div>
              </div>
            </div>
          </div>

          @if ($employeeLeaveRequest->status == 'WAITING_FOR_APPROVAL' && collect($accesses)->where('menu_id', 4)->first()->status == 2)              
            <div class="row">
              <div class="col-12">
                @if (auth()->user()->isAdmin())
                  <button type="button" class="btn btn-success mr-2 px-5" data-toggle="modal" data-target="#acceptModal">
                    Accept
                  </button>
                  <button type="button" class="btn btn-danger mr-2 px-5" data-toggle="modal" data-target="#rejectModal">
                    Reject
                  </button>
                @endif
                @if (auth()->user()->employee->id == $employeeLeaveRequest->employee_id)
                  <form action="{{ route('employees-leave-request.edit', ['employeeLeaveRequest' => $employeeLeaveRequest->id]) }}" class="d-inline-block">
                    <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
                  </form>
                @endif
              </div>
            </div>
          @endif
      </div>
    </div>
</div>

<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acceptModalLabel">Accept</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('employees-leave-request.update', ['employeeLeaveRequest' => $employeeLeaveRequest->id]) }}" method="POST" class="d-inline-block">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="type" value="accept">
          <input type="hidden" name="checked_by" value="{{ auth()->user()->employee->id }}">
          <div class="form-group">
            <label for="comment">Comment:</label>
            <input type="text" name="comment" id="comment" value="{{ old('comment') }}" required placeholder="Enter comment" class="form-control @error('comment') is-invalid @enderror">
            @error('comment')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success mr-2 px-5">Accept</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('employees-leave-request.destroy', ['employeeLeaveRequest' => $employeeLeaveRequest->id]) }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <input type="hidden" name="checked_by" value="{{ auth()->user()->employee->id }}">
          <div class="form-group">
            <label for="comment">Comment:</label>
            <input type="text" name="comment" id="comment" value="{{ old('comment') }}" required placeholder="Enter comment" class="form-control @error('comment') is-invalid @enderror">
            @error('comment')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger mr-2 px-5">Reject</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

