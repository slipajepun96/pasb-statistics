@extends('layout.master')

@section('content')
{{-- <div class="p-2 bg-cyan-900 text-white shadow-xl items-center ">
    <p class="text-2xl font-bold m-2">Administrator Main Page</p>
<a href="{{route('main')}}" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Admin Home</a>
<a href="{{route('estate-index')}}" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Estates Setting</a>
<a href="{{route('budget-index')}}" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Budget Setting</a>
<a href="#" class="bg-cyan-400 text-black m-2 p-2 rounded-lg">Administrator Setting</a>
    
</div> --}}



<nav class="flex items-center p-1 flex-wrap bg-cyan-900 shadow">
    <a href="/" class="p-2 mr-4 inline-flex items-center text-white">
        <span class="text-xl font-bold tracking-wide">FFB Yield</span>
    </a>
    <button class="inline-flex p-3 mr-3 hover: rounded lg:hidden ml-auto nav-toggler2" data-target="#navigation2">
        {{-- <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M21,15.61L19.59,17L14.58,12L19.59,7L21,8.39L17.44,12L21,15.61M3,6H16V8H3V6M3,13V11H13V13H3M3,18V16H16V18H3Z" />
        </svg> --}}
        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
          </svg> --}}
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
          </svg>
          
          
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation2">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto flex flex-col">
            <a href="{{route('main')}}" class="lg:inline-flex lg:w-auto px-2 py-2 rounded text-white hover:bg-cyan-400 hover:text-black"><span>Monthly Report</span></a>
            <a href="{{route('estate-index')}}" class="lg:inline-flex lg:w-auto px-2 py-2 rounded text-white hover:bg-cyan-400 hover:text-black"><span>Yearly Report</span></a>
        </div>
    </div>
</nav>

@yield('ffbyield-content')

@endsection