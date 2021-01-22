@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('components.sidebar')
    <div class="content">
        @include('components.togglesidebar')
    </div>
</div>
@endsection
