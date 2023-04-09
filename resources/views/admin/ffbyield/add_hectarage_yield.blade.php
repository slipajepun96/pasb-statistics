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

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-lg font-medium m-3">Add New Yield/MT for Previous Year</span>
    <div class="m-2">
        <form action="{{route('estate-yield-store')}}" method="POST">
            @csrf 
            <div class="mb-4  inline-block md:w-1/3 w-full  m-3"> 
                <label for="estate_id" class="block text-gray-700 text-sm font-bold mb-2">Estate : </label>
                <select name="estate_id" id="estate_id" class="w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach($estate_list as $estate)
                        <option value="{{$estate->id}}">{{$estate->abbreviation}} - {{$estate->estate_name}}</option>
                    @endforeach
                </select>
            </div>
            <?php 
            $current_year=date("Y");
            $next_year=$current_year;
            // dd($next_year);
            ?>
            <div class="mb-4 inline-block md:w-1/12 w-full  m-3"> 
                <label for="estate_name" class="block text-gray-700 text-sm font-bold mb-2"> Year: 
                    <input type="text" name="year" id="year" value="<?php echo $next_year;?>" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></td>
                    </label>
            </div>
            @if(session('status'))
            <div class="flex p-4 mb-4 text-yellow-700 border-t-4 border-yellow-300 bg-yellow-50 " role="alert" id="status_message">
            <div class="ml-3 text-sm font-medium">
                {{session('status')}}
            </div>
             </div>
            @endif
            <div class="flex p-1 mb-4 text-red-700 border-t-4 border-red-300 bg-red-100 " >
                <div class="ml-3 text-sm font-bold">
                    WARNING!
                </div>
                <div class="ml-3 text-sm font-medium">
                    Please use this function only if Yield/MT for the ESTATE and YEAR does not exist. 
                </div>
            </div>
            <div class="w-full items-center form">
                <table class="border-collapse w-full md:w-1/2 ">
                    <thead>
                        <tr class="bg-cyan-700 text-white">
                            <td width="33%" class="border-y border-blue-900 p-3 text-center">Month</td>
                            <td width="33%" class="border-y border-blue-900 p-3 text-center">Estimated FFB Yield/Hectare (MT/Ha)</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">January</td>
                            <td><input type="text" name="month1" id="1" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>                            
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">February</td>
                            <td><input type="text" name="month2" id="2" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">March</td>
                            <td><input type="text" name="month3" id="3" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                            
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">April</td>
                            <td><input type="text" name="month4" id="4" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">May</td>
                            <td><input type="text" name="month5" id="5" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">June</td>
                            <td><input type="text" name="month6" id="6" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">July</td>
                            <td><input type="text" name="month7" id="7" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">August</td>
                            <td><input type="text" name="month8" id="8" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">September</td>
                            <td><input type="text" name="month9" id="9" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">October</td>
                            <td><input type="text" name="month10" id="10" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">November</td>
                            <td><input type="text" name="month11" id="11" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                        <tr class="h-30 text-center min-h-full border-y border-blue-900 bg-cyan-600/50">
                            <td class="">December</td>
                            <td><input type="text" name="month12" id="12" class="w-3/4 shadow appearance-none rounded py-2 text-gray-700 leading-tight focus:outline-y focus:shadow-outline" value="0">MT/Ha.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">                 
                <button type="reset" class="bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-lg p-2">Reset Form </button>
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection