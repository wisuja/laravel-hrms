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
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 8)->first()->status == 2)
            <a href="{{ route('score-categories.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('score-categories.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
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
              <th scope="col" class="table-dark">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($scoreCategories as $category)
            <tr>
              <th scope="row">{{ $loop->iteration + $scoreCategories->firstItem() - 1 }}</th>
              <td><a href="{{ route('score-categories.edit', ['scoreCategory' => $category->id ]) }}">{{ $category->name }}</a></td>
              <td>
                <form action="{{ route('score-categories.destroy', ['scoreCategory' => $category->id]) }}" method="POST" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mr-2 px-5" onclick="return confirm('Are you sure deleting this score category?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $scoreCategories->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection