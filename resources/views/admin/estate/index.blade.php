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
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="5%" class="border border-blue-900 p-3 display-none">ID</td>
                    <td width="30%" class="border border-blue-900 p-3">Estate Name</td>
                    <td width="20%" class="border border-blue-900 p-3">Plant Type</td>
                    <td width="15%" class="border border-blue-900 p-3 display-none">Manager Name</td>
                    <td width="20%" class="border border-blue-900 p-3">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($estate_lists->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                @foreach($estate_lists as $estate_list)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-3 px-5 display-none">{{$estate_list->id}}</td>
                        <td class="border border-gray-300 p-3 px-5">{{$estate_list->estate_name}}</td>
                        <td class="border border-gray-300 p-3 px-5">{{$estate_list->plant_type}}</td>
                        <td class="border border-gray-300 p-3 px-5 display-none">{{$estate_list->manager_name}}</td>
                        <td class="border border-gray-300 p-3 px-5 ">
                            <div class="inline-flex">
                            {{-- view button --}}
                            <a href="#"><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </button></a>
                            {{-- edit button --}}
                            <form action="" method="GET">
                                @csrf 
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </form>
                            {{-- delete button --}}
                            <form action="" method="GET">
                                @csrf 
                                <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
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

@endsection