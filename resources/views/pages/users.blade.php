@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'accounts'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Users</h4>
        <hr>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="bg-light text-dark card p-3 overflow-auto">
        <div class="d-flex justify-content-between">
          @if (collect($accesses)->where('menu_id', 10)->first()->status == 2)
            <a href="{{ route('employees-data.create') }}" class="btn btn-outline-dark mb-3 w-25">
              <i class="fas fa-plus mr-1"></i>
                <span> Create</span>
            </a>
          @endif
          <a href="{{ route('users.print') }}" class="btn btn-outline-dark mb-3 w-25" target="_blank">
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
              <th scope="col" class="table-dark">Email</th>
              <th scope="col" class="table-dark">Active</th>
              <th scope="col" class="table-dark">Role</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration + $users->firstItem() - 1 }}</th>
              <td class="w-25"><a href="{{ route('employees-data.show', ['employee' => $user->employee->id ]) }}">{{ $user->name }}</a></td>
              <td class="w-25">{{ $user->email }}</td>
              <td>
                <input type="checkbox" name="active" disabled
                  @if ($user->is_active)
                    checked
                  @endif
                />
              </td>
              <td>
                <a href="{{ route('roles.show', ['role' => $user->role_id]) }}">{{ $user->role->name }}</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection