@extends('layout.master')
@section('content')
<div class="page-content">
    @include('Category.destination')
    @include('Category.centerad')
    @include('Category.EmptyCategory.filtercontent')
    @include('CommonContent.youmayalsolike')
</div>
@endsection