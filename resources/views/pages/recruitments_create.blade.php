@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'recruitments'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Recruitments</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <h5 class="text-center font-weight-bold mb-3">Create A New Recruitment</h5>
      <form action="{{ route('recruitments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="position_id">Position:</label>
                <select id="position_id" class="form-control @error('position_id') is-invalid @enderror" name="position_id" required>
                  <option selected value="">Choose...</option>
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('position_id')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter recruitment title" required>
              </div>
              @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" placeholder="Enter recruitment description" required>
              </div>
              @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="attachment">Attachment:</label>
                <input type="file" name="attachment" id="attachment" class="form-control-file @error('attachment') is-invalid @enderror">
              </div>
              @error('attachment')
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