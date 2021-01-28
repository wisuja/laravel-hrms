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
    <div class="col-12">
        <h5 class="text-center font-weight-bold mb-3">Editing A Employee Score</h5>
        <form action="{{ route('employees-performance-score.update', ['employeeScore' => $scores[0]->group_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="employee_id">Employee Name:</label>
                  <input type="hidden" name="employee_id" value="{{ $scores[0]->employee_id }}">
                  <select id="employee_id" class="form-control" disabled>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $scores[0]->employee_id == $employee->id ? 'selected': '' }}>
                      {{ $employee->employeeDetail->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
                @error('employee_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            @foreach ($scores as $score)
              <div class="row">
                <div class="col-sm-12 col-lg-2">
                  <div class="form-group">
                    <label for="{{ $score->scoreCategory->name }}">Category</label>
                    <input type="hidden" name="categoryAndScore[{{ $loop->index }}][id]" value="{{ $score->scoreCategory->id }}">
                    <input type="text" id="{{ $score->scoreCategory->name }}" value="{{ Str::ucfirst(Str::lower($score->scoreCategory->name)) }}" class="form-control-plaintext" readonly>
                  </div>
                </div>

                <div class="col-sm-12 col-lg-10">
                  <div class="form-group">
                    <label for="{{ $score->scoreCategory->name . '_score' }}">Score</label>
                    <input type="number" min="1" max="5" id="{{  $score->scoreCategory->name . '_score' }}" name="categoryAndScore[{{ $loop->index }}][score]" value="{{ $score->score }}" class="form-control @error('categoryAndScore[{{ $loop->index }}][score]') is-invalid @enderror" required>
                  </div>
                  @error('categoryAndScore[{{ $loop->index }}][score]')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>
                </div>
            @endforeach

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