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
            $data_array[$a]="Data Not Available";
        }
        for($a=0;$a<12;$a++)
        {
            foreach($cum_ffbs as $cum_ffb)
            {
                $b=$a+1;
                if($b==$cum_ffb->month)
                {
                    $data_array[$a]=$cum_ffb->cumulative_ffb_mt;
                }
            }
        }
    ?>
    <div class="m-2">
        <div class="p-3 max-w-md mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
            <div class="">   
                <button onclick="history.go(-1);" class=" bg-yellow-400 m-1 p-1 rounded inline-flex shadow-md hover:bg-yellow-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                  </svg>
                  
                  Back </button>
                <label class="block text-gray-700 text-lg font-semibold">
                    {{$year}} Yield/MT for <br>{{$estate_name}}
                </label>
            </div>
            <table class="border-collapse border border-green-900 w-full">
                <thead>
                    <tr class="bg-gray-200 p-3 font-bold">
                        <td width="5%" class="border border-blue-900 p-3 display-none">Month</td>
                        <td width="30%" class="border border-blue-900 p-3">FFB Yield</td>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=12;$i++)
                        <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                            <td class="border border-gray-300 p-3 px-5">{{$i}}</td>
                            <td class="border border-gray-300 p-3 px-5">{{$data_array[$i-1]}} MT</td>
                        </tr>
                    @endfor
    
                </tbody>
            </table>

        </div>
        

    </div>

@endsection