@extends('layouts.app')

@section('nav')
    @include('components.nav')
@endsection

@section('content')
<div class="container pb-5" id="announcements">
  <div class="row">
      <div class="col-12 text-center">
          <h3>Announcements</h3>
          <div class="line text-center"> &nbsp;</div>
      </div>
  </div>
  @foreach ($announcements as $announcement)
    <div class="row">
          <div class="col-12 mb-2">
              <div class="card mx-3 h-100">
                  @if ($announcement->attachment !== null)
                      <img src="{{ $announcement->attachment }}" class="card-img-top" alt="announcement">                    
                  @endif
                  <div class="card-body">
                      <h5 class="card-title">{{ $announcement->title }}</h5>
                      <p class="card-text">{{ $announcement->description }}</p>
                  </div>
                  <div class="card-footer">
                      <a href="{{ route('welcome.announcements.show', ['announcement' => $announcement->id]) }}" class="btn btn-primary">Read more</a>
                  </div>
              </div>
          </div>
      </div>
  @endforeach
  {{ $announcements->links() }}
</div>
@endsection