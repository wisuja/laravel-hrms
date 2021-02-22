@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'accounts'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Roles</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Editing Role's Detail</h5>
      <form action="{{ route('roles.update', ['role' => $role->id ]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}" placeholder="Enter role name" required>
              </div>
              @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
              <div class="form-check">
                <input type="hidden" name="is_super_user" value="0">
                <input type="checkbox" class="form-check-input @error('is_super_user') is-invalid @enderror" id="is_super_user" name="is_super_user" value="1" {{ $role->is_super_user ? 'checked' : '' }}>
                <label class="form-check-label" for="is_super_user">Is Superuser?</label>
              </div>
              @error('is_super_user')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          @foreach ($accessesForEditing as $access)
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label class="d-block">{{ Str::ucfirst($access->menu->name) }}</label>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_disabled" value="0" required {{ $access->status == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $access->menu->name }}_disabled">
                      Disabled
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_view" value="1" {{ $access->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $access->menu->name }}_view">
                      View
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_all" value="2" {{ $access->status == 2 ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $access->menu->name }}_all">
                      All
                    </label>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
@endsection