@extends('layouts.app')
@section('content')
@php
$index=1;
@endphp

@if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="container">
<div class="card"  style="width: 90%;">
  <div class="card-body">
    

<div class="container">
<h3 class="title">Permission List<a style="text-decoration:none;" href="{{route('permission.create')}}">+</a></h3>

<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Role</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($permissions as $permission)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$permission->name}}</td>
  <td>
  @foreach($permission->roles as $role)
  <span class="badge badge-info" style="color:blue;">{{$role->display_name}}</span>
  @endforeach
  </td>
  <td style="width:60%;">{{$permission->description}}</td>
  <td>
  
  @if(Auth::user())
  <form action="{{route('permission.delete',$permission->id)}}"method="post">
    @csrf()
    @method('delete')
    <a class="btn btn-info btn-sm" href="{{route('permission.edit',$permission->id)}}">edit</a>&emsp;
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
  </form>
  @endif
  </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>



</div>
</div>

</div>
@endsection