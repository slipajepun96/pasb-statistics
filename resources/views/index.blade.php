@extends('layout.master')

@section('content')
<div class="m-2 bg-white w-auto rounded-xl p-3">
    <p class="text-2xl font-bold">Welcome :)</p>
 

    <div class=" flex flex-row">
        <div class="my-1 bg-cyan-900 w-1/2 md:w-1/6 rounded-lg p-2 text-white hover:bg-cyan-700">
            
            <div class="flex-inline"><span class="text-5xl"> 15.60</span><span class="text-sm"> MT/Ha</span></div>
            Current YPH <br> <p class="italic text-gray-500 text-sm"></p>
            <div class="flex-inline"><span class="text-sm"> 2021 : 13.35 MT/Ha</span></div>
            
            
        </div>
        <div class="my-1 ml-1 bg-cyan-900 w-1/2 md:w-1/6  rounded-lg p-2 text-white hover:bg-cyan-700">
            <div class="flex-inline"><span class="text-5xl"> 17,500</span><span class="text-sm"> MT</span></div>
            Total FFB MT <p class="italic text-gray-500 text-sm">until 30-11-2022</p>
        </div>
    </div>
    <hr class="my-2">
    Estate
    <div class=" flex flex-row">
        <div class="my-1 bg-gradient-to-r from-cyan-700 to-blue-500 w-1/2 md:w-1/6 rounded-lg p-2 text-white hover:bg-cyan-700">
            Ladang Koperasi Kg. Pasir
            <div class="flex-inline"><span class="text-3xl"> 15.60</span><span class="text-sm"> MT/Ha</span></div>
            Current YPH <br> <p class="italic text-gray-500 text-sm"></p>
            <div class="flex-inline"><span class="text-sm"> 2021 : 13.35 MT/Ha</span></div>
            
            
        </div>
    </div>
</div>
@endsection