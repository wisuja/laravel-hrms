@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'data'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employees' Data</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Employee's Detail</h5>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-lg-8">
      <div class="mb-3">
        <h6 class="font-weight-bold">Account Information</h6>
        <hr>
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->name }}">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" name="email" id="email" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->email }}">
            </div>
          </div>
        </div>
      </div>
      
      <div class="mb-3">
        <h6 class="font-weight-bold">Employee Information</h6>
        <hr>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="start_of_contract">Start of Contract:</label>
              <input type="date" name="start_of_contract" id="start_of_contract" class="form-control-plaintext" readonly value="{{ $employee->start_of_contract }}">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="end_of_contract">End of Contract:</label>
              <input type="date" name="end_of_contract" id="end_of_contract" class="form-control-plaintext" readonly value="{{ $employee->end_of_contract }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="department_id">Department:</label>
              <input type="text" name="department_id" id="department_id" class="form-control-plaintext" readonly value="{{ $employee->department->name }}">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="position_id">Position:</label>
              <input type="text" name="position_id" id="position_id" class="form-control-plaintext" readonly value="{{ $employee->position->name }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="gender">Gender:</label>
              <input type="text" name="gender" id="gender" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->gender == 'M' ? 'Male' : 'Female' }}">
            </div>
          </div>

          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="date_of_birth">Date Of Birth:</label>
              <input type="date" name="date_of_birth" id="date_of_birth" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->date_of_birth }}">
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="identity_number">Identity Number:</label>
              <input type="text" name="identity_number" id="identity_number" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->identity_number }}">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" name="phone" id="phone" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->phone }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" name="address" id="address" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->address }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="last_education">Last Education:</label>
              <input type="text" name="last_education" id="last_education" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->last_education }}">
            </div>
          </div>
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="gpa">GPA:</label>
              <input type="text" name="gpa" id="gpa" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->gpa }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="form-group">
              <label for="work_experience_in_years">Work Experience (in years):</label>
              <input type="number" name="work_experience_in_years" id="work_experience_in_years" class="form-control-plaintext" readonly value="{{ $employee->employeeDetail->work_experience_in_years }}">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-4">
      <h6 class="font-weight-bold mb-3">Photo</h6>
      <hr>
      <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('/storage/'. $employee->employeeDetail->photo) }}" alt="photo" class="rounded-circle w-50">
      </div>
      <h6 class="font-weight-bold mb-3">CV</h6>
      <hr>
      <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
        <a href="{{ asset('/storage/' . $employee->employeeDetail->cv) }}" download="cv" class="btn btn-outline-dark">
          <i class="fas fa-download mr-1"></i>
          Download
        </a>
      </div>
    </div>
  </div>

  @if (collect($accesses)->where('menu_id', 2)->first()->status == 2)
    <div class="row">
      <div class="col-12">
        <form action="{{ route('employees-data.edit', ['employee' => $employee->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('employees-data.destroy', ['employee' => $employee->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this employee?')">Delete</button>
        </form>
      </div>
    </div>
  @endif
</div>
@endsection