@extends('layouts.print')

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="font-weight-bold">Users</h4>
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
              <th scope="col" class="table-dark">Email</th>
              <th scope="col" class="table-dark">Active</th>
              <th scope="col" class="table-dark">Role</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td class="w-25">{{ $user->name }}</td>
              <td class="w-25">{{ $user->email }}</td>
              <td>
                <input type="checkbox" name="active" disabled
                  @if ($user->is_active)
                    checked
                  @endif
                />
              </td>
              <td>{{ $user->role->name }}</td>
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