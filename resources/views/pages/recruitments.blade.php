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
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 7)->first()->status == 2)
            <a href="{{ route('recruitments.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('recruitments.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
            <i class="fas fa-print mr-1"></i>
              <span> Print</span>
          </a>
        </div>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <table class="table table-light table-striped table-hover table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="table-dark">#</th>
              <th scope="col" class="table-dark">Title</th>
              <th scope="col" class="table-dark">Description</th>
              <th scope="col" class="table-dark">Attachment</th>
              <th scope="col" class="table-dark">Still Accepting?</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recruitments as $recruitment)
            <tr>
              <th scope="row">{{ $loop->iteration + $recruitments->firstItem() - 1 }}</th>
              <td class="w-25"><a href="{{ route('recruitments.show', ['recruitment' => $recruitment->id ]) }}">{{ $recruitment->title }}</a></td>
              <td class="w-25">{{ $recruitment->description }}</td>
              <td><a href="{{ asset('/storage/' . $recruitment->attachment) }}" target="_blank">View</a></td>
              <td>
                <input type="checkbox" name="open_for_recruitment" disabled
                @if ($recruitment->is_active )
                  checked
                @endif>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $recruitments->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection