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
        <h5 class="text-center font-weight-bold mb-3">Edit An Employee</h5>
        <form action="{{ route('employees-data.update', ['employee' => $employee->id ]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <h6 class="font-weight-bold">Account Information</h6>
            <hr>

            <input type="hidden" name="user_id" value="{{ $employee->user_id }}">

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->employeeDetail->name }}" placeholder="Enter name" required>
                </div>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="email">Email Address:</label>
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $employee->employeeDetail->email }}" placeholder="Enter email" required>
                </div>
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password" required>
                </div>
                @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="password_confirmation">Confirmation Password:</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Enter password again" required>
                </div>
                @error('password_confirmation')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="role_id">Role:</label>
                  <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                    <option value="">Choose...</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $employee->user->role_id == $role->id ? 'selected': '' }}>
                      {{ $role->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
                @error('role_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input type="hidden" name="is_active" value="0">
                  <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1"  {{ old('is_active', isset($employee->is_active) ? 'checked' : '') }}>
                  <label class="form-check-label" for="is_active">Is Active?</label>
                </div>
                @error('is_active')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                  <input type="date" name="start_of_contract" id="start_of_contract" class="form-control @error('start_of_contract') is-invalid @enderror" value="{{ $employee->start_of_contract }}" placeholder="Enter start of contract date" required>
                </div>
                @error('start_of_contract')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="end_of_contract">End of Contract:</label>
                  <input type="date" name="end_of_contract" id="end_of_contract" class="form-control @error('end_of_contract') is-invalid @enderror" value="{{ $employee->end_of_contract }}" placeholder="Enter end of contract date" required>
                </div>
                @error('end_of_contract')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="department_id">Department:</label>
                  <select id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                    <option value="">Choose...</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected': '' }}>
                      {{ $department->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
                @error('department_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="position_id">Position:</label>
                  <select id="position_id" class="form-control @error('position_id') is-invalid @enderror" name="position_id" required>
                    <option value="">Choose...</option>
                    @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected': '' }}>
                      {{ $position->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
                @error('position_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="gender">Gender:</label>
                  <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                    <option selected>Choose...</option>
                    <option value="M"
                    @if ($employee->employeeDetail->gender == "M")
                      selected
                    @endif
                    >Male</option>
                    <option value="F" 
                      @if ($employee->employeeDetail->gender == "F")
                        selected
                      @endif
                    >Female</option>
                  </select>
                </div>
                @error('gender')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
  
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="date_of_birth">Date Of Birth:</label>
                  <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ $employee->employeeDetail->date_of_birth }}" placeholder="Enter date of birth" required>
                </div>
                @error('date_of_birth')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
  
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="identity_number">Identity Number:</label>
                  <input type="text" name="identity_number" id="identity_number" class="form-control @error('identity_number') is-invalid @enderror" value="{{ $employee->employeeDetail->identity_number }}" placeholder="Enter identity number" required>
                </div>
                @error('identity_number')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee->employeeDetail->phone }}" placeholder="Enter phone" required>
                </div>
                @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $employee->employeeDetail->address }}" placeholder="Enter address" required>
                </div>
                @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="photo">Photo:</label>
                  <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" required>
                </div>
                @error('photo')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="cv">CV:</label>
                  <input type="file" name="cv" id="cv" class="form-control-file @error('cv') is-invalid @enderror" required>
                </div>
                @error('cv')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="last_education">Last Education:</label>
                  <input type="text" name="last_education" id="last_education" class="form-control @error('last_education') is-invalid @enderror" value="{{ $employee->employeeDetail->last_education }}" placeholder="Enter last education" required>
                </div>
                @error('last_education')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="gpa">GPA:</label>
                  <input type="text" name="gpa" id="gpa" class="form-control @error('gpa') is-invalid @enderror" value="{{ $employee->employeeDetail->gpa }}" placeholder="Enter GPA" required>
                </div>
                @error('gpa')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="work_experience_in_years">Work Experience (in years):</label>
                  <input type="number" name="work_experience_in_years" id="work_experience_in_years" class="form-control @error('work_experience_in_years') is-invalid @enderror" value="{{ $employee->employeeDetail->work_experience_in_years }}" placeholder="Enter work experience in years" required>
                </div>
                @error('work_experience_in_years')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <button type="submit" class="btn btn-primary px-5">Save</button>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection