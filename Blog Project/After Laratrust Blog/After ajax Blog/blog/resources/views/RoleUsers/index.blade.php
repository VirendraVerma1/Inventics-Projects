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
<h3 class="title">User Role List</h3>

<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Roles</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($role_users as $role_user)
  <tr>
  <td>{{$index++}}</td>
  <td>{{$role_user->name}}</td>
  <td>
    @foreach($role_user->roles as $ur)
      <span class="badge badge-info" style="color:blue;">{{$ur->display_name}}</span>
    @endforeach
  </td>
  
  <td>
  
  @if(Auth::user())
  <a class="btn btn-info btn-sm" href="{{route('role_user.edit',$role_user->id)}}">edit</a>&emsp;
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