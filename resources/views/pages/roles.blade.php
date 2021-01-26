@extends('layouts.admin', ['accesses' => $accesses, 'active' => 'roles'])

@section('_content')
<div class="container-fluid mt-2 px-4">
  <div class="row">
    <div class="col-12">
        <h4 class="font-weight-bold">Roles</h4>
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
              <th scope="col" class="table-dark">Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
            <tr>
              <th scope="row">{{ $loop->iteration + $roles->firstItem() - 1 }}</th>
              <td class="w-25">{{ $role->name }}</td>
              <td>
                <a href="#">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $roles->links() }}  
      </div>
    </div>
  </div>
</div>
@endsection