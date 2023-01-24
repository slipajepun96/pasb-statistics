@extends('layout.ffbyield-layout')

@section('ffbyield-content')
<?php   use \App\Http\Controllers\FFBYieldController; ?> 
<?php   use \App\Http\Controllers\DailyYieldController; ?> 
<?php
    $dateObj   = DateTime::createFromFormat('!m', $data_array[1]);
    $monthName = $dateObj->format('F'); // March
?>
<div class="w-auto md:inline-flex ">
    <div class="m-3 mb-1 bg-white rounded-xl p-1 ">

    <div class=" inline-flex block rounded-lg">
        <form action="{{route('ffbyield_search')}}" method="POST">
            @csrf 
                <select name="month_year_selected" id="month_year_selected" class=" shadow border rounded-lg m-1 p-1.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flex-none">
                    @foreach($data_array[7] as $data)
                    <?php
                    $pass_data=0;
                    $month_year_selected=DailyYieldController::monthYearConvert($data->month,$data->year);
                    if(($data->month==$data_array[1])&&($data->year==$data_array[0]))
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
                <button type="submit" class="shadow rounded-lg bg-green-700 p-1 text-white inline-flex">
                   View<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                  </svg>
                </button>
            </form>
        </div>
</div>  
<div class="m-3 mb-1 bg-white rounded-xl p-1 ">

                
                <div class="lg:ml-auto inline-flex">
                <h3 class="p-2">Export to : </h3>
                <a href="" class="shadow rounded-lg bg-pink-700 p-1 text-white inline-flex m-1 ">
                        PDF<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                </a>
                <a href="" class="shadow rounded-lg bg-green-700 p-1 text-white inline-flex m-1 ">
                    Excel<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
            </a>
            </div>

        </div>
    </div>
        
 

<div class="m-3 bg-white w-auto rounded-xl p-3">
    <p class="text-2xl font-bold">Cumulative Monthly FFB Output Statement for 2022</p>


    {{-- <p class="italic text-gray-700">Last Updates: 18 January 2022</p> --}}
    {{-- <p>~Table here~</p> --}}
    <?php $o=1;
    // $no_of_estates=count($data_array[2]);
    $no_of_estates=100;
    for($a=0;$a<$no_of_estates;$a++)
    {
        // $cumulative_ffb_mt[$a][0]=$data_array[2][$a]->id; //put estate id 
        $cumulative_ffb_mt[$a][0]=0; //put 0 as initial mt
        $cumulative_ffb_mt[$a][1]=0; //put 0 as initial date
    }
    //var for cumulative total ffb by day
    $cumulative_total_ffb_by_day=0;
    //loop for all estate ffb cumulative
    for($b=1;$b<=31;$b++)
    {
        $cumulative_total_ffb[$b]=0;
       
    }
    ?>
@foreach($ffbyields as $ffbyield)
    <?php 
        $date=DateTime::createFromFormat("Y-m-j",$ffbyield->date);
        $day=$date->format("j");
        $ffb_array[$o][0]=$ffbyield->id;
        $ffb_array[$o][1]=$ffbyield->date;
        $ffb_array[$o][2]=$ffbyield->estate_id;
        $ffb_array[$o][3]=floatval($ffbyield->ffb_mt);
        $cumulative_total_ffb[$day]=$cumulative_total_ffb[$day]+$ffbyield->ffb_mt;
        

        for($a=0;$a<100;$a++)
        {
            if($a==(int)$ffbyield->estate_id)
            {
                $cumulative_ffb_mt[$a][0]=(float)$cumulative_ffb_mt[$a][0]+(float)$ffbyield->ffb_mt;
                $ffb_array[$o][4]=$cumulative_ffb_mt[$a][0];
                $cumulative_ffb_mt[$a][1]=(float)$cumulative_ffb_mt[$a][1]+(float)$ffbyield->date;
            }
        }

        
        $o=$o+1;
    ?>
