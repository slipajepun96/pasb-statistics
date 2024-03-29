@extends('layout.master')

@section('content')
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-bold">First Time Login</p>
    @if(session('status'))
        <div class="flex p-4 mb-4 text-yellow-700 border-t-4 border-yellow-300 bg-yellow-50 " role="alert" id="status_message">
            <div class="ml-3 text-sm font-medium">
                {{session('status')}}
            </div>
        </div>
    @endif
    <p class="text-sm"> Please use credentials given in the email</p>
    <form action="{{route('firsttimelogin')}}" method="POST">
        @csrf
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            E-Mail Address
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="enter an e-mail address">
            @error('email')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Temporary Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="enter your password">
            @error('password')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="bg-cyan-600 p-2 rounded hover:text-black hover:bg-cyan-400 text-white">Log Me In </button>
        <p class="text-gray-700">&copy;2022-Code owned by <a href="https://www.github.com/slipajepun96" class="underline">Umar Qayyum</a></p>
        <p class="text-gray-400">v 1.0</p>
    </form>

    
</div>
@endsection