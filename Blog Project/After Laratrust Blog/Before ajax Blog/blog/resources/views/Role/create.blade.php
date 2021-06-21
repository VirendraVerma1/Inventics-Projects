@extends('layouts.app')
@section('content')
<div class="container">
<form action="/role/store" method="post">
@csrf()
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Display Name</label>
    <input class="form-control" name="display_name" placeholder="display name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description"></textarea>
  </div>




  <div class="form-group">
  <label for="exampleInputEmail1">Permission</label>
  <select name="permissions[]" class="js-example-basic-multiple form-control" multiple>
    <option value="">--select Permission--</option>
    @foreach($permissionsList as $permission)
    <option value="{{$permission->id}}">{{$permission->name}}</option>
    @endforeach
    </select>
    @error('tags')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>



 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection