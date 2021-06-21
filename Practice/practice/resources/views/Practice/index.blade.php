@extends('layouts.app')
@php
$index=1;
@endphp

<style>
.hide
{
visibility:hidden;
}
.show
{
visibility:visible;
}
</style>

@section('content')

<!-- @foreach($ques as $q)
<div class="container pb-5">
<div class="card">
  <div class="card-header">
    Ques {{$index++}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$q->Ques}}</h5>


    <div class="form-check">
    <input class="form-check-input" type="radio" name="{{$q->ID}}" id="flexCheckChecked" >
    <label class="form-check-label" for="flexCheckChecked">
        {{$q->Option1}}
    </label>
    <label class="form-check-label ans{{$q->ID}}1 hide" for="flexCheckChecked"  style="color:green;">
        Correct
    </label>
    </div>

    <div class="form-check">
    <input class="form-check-input" type="radio" name="{{$q->ID}}" id="flexCheckChecked" >
    <label class="form-check-label" for="flexCheckChecked">
        {{$q->Option2}}
    </label>
    <label class="form-check-label ans{{$q->ID}}2 hide" for="flexCheckChecked"  style="color:green;">
        Correct
    </label>
    </div>

    <div class="form-check">
    <input class="form-check-input" type="radio" name="{{$q->ID}}" id="flexCheckChecked" >
    <label class="form-check-label" for="flexCheckChecked">
        {{$q->Option3}}
    </label>
    <label class="form-check-label ans{{$q->ID}}3 hide" for="flexCheckChecked"  style="color:green;">
        Correct
    </label>
    </div>

    <div class="form-check">
    <input class="form-check-input" type="radio" name="{{$q->ID}}" id="flexCheckChecked" >
    <label class="form-check-label" for="flexCheckChecked">
        {{$q->Option4}}
    </label>
    <label class="form-check-label ans{{$q->ID}}4 hide" for="flexCheckChecked"  style="color:green;">
        Correct
    </label>
    </div>

    <br>
    <div  class="card ex{{$q->ID}} hide" style="width: 100%;" >
    <div  class="card-body" >
        <h5 class="card-title">Explanation</h5>
        <p  class="card-text" >{{$q->Explanation}}</p>
    </div>
    </div>
    
    <br>
    <button class="btn btn-primary bt{{$q->ID}}" style="display:block;" type="button" onclick="explain('{{$q->ID}}','{{$q->Correct}}')">Explanation</button>
    
    
  </div>
</div>
</div> 
@endforeach-->


<!--another method-->
<!-- @foreach($ques as $q)
<h1>{{$q}}<h1>
@endforeach -->
<div class="container-fluid padding">
                      <div class="row text-center padding">
                        <div class="col-12">
                          <h4 class="display-4" style="color:black;"><?php if(isset($_GET['ques']))echo $_GET['ques'];?></h4>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                             <h1 class="display-4" style="color:black;">Comments</h1>
                    <!---------------MAIN------------------------------------------->
                               
                            
                    <!---------------MAIN------------------------------------------->
                            
                    
                        </div>
                      </div>
                    </div>
                    <div id="load_data_message"></div>
<div id="load_data"></div>


@endsection
<script>
function explain(id,ans)
{
    uid='.ans'+id+ans;
    uidbt='.bt'+id;
    uidex='.ex'+id;
    document.querySelector(uid).classList.add('show');
    document.querySelector(uidbt).classList.add('hide');
    document.querySelector(uidex).classList.add('show');
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function(event) { 
 
 var limit = 20;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
    document.write("Hello");
    $.ajax({
   url:"{{route('load')}}",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
    document.write("World");
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>