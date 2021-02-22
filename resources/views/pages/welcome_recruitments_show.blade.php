@extends('layouts.app')

@section('nav')
    @include('components.nav')
@endsection

@section('content')
<div class="container pb-5" id="recruitments">
  <div class="row">
      <div class="col-12 text-center">
          <h3>Recruitment's Detail</h3>
          <div class="line text-center"> &nbsp;</div>
      </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="mb-3">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="position_id">Position:</label>
              <input type="text" name="position_id" id="position_id" value="{{ $recruitment->position->name }}" class="form-control-plaintext" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" id="title" class="form-control-plaintext" readonly value="{{ $recruitment->title }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" name="description" id="description" class="form-control-plaintext" readonly value="{{ $recruitment->description }}">
            </div>
          </div>
        </div>

        @if ($recruitment->attachment !== null)
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="attachment">Attachment:</label>
                <br>
                <a href="{{ asset('/storage/' . $recruitment->attachment) }}" download="attachment" class="btn btn-outline-dark">
                  <i class="fas fa-download mr-1"></i>
                  Download
                </a>
              </div>
            </div>
          </div>
        @endif

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <button type="button" class="btn btn-primary mr-2 px-5" data-toggle="modal" data-target="#applyModal">
                Apply
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel">Apply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('recruitment-candidates.store') }}" method="POST" class="d-inline-block" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="recruitment_id" value="{{ $recruitment->id }}">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Enter name" class="form-control @error('name') is-invalid @enderror">
          </div>
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="Enter email" class="form-control @error('email') is-invalid @enderror">
          </div>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required placeholder="Enter phone" class="form-control @error('phone') is-invalid @enderror" minlength="11" maxlength="13">
          </div>
          @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" required placeholder="Enter address" class="form-control @error('address') is-invalid @enderror">
          </div>
          @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="message">Message:</label>
            <input type="text" name="message" id="message" value="{{ old('message') }}" required placeholder="Enter message" class="form-control @error('message') is-invalid @enderror">
          </div>
          @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" required>
          </div>
          @error('photo')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="cv">CV:</label>
            <input type="file" name="cv" id="cv" class="form-control-file @error('cv') is-invalid @enderror" required>
          </div>
          @error('cv')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary mr-2 px-5">Apply</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection