@extends('layouts.print')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="font-weight-bold">Positions' Data</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
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
              <th scope="row">{{ $loop->iteration}}</th>
              <td>{{ $position->name }}</td>
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
      </div>
    </div>
  </div>
</div>
@endsection

@section('_script')
    <script>
      window.onload = function () {
        window.print();
      }
    </script>
@endsection