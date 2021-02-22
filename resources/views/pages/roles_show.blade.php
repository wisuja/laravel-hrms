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
      <h5 class="text-center font-weight-bold mb-3">Role's Detail</h5>
      <div class="mb-3">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control-plaintext" readonly value="{{ $role->name }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="is_super_user">Is Superuser?:</label>
              <input type="text" name="is_super_user" id="is_super_user" class="form-control-plaintext" readonly value="{{ $role->is_super_user == true ? 'Yes' : 'No' }}">
            </div>
          </div>
        </div>
        
        @foreach ($accessesForEditing as $access)
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label class="d-block">{{ Str::ucfirst($access->menu->name) }}</label>
                <div class="form-check-inline">
                  <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_disabled" value="0" required {{ $access->status == 0 ? 'checked' : '' }} disabled>
                  <label class="form-check-label" for="{{ $access->menu->name }}_disabled">
                    Disabled
                  </label>
                </div>
                <div class="form-check-inline">
                  <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_view" value="1" {{ $access->status == 1 ? 'checked' : '' }} disabled>
                  <label class="form-check-label" for="{{ $access->menu->name }}_view">
                    View
                  </label>
                </div>
                <div class="form-check-inline">
                  <input class="form-check-input" type="radio" name="menuAndAccessLevel[{{ $loop->index }}][{{ $access->menu->id }}]" id="{{ $access->menu->name }}_all" value="2" {{ $access->status == 2 ? 'checked' : '' }} disabled>
                  <label class="form-check-label" for="{{ $access->menu->name }}_all">
                    All
                  </label>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  @if (collect($accesses)->where('menu_id', 9)->first()->status == 2)
    <div class="row">
      <div class="col-12">
        <form action="{{ route('roles.edit', ['role' => $role->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this role?')">Delete</button>
        </form>
      </div>
    </div>
  @endif
</div>
@endsection