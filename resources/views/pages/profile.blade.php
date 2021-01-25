@extends('layouts.admin')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">User Profile</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <form action="">
          @csrf
          <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
              <h4>Profile Picture</h4>
              <img src="{{ asset('images/profile.png') }}" alt="profile" class="rounded-circle d-block mb-3" width="200">
              <input type="file" name="profile-picture">
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $profile->name }}">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $profile->email }}">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="{{ $profile->employee->employeeDetail->phone }}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="address" class="form-control" name="address" id="address" placeholder="Enter address" value="{{ $profile->employee->employeeDetail->address }}">
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="form-controls btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection