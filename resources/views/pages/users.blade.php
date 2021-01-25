@extends('layouts.admin')

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
        <button class="btn btn-outline-dark mb-3 w-25 align-self-end">
          <i class="fas fa-print mr-1"></i>
          <span> Print</span>
        </button>
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
              <td class="w-25"><a href="#">{{ $user->name }}</a></td>
              <td class="w-25">{{ $user->email }}</td>
              <td>
                <input type="checkbox" name="active" disabled
                  @if ($user->is_active)
                    checked
                  @endif
                />
              </td>
              <td>
                <a href="#">{{ $user->role->name }}</a>
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