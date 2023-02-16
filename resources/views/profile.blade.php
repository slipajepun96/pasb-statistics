@extends('layout.master')

@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-semibold">Account Profile & Setting</p>
</div>
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <div class="">   
        <label class="block text-gray-700 text-lg font-semibold">
        Your Account Profile
        </label>
    </div>
        <div class="mb-4 mt-2">    
            <label class="block text-gray-700 text-xs font-semibold uppercase">
            User Name
            </label>
            <p class="font-lg font-semibold">{{$user_data->name}}</p>
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-xs font-semibold uppercase">
            E-Mail
            </label>
            <p class="font-lg font-semibold">{{$user_data->email}}</p>
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-xs font-semibold uppercase">
            Account Level
            </label>
            <p class="font-lg font-semibold">{{$account_level}}</p>
        </div>
        <div class="mt-4 text-xs text-gray-500">    
            If you wish to change above details, please contact system administrator.
        </div>
</div>

<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <div class="">   
        <label class="block text-gray-700 text-lg font-semibold">
        Change your password
        </label>
    </div>
    <form action="{{route('change-password')}}" method="POST"  x-data="{password: '',password_confirm: ''}">
        @csrf
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            New Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus: focus:outline-gray-600 focus:shadow-outline" id="password" name="password" x-model="password" type="password" placeholder="enter a password">
            @error('email')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            New Password (again)
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus: focus:outline-gray-600 focus:shadow-outline" id="sec_password" name="sec_password" x-model="password_confirm" type="password" placeholder="enter the same password again">
            @error('sec_password')
            <span class="text-sm text-red"> {{$message}}</span>
            @enderror
        </div>
        <input class="w-full" id="email" name="email" type="text" value="{{$user_data->email}}" hidden>
        

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

        <button type="submit" class="bg-cyan-600 p-1.5 rounded text-sm hover:text-black hover:bg-cyan-400 text-white">Change Password</button>
    </form>
</div>
@endsection