@endforeach
<?php //dd($cumulative_total_ffb);?>

    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="3%" class="border border-blue-900 p-1 display-none text-sm" rowspan="3">Date</td>
                    <?php $i=0; ?>
                    @foreach($data_array[2] as $estate)
                        <td width="" class="border border-blue-900 p-1 text-sm" colspan="3">{{$estate->estate_name}}</td>
                        <?php 
                        
                        $estate_numbering[$i]=$estate->id;
                        $i=$i+1;
                        ?>
                    @endforeach
                   
                    <td width="" class="border border-blue-900 p-1 text-sm" colspan="3">Total</td>
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="" class="border border-blue-900 p-1 text-sm" colspan="2">Actual</td>
                        <td width="" class="border border-blue-900 p-1 text-sm" colspan="1">Budget</td>
                    @endfor
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="" class="border border-blue-900 p-1 text-sm">Today</td>
                        <td width="" class="border border-blue-900 p-1 text-sm">Todate</td>
                        <td width="" class="border border-blue-900 p-1 text-sm">Todate</td>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @if($ffbyields->count()==0)
                    <tr>
                        <td colspan=7> <p class="font-bold">ooh! Empty List </p>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                <?php 
                    $number_of_days=cal_days_in_month(CAL_GREGORIAN,$data_array[1],$data_array[0]);
                    $month_data_var=$data_array[5];
                    $cumulative_ffb_mt[]=0;
                ?>
                @for($j=1;$j<=$number_of_days;$j++)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-3"><?php echo $j;?></td>
                        <?php $cumulative_daily_budget=0;?>
                        @for($k=0;$k<$data_array[3];$k++)
                            <?php $hit=0; ?>
                            @foreach($ffbyields as $ffbyield)
                                <?php 
                                    
                                    $date=DateTime::createFromFormat("Y-m-d",$ffbyield->date);
                                    $day=$date->format("d");
                                    // dd($day==$j&&$ffbyield->estate_id==$estate_numbering[$k]&&$k<$data_array[3]);
                                ?>
                                @if($j==$day&&$ffbyield->estate_id==$estate_numbering[$k])
                                    <?php $ffb_mt=$ffbyield->ffb_mt;
                                    $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days;
                                    $percentage=0;
                                    $percentage=$ffb_mt/$daily_budget*100;
                                    ?>
                                    @if($percentage>=0&&$percentage<80)
                                        <td class="border border-gray-300 p-1 bg-red-600 text-white">{{$ffbyield->ffb_mt}}</td>
                                    @elseif($percentage>=80&&$percentage<100)
                                        <td class="border border-gray-300 p-1 bg-yellow-300 ">{{$ffbyield->ffb_mt}}</td>
                                    @else
                                        <td class="border border-gray-300 p-1 bg-green-700 text-white">{{$ffbyield->ffb_mt}}</td>
                                    @endif

                                    <?php 
                                        $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days; 
                                        $cumulative_daily_budget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);

                                        $daily_ffbbudget=round($daily_budget*$j,2);
                                        
                                        
                                    ?>

                                    {{-- cumulative ffb mt --}}

                                    <?php 
                                        $number=(int)$ffbyield->id;
                                        $array_count=count($ffb_array);
                                        for($n=1;$n<=$array_count;$n++)
                                        {
                                            if($ffb_array[$n][0]==$ffbyield->id)
                                            {
                                                
                                                $float_cum_ffb_mt=floatval($ffb_array[$n][4]);
                                                $percentage2=0;
                                                $percentage2=($float_cum_ffb_mt/$daily_ffbbudget)*100;
                                                ?>
                                                @if($percentage2>=0&&$percentage2<80)
                                                    <td class="border border-gray-300 p-1 bg-red-600 text-white">{{$float_cum_ffb_mt}}</td>
                                                @elseif($percentage2>=80&&$percentage2<100)
                                                    <td class="border border-gray-300 p-1 bg-yellow-300 ">{{$float_cum_ffb_mt}}</td>
                                                @else
                                                    <td class="border border-gray-300 p-1 bg-green-700 text-white">{{$float_cum_ffb_mt}}</td>
                                                @endif
                                                {{-- original --}}
                                                {{-- <td class="border border-gray-300 p-1"><!?php echo $float_cum_ffb_mt;?></td> --}}
                                                <?php
                                            }
                                        }
                                    
                                    
                                    // $daily_ffbbudget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
                                    
                                    ?>
                                    {{-- <td class="border border-gray-300 border-r-black p-1 "><//?php echo round($daily_budget*$j,2);?></td> --}}
                                    <?php $hit=$hit+1; ?>
                                @endif
                            @endforeach
                            
                            @if($hit==0)
                                <td class="border border-gray-300 p-1">-</td>
                                <td class="border border-gray-300 p-1">-</td>
                                <?php $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days; 
                                // $daily_ffbbudget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
                                 $cumulative_daily_budget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);?>
                            @endif



                            
                            
                            <td class="border border-gray-300 border-r-black p-1"><?php echo round($daily_budget*$j,2);?></td>
                        @endfor
                        

                        {{-- total columns --}}
                        <?php
                        if($j==1)
                        {
                            $first_cum_ffb_budget=$cumulative_daily_budget;
                        }
                        $percentage3=0;
                        $percentage3=$cumulative_total_ffb[$j]/$first_cum_ffb_budget*100;
                        ?>
                            
                        @if($percentage3>=0&&$percentage3<80)
                            <td class="border border-gray-300 p-1 bg-red-600 text-white font-bold">{{$cumulative_total_ffb[$j]}}</td>
                        @elseif($percentage3>=80&&$percentage3<100)
                            <td class="border border-gray-300 p-1 bg-yellow-300 font-bold">{{$cumulative_total_ffb[$j]}}</td>
                        @else
                            <td class="border border-gray-300 p-1 bg-green-700 text-white font-bold">{{$cumulative_total_ffb[$j]}}</td>
                        @endif        
          
                        {{-- cumulative total ffb by day --}}
                        <?php $cumulative_total_ffb_by_day=$cumulative_total_ffb_by_day+$cumulative_total_ffb[$j]; ?>
                        <?php
                        if($j==1)
                        {
                            $first_cum_ffb_budget=$cumulative_daily_budget;
                        }
                        $percentage4=0;
                        $percentage4=$cumulative_total_ffb_by_day/$cumulative_daily_budget*100;
                        ?>
                            
                        @if($percentage4>=0&&$percentage4<80)
                            <td class="border border-gray-300 p-1 bg-red-600 text-white font-bold">{{$cumulative_total_ffb_by_day}}</td>
                        @elseif($percentage4>=80&&$percentage4<100)
                            <td class="border border-gray-300 p-1 bg-yellow-300 font-bold">{{$cumulative_total_ffb_by_day}}</td>
                        @else
                            <td class="border border-gray-300 p-1 bg-green-700 text-white font-bold">{{$cumulative_total_ffb_by_day}}</td>
                        @endif    

                        <td class="border border-gray-300 p-1"><?php echo $cumulative_daily_budget;?></td>
                    </tr>
                    {{-- @endfor --}}
                    @endfor
                @endif
                {{-- <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                    <td class="border border-gray-300 p-1 px-3">test</td>
                </tr> --}}
            </tbody>
        </table>
 
        
    </div>
</div>
@endsection