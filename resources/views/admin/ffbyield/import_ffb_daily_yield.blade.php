@extends('layout.admin-layout')

@section('admin-content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
{{-- 
<script>
       $(function() {
  $('input[name="selectdate"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 2019,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
      format: 'DD-MM-YYYY'
    }
}, function(start, end, label) {
    var month = start.format('MM');
    document.getElementById("month").value=month;
    var year = end.format('YYYY');
    document.getElementById("year").value=year;
    var date = end.format('YYYY-MM-DD');
    document.getElementById("date").value=date;

  });
});

    function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 2 ? 'inline-block' : 'none';
}

</script> --}}
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Import FFB Daily Yield</span>
    <br>
    @if(session('status_message'))
        <div class="bg-green-400 text-black p-2 rounded m-3" id="status_message">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>{{session('status_message')}}
        </div>
    @endif
    <br>
    <div class="m-2">
        <form action="{{route('daily_yield-upload_import')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            {{-- <div class="mb-4 mx-1 inline-block md:w-1/3 w-full ">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                File Upload
                </label>                 
                <input type="file" name="ffb_daily_yield_upload" id="ffb_daily_yield_upload"  class="shadow appearance-none border w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">    
                @error('ffb_daily_yield_upload')
                    <span class="text-sm text-red-500"> {{$success}}</span>
                @enderror
            </div> --}}

            <p class="text-sm text-gray-700">Drop your .xlsx file (Microsoft Excel file) to the box. Kindly ensure that those file is template from <a href="" class="underline">here</a> only.</p>
            
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload file</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="uploaded_file" name="uploaded_file" type="file">

            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Upload</button>
            </div>


        </form>
    </div>
</div>

@endsection