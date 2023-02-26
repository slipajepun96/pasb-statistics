@extends('layout.master')

@section('content')
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-semibold">Login</p>
    @if(session('success'))
        <div class="flex p-4 mb-4 text-green-700 border-t-4 border-green-300 bg-green-50 " role="alert" id="status_message">
            <div class="text-sm font-medium">
                {{session('success')}}
            </div>
        </div>
    @endif

    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
            E-Mail Address
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="enter an e-mail address">
            @error('email')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
            Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="enter your password">
            @error('password')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4 flex items-center"><input type="checkbox" name="remember" id="remember" class="w-4 h-4 m-1 text-cyan-600 bg-gray-100 border-cyan-300 rounded focus:ring-cyan-500">Remember Me</div>
        <button type="submit" class="bg-cyan-600 p-1.5 rounded hover:text-black hover:bg-cyan-400 text-sm text-white">Log Me In </button>
        <button type="submit" class="border border-cyan-600 p-1.5 rounded hover:text-white text-sm hover:bg-cyan-600">Forget Password? </button>
        <a><button href="" class="border border-cyan-600 p-1.5 rounded hover:text-white text-sm hover:bg-cyan-600">First Time Login </button></a>
        <p class="text-gray-700">&copy;2022-Code owned by <a href="https://www.github.com/slipajepun96" class="underline">Umar Qayyum</a></p>
        <p class="text-gray-400">v 1.0</p>
    </form>

    
</div>
@endsection