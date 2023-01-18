@extends('layout.admin-layout')

@section('admin-content')

<style>
    @media only screen and (max-width: 900px) {
    .display-none{
        display: none;
    }
}
</style>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-2 my-3">{{$estate->estate_name}}s Area Profile</span>
    <br>
    @if(session('status'))
        <div class="bg-yellow-400 text-black p-2 rounded m-3" id="status_message">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>{{session('status')}}
        </div>
    @endif
        <div class="m-2">
    </div>
    <div class="m-2">



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

    </div>
</div>

@endsection