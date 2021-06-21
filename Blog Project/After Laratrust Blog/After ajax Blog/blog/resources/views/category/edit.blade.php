
<div class="container">
<h3 class="title">Category Edit</h3>
<form action="{{route('category.update',$category->slug)}}" method="post">
@csrf()
@method('put')
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="description">{{$category->description}}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
