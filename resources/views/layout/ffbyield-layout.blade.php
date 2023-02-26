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
        <span class="text-lg font-medium text-clip">FFB Yield</span>
    </a>
    <button class="inline-flex p-3 mr-3 hover: rounded lg:hidden ml-auto nav-toggler2" data-target="#navigation2">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
          </svg>
          
          
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation2">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto flex flex-col">
            <a href="{{route('ffbyield')}}" class="lg:inline-flex lg:w-auto px-2 py-2 rounded text-white hover:bg-cyan-400 hover:text-black <?php if($current_page=="daily_report") {?> bg-cyan-700 <?php }?>"><span>Daily FFB Output Report</span></a>
            <a href="{{route('monthly_report')}}" class="lg:inline-flex lg:w-auto px-2 py-2 rounded text-white hover:bg-cyan-400 hover:text-black <?php if($current_page=="monthly_report") {?> bg-cyan-700 <?php }?>"><span>Yearly Report</span></a>
        </div>
    </div>
</nav>

@yield('ffbyield-content')

@endsection