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
        <h5 class="text-center font-weight-bold mb-3">Create A New Employee Score</h5>
        <form action="{{ route('employees-performance-score.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="employee_id">Employee Name:</label>
                  <select id="employee_id" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" required>
                    <option value="">Choose...</option>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected': '' }}>
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

            @foreach ($scoreCategories as $category)
              <div class="row">
                <div class="col-sm-12 col-lg-2">
                  <div class="form-group">
                    <label for="{{ $category->name }}">Category</label>
                    <input type="hidden" name="categoryAndScore[{{ $loop->index }}][id]" value="{{ $category->id }}">
                    <input type="text" id="{{ $category->name }}" value="{{ Str::ucfirst(Str::lower($category->name)) }}" class="form-control-plaintext" readonly>
                  </div>
                </div>

                <div class="col-sm-12 col-lg-10">
                  <div class="form-group">
                    <label for="{{ $category->name . '_score' }}">Score</label>
                    <input type="number" min="1" max="5" id="{{  $category->name . '_score' }}" name="categoryAndScore[{{ $loop->index }}][score]" value="{{ old("categoryAndScore[$loop->index][score]") }}" class="form-control @error('categoryAndScore[{{ $loop->index }}][score]') is-invalid @enderror" required>
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