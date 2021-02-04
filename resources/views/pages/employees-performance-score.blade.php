@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'performance'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Employees' Performance Scores</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 3)->first()->status == 2)
            <a href="{{ route('employees-performance-score.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('employees-performance-score.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
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
              <th scope="col" class="table-dark">Employee Name</th>
              <th scope="col" class="table-dark">Score</th>
              <th scope="col" class="table-dark">Scored By</th>
              <th scope="col" class="table-dark">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employeeScores as $score)
            <tr>
              <th scope="row">{{ $loop->iteration + $employeeScores->firstItem() - 1 }}</th>
              <td>{{ $score->employee->name }}</td>
              <td><a href="{{ route('employees-performance-score.show', ['employeeScore' => $score->group_id]) }}">Detail</a></td>
              <td>{{ $score->scoredBy->name }}</td>
              <td>{{ $score->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $employeeScores->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection