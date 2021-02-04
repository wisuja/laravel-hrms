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
      <h5 class="text-center font-weight-bold mb-3">Recruitment's Detail</h5>
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

        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="is_active">Still Accepting?</label>
              <input type="text" name="is_active" id="is_active" class="form-control-plaintext" readonly value="{{ $recruitment->is_active == true ? 'Yes' : 'No' }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h5 class="font-weight-bold">Applicants</h5>
      <table class="table table-light table-striped table-hover table-bordered text-center">
        <thead>
          <tr>
            <th scope="col" class="table-dark">#</th>
            <th scope="col" class="table-dark">Name</th>
            <th scope="col" class="table-dark">Email</th>
            <th scope="col" class="table-dark">Phone</th>
            <th scope="col" class="table-dark">Address</th>
            <th scope="col" class="table-dark">Message</th>
            <th scope="col" class="table-dark">Attachments</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recruitmentCandidates as $candidate)
          <tr>
            <th scope="row">{{ $loop->iteration + $recruitmentCandidates->firstItem() - 1 }}</th>
            <td>{{ $candidate->name }}</td>
            <td><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ $candidate->email }}" target="_blank">{{ $candidate->email }}</a></td>
            <td>{{ $candidate->phone }}</td>
            <td class="w-25">{{ $candidate->address }}</td>
            <td class="w-25">{{ $candidate->message }}</td>
            <td>
              <a href="{{ asset('/storage/' . $candidate->photo) }}" target="_blank" class="d-block">View Photo</a>
              <a href="{{ asset('/storage/' . $candidate->cv) }}" target="_blank" class="d-block">View CV</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @if (collect($accesses)->where('menu_id', 7)->first()->status == 2 && auth()->user()->isAdmin())
    <div class="row">
      <div class="col-12">
        <form action="{{ route('recruitments.edit', ['recruitment' => $recruitment->id]) }}" class="d-inline-block">
          <button type="submit" class="btn btn-warning mr-2 px-5">Edit</button>
        </form>
        <form action="{{ route('recruitments.destroy', ['recruitment' => $recruitment->id]) }}" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this recruitment?')">Delete</button>
        </form>
      </div>
    </div>
  @endif
</div>
@endsection