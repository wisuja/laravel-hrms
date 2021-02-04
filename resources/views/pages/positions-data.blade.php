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
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 2)->first()->status == 2)
            <a href="{{ route('positions-data.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('positions-data.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
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
              <th scope="col" class="table-dark">Name</th>
              <th scope="col" class="table-dark">Description</th>
              <th scope="col" class="table-dark">Min. Experience (in years)</th>
              <th scope="col" class="table-dark">Salary</th>
              <th scope="col" class="table-dark">Open for Recruitment</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($positions as $position)
            <tr>
              <th scope="row">{{ $loop->iteration + $positions->firstItem() - 1 }}</th>
              <td><a href="{{ route('positions-data.show', ['position' => $position->id ]) }}">{{ $position->name }}</a></td>
              <td class="w-25">{{ $position->description }}</td>
              <td>{{ $position->min_year_exp_required }}</td>
              <td>{{ $position->salary }}</td>
              <td><input type="checkbox" name="open_for_recruitment" disabled value="{{ !!$position->open_for_recruitment }}" 
                @if ($position->open_for_recruitment) 
                  checked
                @endif 
              class="form-check-input"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $positions->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection