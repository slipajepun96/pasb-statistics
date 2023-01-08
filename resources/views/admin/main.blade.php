@extends('layout.admin-layout')

@section('admin-content')
<?php   use \App\Http\Controllers\DailyYieldController; ?> 

<div class="bg-white m-2 p-2 text-black rounded-xl">
<?php
    $dateObj   = DateTime::createFromFormat('!m', $data_array[0]);
    $monthName = $dateObj->format('F'); // March
?>
    <span class="text-xl font-bold">FFB Daily Yield for {{$monthName}} {{$data_array[1]}}</span>
    @if(session('status'))
        <div class="bg-yellow-400 text-black p-2 rounded m-3" id="status_message">
            [INFO]{{session('status')}}
        </div>
    @endif
    @if(session('delete'))
    <div class="bg-red-400 text-black p-2 rounded m-3" id="status_message">
        {{session('delete')}}
    </div>
    @endif
    <br>

        <div class="mb-4 m-3 inline-flex">
            <div class="my-3"><a href="{{route('daily_yield-add')}}" class="p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add</a> &nbsp;</div>
            
            
                <form action="{{route('index_monthsearch')}}" class="block outline outline-solid outline-sky-500 rounded-lg px-1 m-1" method="POST">
                    @csrf 
                    <select name="month_year_selected" id="month_year_selected" class=" shadow border rounded m-1 p-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flex-none">
                        @foreach($data_array[2] as $data)
                        <?php
                        $pass_data=0;
                        $month_year_selected=DailyYieldController::monthYearConvert($data->month,$data->year);
                        if(($data->month==$data_array[0])&&($data->year==$data_array[1]))
                            {
                        ?>
                            <option value="<?php echo($month_year_selected);?>" selected><?php echo($month_year_selected);?></option>
                        <?php }
                        else{
                            ?>
                                <option value="<?php echo($month_year_selected);?>"><?php echo($month_year_selected);?></option>
                            <?php 
                        } ?>
                        @endforeach
                    </select>
                    <button type="submit" class="shadow rounded-lg bg-cyan-400 px-3 py-1 ">
                       go
                    </button>
                </form>
            
        </div>
     

     
    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="20%" class="border border-blue-900 p-1 display-none">Date</td>
                    <td width="25%" class="border border-blue-900 p-1">Estate</td>
                    <td width="15%" class="border border-blue-900 p-1">Today FFB (MT)</td>
                    <td width="20%" class="border border-blue-900 p-1">Action</td>
                </tr>
            </thead>
            <tbody>
                @if($dailyyields->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                @foreach($dailyyields as $dailyyield)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-5 display-none">{{$dailyyield->date}}</td>
                        <td class="border border-gray-300 p-1 px-5">{{$dailyyield->estate->abbreviation}}</td>
                        <td class="border border-gray-300 p-1 px-5">{{$dailyyield->ffb_mt}}</td>
                        <td class="border border-gray-300 p-1  ">
                            <div class="inline-flex">
                            
                            {{-- edit button --}}
                            <form action="/admin/ffb/daily_yield/edit/{{$dailyyield->id}}" method="GET">
                                @csrf 
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-1 m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </form>
                            {{-- delete button --}}
                            <form action="/admin/ffb/daily_yield/delete/{{$dailyyield->id}}" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                                @csrf 
                                <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-1 m-1">
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
    <div class="m-2">
        {{-- {{$dailyyields->links()}} --}}
    </div>


</div>



@endsection