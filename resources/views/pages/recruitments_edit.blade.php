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
      <h5 class="text-center font-weight-bold mb-3">Editing Recruitment's Detail</h5>
      <form action="{{ route('recruitments.update', ['recruitment' => $recruitment->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="position_id">Position:</label>
                <select id="position_id" class="form-control @error('position_id') is-invalid @enderror" name="position_id" required>
                  <option selected value="">Choose...</option>
                  @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $recruitment->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
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
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $recruitment->title }}" placeholder="Enter recruitment title" required>
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
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $recruitment->description }}" placeholder="Enter recruitment description" required>
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

          <div class="row">
            <div class="col-12">
              <div class="form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1"  {{ $recruitment->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Still Accepting?</label>
              </div>
              @error('is_active')
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