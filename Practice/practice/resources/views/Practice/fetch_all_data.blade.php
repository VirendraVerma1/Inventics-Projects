@php
if(isset($_POST["limit"], $_POST["start"]))
{
    echo $_POST["limit"].$_POST["start"];
}
@endphp

<h3>Hello</h3>

@foreach($ques as $q)
{{$q}}
@endforeach