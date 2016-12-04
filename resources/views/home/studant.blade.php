@extends('layout.main')

@section('title', '| Estudante Area')
@section('content')
  <div class="row">
    <div class="col-md-3">
       @include('partials._studant_nav')
    </div>
    <div class="col-md-9">
       @yield('content2')
    </div>
  </div>

@endsection
