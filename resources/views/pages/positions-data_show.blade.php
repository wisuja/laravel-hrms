@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'data'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Positions' Data</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Position's Detail</h5>
        <div class="mb-3">
          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control-plaintext" readonly value="{{ $position->name }}">
              </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control-plaintext" readonly value="{{ $position->description }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="min_year_exp_required">Minimal Years Experience Required:</label>
                <input type="number" name="min_year_exp_required" id="min_year_exp_required" class="form-control-plaintext" readonly value="{{ $position->min_year_exp_required }}">
              </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" name="salary" id="salary" class="form-control-plaintext" readonly value="{{ $position->salary }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="open_for_recruitment">Open for Recruitment:</label>
                <input type="text" name="open_for_recruitment" id="open_for_recruitment" class="form-control-plaintext" readonly value="{{ $position->open_for_recruitment == true ? 'Yes' : 'No' }}">
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  @if (collect($accesses)->where('menu_id', 2)->first()->status == 2)
    <div class="row">
      <div class="col-12">
        <form action="{{ route('positions-data.edit', ['position' => $position->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('positions-data.destroy', ['position' => $position->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this position?')">Delete</button>
        </form>
      </div>
    </div>
  @endif
</div>
@endsection