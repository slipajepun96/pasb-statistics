@extends('layout.admin-layout')

@section('admin-content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
            
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="ffb_daily_yield_upload" type="file">

            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Upload</button>
            </div>


        </form>
    </div>
</div>

@endsection