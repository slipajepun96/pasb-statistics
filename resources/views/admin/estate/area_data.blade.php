@extends('layout.admin-layout')

@section('admin-content')

<style>
    @media only screen and (max-width: 900px) {
    .display-none{
        display: none;
    }
}
</style>
@if(session('status'))
<div class="flex p-4 mb-4 text-yellow-700 border-t-4 border-yellow-300 bg-yellow-50 " role="alert" id="status_message">
<div class="ml-3 text-sm font-medium">
    {{session('status')}}
</div>
 </div>
@endif
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-2 my-3">{{$estate->estate_name}}'s Area Profile</span>
    <br>

    </div>



    <div class="m-2 bg-white rounded-xl p-2">
   
        <div class="text-md text-gray-700 " >
            <button onClick="showForm()" class="inline-flex p-1 ">Add New Area 
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
          </svg>
          </button>
        </div>
            <div id=areaForm style="display:none;"> 
                <form action="{{route('area-estate-store')}}" method="POST">
                    @csrf
                    <div class="mb-4 inline-block md:w-1/12 w-full"> 
                        <label for="current_year" class="block text-gray-700 text-sm font-bold mb-2"> Year: </label><input type="text" name="current_year" value="{{date('Y')}}" id="current_year" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4 inline-block md:w-1/6 w-full"> 
                        <label for="immatured_area" class="block text-gray-700 text-sm font-bold mb-2"> Immatured Area (Ha.) : </label><input type="text" name="immatured_area" value="0" id="immatured_area" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4 inline-block md:w-1/6 w-full"> 
                        <label for="matured_area" class="block text-gray-700 text-sm font-bold mb-2"> Matured Area (Ha.) : </label><input type="text" name="matured_area" id="matured_area" value="0"  class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4 inline-block md:w-1/6 w-full"> 
                        <label for="planted_area" class="block text-gray-700 text-sm font-bold mb-2"> Planted Area (Ha.) : </label><input type="text" name="planted_area" id="planted_area" value="0" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4 inline-block md:w-1/6 w-full"> 
                        <label for="total_area" class="block text-gray-700 text-sm font-bold mb-2"> Total Area (Ha.) : </label><input type="text" name="total_area" id="total_area" value="0" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <input type="text" name="estate_id" id="estate_id" value="{{$estate->id}}" hidden>
                    <div class="inline-block md:w-1/6 w-full  m-3">                 
                        <button type="reset" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 inline-flex mx-1 text-white">Reset Form </button>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 rounded-lg p-2 inline-flex mx-1 text-white">Submit &rarr; </button>
                    </div>
                </form>
            </div>
        </div>
<div class="bg-white m-2 p-2 text-black rounded-xl">

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-900 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3" width="70%">
                            Detail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($estate_area_lists->count()==0)
                            <tr>
                                <td colspan=2>Empty List <br>(contact administrator if you think this is an error)</td>
                            </tr>
                    @else
                    @foreach($estate_area_lists as $estate_area_list)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-bold  whitespace-nowrap">
                            {{$estate_area_list->current_year}}-Area : {{$estate_area_list->total_area}} Ha. <div class="display-none"> Planted Area : {{$estate_area_list->planted_area}} Ha. , Matured Area : {{$estate_area_list->matured_area}} Ha. , Immatured Area : {{$estate_area_list->immatured_area}} Ha. </div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="inline-flex">
                                {{-- delete button --}}
                                <form action="\" method="POST" onsubmit="return confirm('Are you sure to delete {{$estate_area_list->current_year}} data ?')">
                                    @csrf 
                                    <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 inline-flex mx-1 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg>
                                           Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                        @endif
                </tbody>
            </table>
        </div>

        <script>
            function showForm() {
              var x = document.getElementById("areaForm");
              if (x.style.display === "block") {
                x.style.display = "none";


              } else {
                x.style.display = "block";
              }
            }
            setTimeout(function() 
            {
                $('#status_message').fadeOut('fast');
            }, 3000);
            
            </script>


@endsection