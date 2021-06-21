@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">Tag Edit</h3>
<form action="{{route('tag.update',$tag)}}" method="post">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$tag->name}}" placeholder="name">
  </div>
  
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection