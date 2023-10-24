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
        <span class="text-lg font-bold m-3">Yield/MT for Estate</span>
        <div class="flex-inline flex">
            <div class="m-2">
                
                <a href="/admin/ffb/estate_yield/add"><button class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg inline-flex">
                + Add New Yield</button></a>
            </div>
            <div class="m-2 ml-1">
                <a href="{{route('daily_yield-upload_view')}}" class="flex flex-row p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                </svg>&nbsp
                Upload </a>
            </div>
        </div>
    <div class="m-2">
        @foreach($estates_list as $estate_list)
            <div class="border border-cyan-700 rounded-lg m-1 p-2 ">
                <div class="text-md text-black font-medium">{{$estate_list->estate_name}}</div>
                <div class="inline-flex">
                    @foreach($cum_ffbs_list as $cum_ffb_list)
                        @if($cum_ffb_list->estate_id==$estate_list->id)
                            <form action="{{route("estate-yield-view")}}" method="POST">
                                @csrf
                                <input type="hidden" name="year" value="{{$cum_ffb_list->year}}">
                                <input type="hidden" name="estate_id" value="{{$cum_ffb_list->estate_id}}">
                                <button type="submit" class="bg-cyan-700 text-white m-1 p-1 rounded">{{$cum_ffb_list->year}}</button>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
        

    </div>
</div>

@endsection