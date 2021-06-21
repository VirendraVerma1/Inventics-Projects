@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">Role Edit</h3>
<form action="{{route('role.update',$role->id)}}" method="post">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$role->name}}" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Display Name</label>
    <textarea class="form-control" name="description" placeholder="description">{{$role->display_name}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description">{{$role->description}}</textarea>
  </div>


  <div class="form-group">
  <label for="exampleInputEmail1">Permission</label>
  <select name="permissions[]" class="js-example-basic-multiple form-control" multiple required>
    
    @foreach($permissions as $permission)
    <option 
    @foreach($role->permissions as $t)
      @if($t->id==$permission->id)
      selected
      @endif
    @endforeach
    value="{{$permission->id}}">{{$permission->name}}</option>
    @endforeach
    </select>
    </div>

 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection