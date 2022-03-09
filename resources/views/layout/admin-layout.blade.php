@extends('layout.master')

@section('content')
<div class="p-2 bg-cyan-900 text-white shadow-xl items-center ">
    <p class="text-2xl font-bold m-2">Administrator Main Page</p>
<a href="{{route('main')}}" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Admin Home</a>
<a href="{{route('estate-index')}}" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Estates Setting</a>
<a href="#" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Administrator Setting</a>
    
</div>

@yield('admin-content')

@endsection