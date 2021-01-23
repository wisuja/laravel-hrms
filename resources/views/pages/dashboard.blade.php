@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('components.sidebar')
    <div class="content">
        @include('components.togglesidebar')

        <div class="container-fluid mt-2 ml-3">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-weight-bold">Dashboard</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-4 bg-primary text-white">
                    <h3>hello</h3>
                </div>
                <div class="col-sm-12 col-lg-4 bg-warning text-dark">
                    <h3>hello</h3>
                </div>
                <div class="col-sm-12 col-lg-4 bg-danger text-white">
                    <h3>hello</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
