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
    <span class="text-2xl font-bold m-2 my-3">Estates Listing</span>
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
        <a href="{{route('estate-add')}}" class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add New Estate</a>
    </div>
    <div class="m-2">



        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-900 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3" width="60%">
                            Estate Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($estate_lists->count()==0)
                            <tr>
                                <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                            </tr>
                    @else
                    @foreach($estate_lists as $estate_list)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-bold  whitespace-nowrap">
                            {{$estate_list->estate_name}}
                        </th>
                        <td class="px-6 py-4">
                            <div class="inline-flex">
                                {{-- view button --}}
                                <a href="{{route('estate-view',$estate_list->id)}}"><button class="bg-cyan-600 hover:bg-cyan-700 rounded-lg p-2 text-white inline-flex mx-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg> View 
                                </button></a>
                                {{-- edit button --}}
                                <form action="/admin/estate/area/{{$estate_list->id}}" method="GET">
                                    @csrf 
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2 inline-flex mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg> Modify Area
                                    </button>
                                </form>
                                {{-- edit button --}}
                                <form action="/admin/estate/edit/{{$estate_list->id}}" method="GET">
                                    @csrf 
                                    <button type="submit" class="bg-yellow-500 hover:bg-red-800 rounded-lg p-2 inline-flex mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg> Edit
                                    </button>
                                </form>
                                {{-- delete button --}}
                                <form action="/admin/estate/delete/{{$estate_list->id}}" method="POST" onsubmit="return confirm('Are you sure to delete {{$estate_list->estate_name}} ?')">
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