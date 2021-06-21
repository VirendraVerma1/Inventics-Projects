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
<h3 class="title">Role List<a style="text-decoration:none;" href="{{route('role.create')}}">+</a></h3>

<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Permissions</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($roles as $role)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$role->name}}</td>
  <td>
    @foreach($role->permissions as $per)
      <span class="badge badge-info" style="color:blue;">{{$per->display_name}}</span>
    @endforeach
  </td>
  <td style="width:60%;">{{$role->description}}</td>
  <td>
  
  @if(Auth::user())
  <form action="{{route('role.delete',$role->id)}}"method="post">
    @csrf()
    @method('delete')
    <a class="btn btn-info btn-sm" href="{{route('role.edit',$role->id)}}">edit</a>&emsp;
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