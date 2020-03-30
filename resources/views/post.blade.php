@extends('layouts.app')

@section('content')
    <h1>Post ID:{{$id}}, <br>name:{{$name}}, <br>login:{{$login}}</h1>
    <h2></h2>
@endsection

@section('footer')
<script>document.body.style.backgroundColor = "honeydew" 
let x = document.getElementsByTagName('h2');
console.log(x)
for (let i of x) { i.textContent = `Hello {{$name}}`}

</script>
@endsection