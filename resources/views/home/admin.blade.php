@extends('layout.main')

@section('title', '| Admin Area')
@section('content')
  <div class="row">
    <div class="col-md-3">
       @include('partials._admin_nav')
    </div>
    <div class="col-md-9">
       @yield('content1')
    </div>
  </div>

@endsection
