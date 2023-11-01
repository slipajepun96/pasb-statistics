@extends('layout.admin-layout')

@section('admin-content')
<style>
    .form{
        input {
      text-align: right;
        }
    }
    
  </style>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>  


        {{-- <span class="text-lg font-bold m-3">Yield/MT for Ladang Sungai Kerpai</span> --}}
        <?php 
        for($a=0;$a<12;$a++)
        {
            $data_array[$a][0]="Data Not Available"; //set data not available as default for mt
            $data_array[$a][1]="No_ID"; //set 0 as default for sql row id
        }
        for($a=0;$a<12;$a++)
        {
            foreach($cum_ffbs as $cum_ffb)
            {
                $b=$a+1;
                if($b==$cum_ffb->month)
                {
                    $data_array[$a][0]=$cum_ffb->cumulative_ffb_mt;
                    $data_array[$a][1]=$cum_ffb->id;
                }
            }
        }
    ?>
    <div class="m-2">
        <div class="p-3 max-w-md mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
            <div class="">   
                {{-- <button onclick="history.go(-1);" class=" bg-yellow-400 m-1 p-1 rounded inline-flex shadow-md hover:bg-yellow-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                  </svg>
                  
                  Back </button> --}}
                  <a href="{{route('estate-yield')}}"><span><button onclick="history.go(-1);" class=" bg-yellow-400 m-1 p-1 rounded inline-flex shadow-md hover:bg-yellow-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                  </svg>
                  
                  Back </button></span></a>
                <label class="block text-gray-700 text-lg font-semibold">
                    {{$year}} Yield/MT for <br>{{$estate_name}}
                </label>
            </div>
            
            <table class="border-collapse border border-green-900 w-full">
                <thead>
                    <tr class="bg-gray-200 p-3 font-bold">
                        <td width="5%" class="border border-blue-900 p-3 display-none">Month</td>
                        <td width="30%" class="border border-blue-900 p-3">FFB Yield</td>
                        <td width="5%" class="border border-blue-900 p-3">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=12;$i++)
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 px-5">{{$i}}</td>
                            <td class="border border-gray-300 p-3 px-5">{{$data_array[$i-1][0]}} MT</td>
                            <td class="border border-gray-300 p-3 px-5">
                                <form action="{{route('estate-yield-recalculateEstateYield')}}" method="POST">
                                    @csrf
                                    {{-- {{$data_array[$i-1][1]}} --}}
                                    {{-- {{$estate_id;}} --}}
                                    {{-- {{$i;}} --}}
                                    <?php
                                    $month=0;
                                        if($i>=1 && $i<10)
                                        {
                                            $month="0".$i;
                                        }
                                        else
                                        {
                                            $month=$i;
                                        }
                                    ?>
                                    {{-- {{$cum_ffbs[$i-1]->id;}} --}}
                                    {{-- {{$year;}} --}}
                                    <input type="hidden" name="month" value="{{$month}}">
                                    <input type="hidden" name="estate_id" value="{{$estate_id}}">
                                    <input type="hidden" name="year" value="{{$year}}">
                                    <input type="hidden" name="id" value="{{$data_array[$i-1][1]}}">
                                    <button type="submit">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97"/>
                                          </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endfor
    
                </tbody>
            </table>

        </div>
        

    </div>

@endsection