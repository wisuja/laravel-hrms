@extends('layouts.app')

@section('head')
    @yield('_head')
@endsection

@section('content')
<div class="wrapper">
    <div class="content">
        @yield('_content')
    </div>
</div>

@yield('_script')
@endsection
