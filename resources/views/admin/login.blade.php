@extends('layout.blank')

@section('content')
<div class="p-3 max-w-sm m-auto my-2 bg-white rounded-xl items-centershadow-xl ">
    <div class="flex flex text-center">
    <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="fill-current text-cyan-600">
        <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,10.84 21.79,9.69 21.39,8.61L19.79,10.21C19.93,10.8 20,11.4 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4C12.6,4 13.2,4.07 13.79,4.21L15.4,2.6C14.31,2.21 13.16,2 12,2M19,2L15,6V7.5L12.45,10.05C12.3,10 12.15,10 12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12C14,11.85 14,11.7 13.95,11.55L16.5,9H18L22,5H19V2M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12H16A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8V6Z" />
    </svg>&nbsp;
    <span class="text-xl font-semibold tracking-wide text-cyan-600 ">PASB - Statistics</span>
    </div><hr class="my-2">
    <p class="text-2xl font-semibold ">Login</p>
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
            <span class="text-xs text-red-500"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
            Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="enter your password">
            @error('password')
            <span class="text-xs text-red-500"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4 flex items-center"><input type="checkbox" name="remember" id="remember" class="w-4 h-4 m-1 text-cyan-600 bg-gray-100 border-cyan-300 rounded focus:ring-cyan-500 ">Remember Me</div>
        <button type="submit" class="bg-cyan-600 p-1.5 px-3 rounded hover:text-black hover:bg-cyan-500 text-sm text-white inline shadow-lg">Log In 
          </button> 
        <button type="submit" class="hover:underline text-sm ml-2">Forget Password? </button>
        <a><button href="" class="hover:underline text-sm ml-2">First Time Login </button></a>
        <div class="mt-2 flex flex-row"><p class="text-gray-400 text-xs">v 1.0&nbsp;&copy;2022-Code owned by <a href="https://www.github.com/slipajepun96" class="underline">umar qayyum</a></p></div>
        
    </form>

    
</div>
@endsection