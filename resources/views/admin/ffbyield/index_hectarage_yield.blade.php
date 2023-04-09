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
    <div class="m-2">
        @foreach($estates_list as $estate_list)
            <div class="border border-cyan-700 rounded-lg m-1 p-2 ">
                <div class="text-md text-black font-bold">{{$estate_list->estate_name}}</div>
                <div class="inline-flex">
                    @foreach($cum_ffbs_list as $cum_ffb_list)
                        @if($cum_ffb_list->estate_id==$estate_list->id)
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="year" value="{{$cum_ffb_list->year}}">
                                <input type="hidden" name="year" value="{{$cum_ffb_list->estate_id}}">
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