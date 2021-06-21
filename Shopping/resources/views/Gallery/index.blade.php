@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Gallery.directory')
    @include('Gallery.content')
    @include('Gallery.pagination')
  </div>
  
@endsection