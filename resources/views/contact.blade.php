@extends('layouts.app')


@section('content')
    <h1>Contact page</h1>

    @if(count($people))

    <ul>
    @foreach($people as $person)
    
    <li>{{$person}}</li>
    @endforeach
    </ul>
    @endif



    <!-- below works to end the section -->
@endsection


@section('footer')
    <script>
    var el = document.getElementsByTagName('html');
    for (let e of el) {e.style.backgroundColor = "honeydew"}
    
    
    </script>
@endsection