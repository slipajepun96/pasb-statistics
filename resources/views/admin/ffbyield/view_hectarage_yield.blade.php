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
        

    <div class="m-2">
        <div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
            <div class="">   
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
                            @foreach($cum_ffbs as $cum_ffb)
                                @if($i===$cum_ffb->month)
                                    <td class="border border-gray-300 p-3 px-5">{{$cum_ffb->cumulative_ffb_mt}} MT</td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor
    
                </tbody>
            </table>

        </div>
        

    </div>

@endsection