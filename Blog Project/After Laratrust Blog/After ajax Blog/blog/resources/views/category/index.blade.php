@extends('layouts.app')
@section('content')
@php
$index=1;
$perPage=$categories->perPage();
$currentPage=$categories->currentPage()-1;
$index=$perPage*$currentPage+1;
@endphp
@if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="container">
<div class="card"  style="width: 90%;">
  <div class="card-body">
    

<div class="container">
<h3 class="title">Category List <a style="text-decoration:none;" href="#" onclick="create()">+</a></h3>

<div class="row">
<div class="col-md-2" style=""></div>
</div>
<div class="col-md-6" style="float:right;">
<form action="">
<div class="row">
<input class="col-md-5" style="width" name="searchB" value="{{$name}}" type="text" placeholder="search blog">
<button class="col-md-2 btn btn-info">GO</button>&emsp;
</div>
</form>
</div>


<table class="table table-striped">
  <thead>
  <tr>
  <th>#</th>
  <th>Name</th>
  <th>Blogs</th>
  <th>Description</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)

  <tr>
  <td>{{$index}}</td>
  <td>{{$category->name}}</td>
  <td>
  @foreach($category->blogs as $blog)
  <a style="color:black;"class="badge badge-light" href="{{route('blog.show',$blog)}}">{{$blog->name}}</a>
  @endforeach
  </td>
  <td style="width:60%;">{{$category->description}}</td>
  <td>
  
  @if(Auth::user())
  <form action="{{route('category.delete',$category->slug)}}"method="post">
  
    @csrf()
    @method('delete')
    <a class="btn btn-info btn-sm" href="#" onclick="editit('{{$category->slug}}')">edit</a>&emsp;
   
    <button class="btn btn-danger btn-sm"   type="submit">Delete</button>
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
{{ $categories->links() }}
</div>
<div id="data">
</div>
@endsection

<script>
function create()
{
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data").innerHTML = this.responseText;
      }
    };
  xmlhttp.open('GET','/category/create/',true);
  xmlhttp.send();
}


function editit(id)
{
  $.ajax({
    type:'GET',
    url:'/category/edit/'+id,
    success:function(data) {
      $("#data").html(data);
    }
  });
}



</script>