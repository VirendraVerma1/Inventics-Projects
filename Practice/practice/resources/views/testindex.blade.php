<!DOCTYPE html>
<html>
    <head>
    <title>Test</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<h1>My First Heading</h1>
<div id="load_data">
@for($i=0;$i<100;$i++)
<p>My first paragraph.</p>
@endfor
</div>
<script>
var limit = 20;
 var start = 0;
 var action = 'inactive';

 //this help in auto load
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   console.log("load my data");
   setTimeout(function(){
    load_more_data();
   }, 1000);
  }
 });


//this is an ajax
 function load_more_data()
  {
    $.ajax({
      url: "{{route('newindexload')}}",
      type: 'POST',
      // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {
       _token:'{{ csrf_token() }}'
      },
         success: function(response){
          console.log(response);
          $("#load_data").append(response);
          action="inactive";
        }
      });  
  }
</script>
</body>
</html>
