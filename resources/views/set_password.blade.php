@extends('layout.master')

@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-bold">First Time Login</p>
    <div class="flex p-2 mb-4 text-green-700 border-t-4 border-green-300 bg-green-50 " role="alert" id="status_message">
        <div class=" text-sm font-medium">
            Now, please set a new password.
        </div>
    </div>
    <form action="{{route('register-user')}}" method="POST"  x-data="{password: '',password_confirm: ''}">
        @csrf
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus: focus:outline-gray-600 focus:shadow-outline" id="password" name="password" x-model="password" type="password" placeholder="enter a password">
            @error('email')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Password (again)
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus: focus:outline-gray-600 focus:shadow-outline" id="sec_password" name="sec_password" x-model="password_confirm" type="password" placeholder="enter the same password again">
            @error('sec_password')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <input class="w-full" id="email" name="email" type="text" value="{{$user->email}}" >
        <input class="w-full" id="name" name="name" type="text" value="{{$user->name}}" >
        

        <div class="flex justify-start mt-3 ml-4 p-1">
            <ul>
                <li class="flex items-center py-1">
                    <div :class="{'bg-green-200 text-green-700': password == password_confirm && password.length > 0, 'bg-red-200 text-red-700':password != password_confirm || password.length == 0}"
                         class=" rounded-full p-1 fill-current ">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="password == password_confirm && password.length > 0" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                            <path x-show="password != password_confirm || password.length == 0" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>

                        </svg>
                    </div>
                    <span :class="{'text-green-700': password == password_confirm && password.length > 0, 'text-red-700':password != password_confirm || password.length == 0}"
                          class="font-medium text-sm ml-3"
                          x-text="password == password_confirm && password.length > 0 ? 'Passwords match' : 'Passwords do not match' "></span>
                </li>
                <li class="flex items-center py-1">
                    <div :class="{'bg-green-200 text-green-700': password.length > 7, 'bg-red-200 text-red-700':password.length < 7 }"
                         class=" rounded-full p-1 fill-current ">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="password.length > 7" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                            <path x-show="password.length < 7" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>

                        </svg>
                    </div>
                    <span :class="{'text-green-700': password.length > 7, 'text-red-700':password.length < 7 }"
                          class="font-medium text-sm ml-3"
                          x-text="password.length > 7 ? 'The minimum length is reached' : 'At least 8 characters required' "></span>
                </li>
            </ul>
        </div>

        <button type="submit" class="bg-cyan-600 p-2 rounded hover:text-black hover:bg-cyan-400 text-white">Log Me In </button>
        <p class="text-gray-700">&copy;2022-Code owned by <a href="https://www.github.com/slipajepun96" class="underline">Umar Qayyum</a></p>
        <p class="text-gray-400">v 1.0</p>
    </form>



    
</div>
@endsection