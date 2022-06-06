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
    <span class="text-2xl font-bold m-2 my-3">{{$estate_detail->estate_name}}'s details</span>
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
        <a href="{{route('estate-index')}}"><button class=" p-2 bg-yellow-400 hover:bg-yellow-400 rounded-lg text-black shadow-lg inline-flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 18 18" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
              </svg>&nbsp;Back
            
            </button></a>
            <a href="{{route('estate-view-print',$estate_detail->id)}}"><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-2">Print PDF
            </button></a>
    </div>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="5%" class="border border-blue-900 p-3">Estate Name</td>
                    <td width="30%" class="border border-blue-900 p-3">{{$estate_detail->estate_name}}</td>
                
                </tr>
            </thead>
            <tbody>               
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Abbreviation</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->abbreviation}}</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Manager Name</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->manager_name}}</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Year of Planting</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->year}}</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Total Area</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->total_area}} Ha.</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Planted Area</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->planted_area}} Ha.</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Matured Area</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->matured_area}} Ha.</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Inmatured Area</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->inmatured_area}} Ha.</td>
                    </tr>
                    <tr class="h-30 border border-black hover:bg-cyan-50 min-h-full">
                        <td class="p-3 px-5 border border-black">Plant Type</td>
                        <td class="p-3 px-5 border border-black">{{$estate_detail->plant_type}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection