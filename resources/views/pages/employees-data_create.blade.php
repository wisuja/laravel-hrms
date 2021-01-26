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
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Create A New Employee</h5>
        <form action="">
          @csrf
          <div class="mb-3">
            <h6 class="font-weight-bold">Account Information</h6>
            <hr>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Enter password" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="confirmationPassword">Confirmation Password</label>
                  <input type="password" name="confirmationPassword" id="confirmationPassword" class="form-control" value="{{ old('confirmationPassword') }}" placeholder="Enter password again" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select id="role" class="form-control" name="role" required>
                    <option selected>Choose...</option>
                    <option value="Administrator">Administrator</option>
                    <option value="User" >User</option>
                  </select>
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
                  <label for="startOfContract">Start of Contract</label>
                  <input type="date" name="startOfContract" id="startOfContract" class="form-control" value="{{ old('startOfContract') }}" placeholder="Enter start of contract date" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="endOfContract">End of Contract</label>
                  <input type="date" name="endOfContract" id="endOfContract" class="form-control" value="{{ old('endOfContract') }}" placeholder="Enter end of contract date" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="department">Department</label>
                  <select id="department" class="form-control" name="department" required>
                    <option selected>Choose...</option>
                    <option value="IT">IT</option>
                    <option value="Admin" >Admin</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="position">Position</label>
                  <select id="position" class="form-control" name="position" required>
                    <option selected>Choose...</option>
                    <option value="Administrator">Administrator</option>
                    <option value="User" >User</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender" required>
                    <option selected>Choose...</option>
                    <option value="M">Male</option>
                    <option value="F" >Female</option>
                  </select>
                </div>
              </div>
  
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="dateOfBirth">Date Of Birth</label>
                  <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="{{ old('dateOfBirth') }}" placeholder="Enter date of birth" required>
                </div>
              </div>
  
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="identityNumber">Identity Number</label>
                  <input type="text" name="identityNumber" id="identityNumber" class="form-control" value="{{ old('identityNumber') }}" placeholder="Enter identity number" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter phone" required>
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="Enter address" required>
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="photo">Photo</label>
                  <input type="file" name="photo" id="photo" class="form-control-file" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="cv">CV</label>
                  <input type="file" name="cv" id="cv" class="form-control-file" required>
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="education">Last Education</label>
                  <input type="text" name="education" id="education" class="form-control" value="{{ old('education') }}" placeholder="Enter last education" required>
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="gpa">GPA</label>
                  <input type="text" name="gpa" id="gpa" class="form-control" value="{{ old('gpa') }}" placeholder="Enter GPA" required>
                </div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                  <label for="workExperience">Work Experience (in years)</label>
                  <input type="number" name="workExperience" id="workExperience" class="form-control" value="{{ old('workExperience') }}" placeholder="Enter work experience in years" required>
                </div>
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