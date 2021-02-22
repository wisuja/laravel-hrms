@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'user'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">User Profile</h4>
        <hr>
    </div>
  </div>
  
  @if (collect($accesses)->where('menu_id', 11)->first()->status == 2)
    <div class="row">
      <div class="col-12 mb-3">
        <div class="bg-light text-dark card p-3 overflow-auto">
          
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          <form action="{{ route('profile.update', ['user' => auth()->id() ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                <h4>Profile Picture</h4>
                <img src="{{ asset('/storage/'. $profile->employee->employeeDetail->photo) }}" alt="profile" class="rounded-circle d-block mb-3" width="200">
                <input type="file" name="profile" id="profile" class="@error('profile') is-invalid @enderror">
              </div>
              @error('profile')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name" value="{{ $profile->name }}">
                </div>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email" value="{{ $profile->email }}">
                </div>
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter phone" value="{{ $profile->employee->employeeDetail->phone }}">
                </div>
                @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter address" value="{{ $profile->employee->employeeDetail->address }}">
                </div>
                @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary px-5">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @else
    <div class="row">
      <div class="col-12 mb-3">
        <div class="bg-light text-dark card p-3 overflow-auto">
          <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
              <h4>Profile Picture</h4>
              <img src="{{ asset('/storage/'. $profile->employee->employeeDetail->photo) }}" alt="profile" class="rounded-circle d-block mb-3" width="200">
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control-plaintext" readonly name="name" id="name" value="{{ $profile->name }}">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control-plaintext" readonly name="email" id="email" value="{{ $profile->email }}">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control-plaintext" readonly name="phone" id="phone" value="{{ $profile->employee->employeeDetail->phone }}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control-plaintext" readonly name="address" id="address"  value="{{ $profile->employee->employeeDetail->address }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection