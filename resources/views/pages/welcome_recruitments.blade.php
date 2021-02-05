@extends('layouts.app')

@section('nav')
    @include('components.nav')
@endsection

@section('content')
<div class="container pb-5" id="recruitments">
  <div class="row">
      <div class="col-12 text-center">
          <h3>Recruitments</h3>
          <div class="line text-center"> &nbsp;</div>
      </div>
  </div>
  @foreach ($recruitments as $recruitment)
    <div class="row">
          <div class="col-12 mb-2">
              <div class="card mx-3 h-100">
                @if ($recruitment->attachment !== null)
                    <img src="{{ $recruitment->attachment }}" class="card-img-top" alt="recruitment">                    
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $recruitment->title }}</h5>
                    <p class="card-text">{{ $recruitment->description }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('welcome.recruitments.show', ['recruitment' => $recruitment->id ]) }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
          </div>
      </div>
  @endforeach
  {{ $recruitments->links() }}
</div>
@endsection