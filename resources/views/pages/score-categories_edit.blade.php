@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'score-category'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Score Categories</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Create A New Score Category</h5>
        <form action="{{ route('score-categories.update', ['scoreCategory' => $scoreCategory->id ]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $scoreCategory->name }}" placeholder="Enter score category name" required>
                </div>
                @error('name')
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