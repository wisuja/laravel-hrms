@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'announcements'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Announcements</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Announcement's Detail</h5>
        <div class="mb-3">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control-plaintext" readonly value="{{ $announcement->title }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control-plaintext" readonly value="{{ $announcement->description }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12  ">
              <div class="form-group">
                <label for="department_id">For:</label>
                <input type="text" name="department_id" id="department_id" class="form-control-plaintext" readonly value="{{ $announcement->department_id ? $announcement->department_id : 'ALL' }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="attachment">Attachment:</label>
                <br>
                <a href="{{ asset('/storage/' . $announcement->attachment) }}" download="attachment" class="btn btn-outline-dark">
                  <i class="fas fa-download mr-1"></i>
                  Download
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-12">
        <form action="{{ route('announcements.edit', ['announcement' => $announcement->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('announcements.destroy', ['announcement' => $announcement->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this announcement?')">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection