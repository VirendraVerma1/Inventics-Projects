@extends('layouts.app')
@section('content')
    <div class="container">
        <h4>Testing Page</h4>

        <h8>Testing 1(text show after click)</h8>
            <button type="button" class="btn btn-primary" onclick='demothingsonbuttonclick()'>Test1</button>
        <div id="demo"></div><br><br><br>

        <h8>Testing 2(image replacement)</h8>
            <button type="button" class="btn btn-primary" onclick='changeimageon()'>Test2</button>
        <image id="myImage" src="#"><br><br><br>

        <h8>Testing 3(external function)</h8>
            <button type="button" class="btn btn-primary" onclick='checkForExternerFile()'>Test3</button><br><br><br>
            
        <h8>Testing 4(change para)</h8>
            <button type="button" class="btn btn-primary" onclick='changeparacontent()'>Test4</button>
            <p id="mypara1">Hello World</p><br><br><br>

        <script> document.write(5 + 6);</script>
        <script>console.log(6 + 6);</script>

        <h8>Testing 5(print)</h8>
        <button onclick="window.print()">Print this page</button><br><br><br>

        <h8>Testing 6(array test)</h8>
        <button onclick="arraytest()">test</button>
        <div id="arraytest"></div><br><br><br>
        
        <script>const t=0;
        //t=1;//give error
        document.write(t);</script>

        <h8>Testing 7(get current date)</h8>
        <button onclick="getthecurrentdate()">test</button>
        <div id="currentdate"></div><br><br><br>

        <h8>Testing 8(string test)</h8>
        <button onclick="stringthings()">String test</button>
        <p id="newstringtest">Hello World</p><br><br><br>

    </div>
@endsection

<script src="functions.js"></script>
<script>
//for loop
var i = 5;
for (var i = 0; i < 10; i++) {
  // some statements
}
// Here i is 10

function getthecurrentdate()
{
    document.getElementById("currentdate").innerHTML=Date();
}


//object
car = {type:"Fiat", model:"500", color:"white"};
function arraytest()
{
    document.getElementById("arraytest").innerHTML = car.type+"|"+car.model+"|"+car.color;
}


function demothingsonbuttonclick()
{
    var a=2;var  b=3;
    document.getElementById("demo").innerHTML = i+"Hello JavaScript"+(a+b);
}

var flag=true;
function changeimageon()
{
    
    if(flag){
        flag=false;
        document.getElementById('myImage').src='https://toppng.com/uploads/preview/light-bulb-on-off-png-11553940208oq66nq8jew.png';
    }
    else
    {
        flag=true;
        document.getElementById('myImage').src='https://toppng.com/uploads/preview/light-bulb-on-off-png-11553940186lbyqngqg1y.png';
    }
}

function changeparacontent()
{
    var x = 10;
    // Here x is 10
    {
    var x = 2;
    // Here x is 2
    }
    // Here x is 2


    //let concept
    var y = 10;
    // Here x is 10
    {
    let y = 2;
    // Here x is 2
    }
    // Here x is 10

    document.getElementById("mypara1").innerHTML = y+"|"+x;
}

function stringthings()
{
    var str="Hello world home world lol ";
    var sln = str.length;
    var pos = str.indexOf("world");
    var pos = str.lastIndexOf("world");
    var pos = str.search("world");
    var res = str.slice(-12, -6);
    var res = str.slice(7);
    var res = str.substring(7, 13);
    var n = str.replace("Microsoft", "W3Schools");
    var text2 = text1.toUpperCase();
    var text2 = text1.toLowerCase();

    var text1 = "Hello";
    var text2 = "World";
    var text3 = text1.concat(" ", text2);

    var str = "       Hello World!        ";
    alert(str.trim());
    var str = "       Hello World!        ";
    alert(str.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, ''));

    let str = "5";
    str = str.padStart(4,0);
    // result is 0005

    let str = "5";
    str = str.padEnd(4,0);
    // result is 5000
    var txt = "a,b,c,d,e";   // String
    txt.split(",");
    var txt = "Hello";       // String
    txt.split("");  
    var x = 10;
    var y = 20;
    var z = "30";
    var result = x + y + z;

    var x = 9.656;
    x.toFixed(0);           // returns 10
    x.toFixed(2);           // returns 9.66
    x.toFixed(4);           // returns 9.6560
    x.toFixed(6);           // returns 9.656000

    document.getElementById("newstringtest").innerHTML = pos;
    
}

function js_array()
{
    var cars = ["Saab", "Volvo", "BMW"];
}

</script>