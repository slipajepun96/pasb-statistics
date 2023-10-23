@extends('layout.master')

@section('content')

<div class="m-2 bg-white w-auto rounded-xl p-3">
    <p class="text-lg font-medium">Welcome, {{Auth::user()->name;}}</p>
        <div class="p-1  bg-gray-100 rounded shadow mb-2">
            {!! $chart->container() !!}
        </div>

    <div class="flex flex-row">

        <div class="my-1 bg-cyan-900 w-1/2 lg:w-1/6 rounded-lg p-2 text-white hover:bg-cyan-700">
            
            <div class="flex-inline"><span class="text-3xl font-medium"> {{number_format($data_array[1],2)}}</span><span class="text-sm"> MT/Ha</span></div>
            2023 YPH <br> <p class="italic text-gray-500 text-sm"></p>
            <div class="flex-inline"><span class="text-sm"> 2021 : 11.40 MT/Ha</span></div>
            
            
        </div>
        <div class="my-1 ml-1 bg-cyan-900 w-1/2 lg:w-1/6  rounded-lg p-2 text-white hover:bg-cyan-700">
            <div class="flex-inline"><span class="text-3xl font-medium"> {{number_format($data_array[0],2)}}</span><span class="text-sm"> MT</span></div>
            Total FFB MT
        </div>
   
            <a href="{{route('ffbyield')}}" class="my-1 ml-1 bg-cyan-900 w-fit md:w-fit  rounded-lg p-2 text-white hover:bg-cyan-600">
                <div class="flex-inline"><span class="text-lg hover:underline">View <br>Details</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg></div>
            </a>
         </div>
    <hr class="my-2">
    {{-- <span class=" text-2xl">Estate</span><a href="" class="rounded-md  bg-yellow-400 p-0.5 mb-2 text-cyan-700 text-sm">VIEW MONTHLY FFB STATEMENT</a> --}}
    <div class=" flex flex-wrap w-full">
        @foreach($data_array[2] as $estate)
            <div class="m-1 bg-gradient-to-bl from-cyan-800 via-cyan-700 to-cyan-500 hover:from-cyan-600 hover:via-cyan-500 hover:to-cyan-300 w-full md:w-fit rounded-lg p-2 text-white hover:bg-cyan-700">
                {{$estate->estate_name}}
                <?php 
                    $number_of_array=count($data_array[3]);
                    for($j=0;$j<$number_of_array;$j++)
                    {
                        if($data_array[3][$j][0]==$estate->id)
                        {
                            ?><div class="flex-inline"><span class="text-2xl font-medium">{{number_format($data_array[3][$j][2],2)}}</span><span class="text-sm"> MT/Ha</span></div>
                            Current YPH <br>
                            {{-- <div class="flex-inline"><span class="text-sm"> Total FFB : {{number_format($data_array[3][$j][1],2)}} MT</span></div> --}}
                            <div class="flex-inline"><span class="text-sm"> 2021 : 13.35 MT/Ha</span></div> <?php
                        }
                    }
                ?>
                
                
            </div>
        @endforeach
    </div>

    <script src="{{$chart->cdn() }}"></script>
    {{$chart->script()}}
</div>
@endsection