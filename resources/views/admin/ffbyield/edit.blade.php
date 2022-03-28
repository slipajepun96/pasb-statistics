@extends('layout.admin-layout')

@section('admin-content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

</script>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold m-3">Edit FFB Daily Yield</span>
    <br>
    <div class="m-2">
        <form action="{{route('daily_yield-update',$dailyyield->id)}}" method="POST">
            @csrf 
            <div class="mb-4 mx-1 inline-block md:w-1/3 w-full ">
                <?php 
                    $date=$dailyyield->date;
                    $converted_date=date("d-m-Y",strtotime($date));
                ?>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                FFB Yield Date:
                </label>                 
                <input type="text" name="selectdate" value="{{$converted_date}}" id="selectdate"  class="shadow appearance-none border w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">    
                @error('date')
                    <span class="text-sm text-red-500"> {{$message}}</span>
                @enderror
                <?php 
                    $month=date('m');
                    $year=date('Y');
                    $today=date('Y-m-d');
                ?>
                <input type="text" name="date" id="date" value="{{$dailyyield->date}}" class="shadow appearance-none border w-1/2 w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" hidden>
                <input type="text" name="month" id="month" value="{{$dailyyield->month}}" class="shadow appearance-none border w-1/4 w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" hidden>    
                <input type="text" name="year" id="year" value="{{$dailyyield->year}}" class="shadow appearance-none border w-1/4 w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" hidden>    
            </div>
            <div class="mb-4  inline-block md:w-1/3 w-full  m-3"> 
                <label for="estate_id" class="block text-gray-700 text-sm font-bold mb-2">Estate : </label>
                <input type="text" name="estate_name" value="{{$dailyyield->estate->estate_name}}" class="shadow appearance-none border w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled> 
            </div>
            <div class="mb-4  inline-block md:w-1/6 w-full  m-3"> 
                <label for="ffb_mt" class="block text-gray-700 text-sm font-bold mb-2">Today FFB MT: </label><input type="text" name="ffb_mt" value="{{$dailyyield->ffb_mt}}" id="ffb_mt" class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <br>
            <div class="mb-4 inline-block md:w-1/3 w-full  m-3">
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-lg p-2">Submit &rarr; </button>
            </div>


        </form>
    </div>
</div>

@endsection