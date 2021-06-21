@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Category.destination')
    @include('Category.centerad')
    @include('Category.app')
    @include('CommonContent.youmayalsolike')
</div>
<script>
    var custom_slug="{{$slug}}";
    
</script>
@endsection