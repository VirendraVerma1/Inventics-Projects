@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title">User Role Edit</h3>
<form action="{{route('role_user.update',$role_users->id)}}" method="post">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$role_users->name}}" placeholder="name">
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1">Roles</label>
  <select name="myusers[]" class="js-example-basic-multiple form-control" multiple required>
  <option value="">--select role--</option>
    @foreach($roles as $role)
    <option 
    @foreach($role_users->roles as $r)
      @if($r->id==$role->id)
      selected  
      @endif
    @endforeach
     value="{{$role->id}}">{{$role->name}}</option>
    @endforeach
    </select>
    </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection