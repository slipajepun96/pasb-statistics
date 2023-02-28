@extends('layout.ffbyield-layout')

@section('ffbyield-content')
<?php   use \App\Http\Controllers\FFBYieldController; ?> 
<?php   use \App\Http\Controllers\DailyYieldController; ?> 
<?php
    // $dateObj   = DateTime::createFromFormat('!m', $data_array[1]);
    // $monthName = $dateObj->format('F'); // March
    $current_page="monthly_report";
?>

<div class="w-auto md:inline-flex ">
    <div class="m-3 mb-1 bg-white rounded-xl p-1 ">

    <div class=" inline-flex block rounded-lg">
        <form action="{{route('ffbyield_search')}}" method="POST">
            @csrf 
                <select name="month_year_selected" id="month_year_selected" class=" shadow border rounded-lg m-1 p-1.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline flex-none">
                    @foreach($data_array[4] as $data)
                    <?php

                    if($data->year==$data_array[0])
                        {
                    ?>
                        <option value="{{$data->year}}" selected>{{$data->year}}</option>
                    <?php }
                    else{
                        ?>
                            <option value="{{$data->year}}">{{$data->year}}</option>
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
    <p class="text-2xl font-semibold">Cumulative Monthly FFB Output Statement for 2022</p>


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


    for($b=0;$b<$data_array[3];$b++)
    {
        for($c=0;$c<12;$c++)
        {
            $cum_month_data[$b][$c][0]="0";//estateid
            $cum_month_data[$b][$c][1]="-";//cum_ffb mt
            $cum_month_data[$b][$c][2]="-";//cum_ffb_yph mt
            $cum_month_data[$b][$c][3]="-";//budget
            $cum_month_data[$b][$c][4]="-";//estate_area
        }
    }
    for($b=0;$b<$data_array[3];$b++)
    {
        for($c=0;$c<12;$c++)
        {
            $estate_id=$data_array[1][$b]->id;
            $year=$data_array[0];
            $area=FFBYieldController::getEstateArea($estate_id,$year);
            $cum_month_data[$b][$c][0]=$data_array[1][$b]->id;//estate_id
            // dd($area);
            
            
            foreach($data_array[2] as $cum_month_ffb)
            {
                // $cum_month_data[$b][$c][1]="-";
                if(($cum_month_ffb->month-1)==$c&&$cum_month_ffb->estate_id==$cum_month_data[$b][$c][0])
                {
                    if($c!=0)
                    {
                        // $monthly_yph=$cum_month_ffb->cumulative_ffb_mt/$cum_month_ffb->estate->
                        // $cum_monthly_ffb_mt=$cum_month_ffb->cumulative_ffb_mt+
                    }
                    $cum_month_data[$b][$c][1]=$cum_month_ffb->cumulative_ffb_mt;
                }

            }
            $monthly_ffb[$b][$c]=0;
        }
    }
    for($b=1;$b<=31;$b++)
    {
        $cumulative_total_ffb[$b]=0;
       
    }

    // dd($cum_month_data);
    ?>


    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="3%" class="border border-blue-900 p-1 display-none text-sm sticky" rowspan="3">Month</td>
                    <?php $i=0; ?>
                    @foreach($data_array[1] as $estate)
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
                        <td width="" class="border border-blue-900 p-1 text-sm">Actual</td>
                        <td width="" class="border border-blue-900 p-1 text-sm">Budget</td>
                        <td width="" class="border border-blue-900 p-1 text-sm">Last Year</td>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @if($data_array[2]->count()==0)
                    <tr>
                        <td colspan=7> <p class="font-bold">ooh! Empty List </p>(contact administrator if you think this is an error)</td>
                    </tr>
                @else
                <?php 
                    $cumulative_ffb_mt[]=0;
                ?>
                @for($j=1;$j<=12;$j++)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-3"><?php echo $j;?></td>
                        <?php $cumulative_daily_budget=0;?>
                        @for($k=0;$k<$data_array[3];$k++)
                            <?php $hit=0; ?>
                            @foreach($data_array[2] as $monthly_ffb)


                                @if($j==$monthly_ffb->month&&$monthly_ffb->estate_id==$estate_numbering[$k])
                                    <?php $ffb_mt=$monthly_ffb->ffb_mt;
                                    // $monthly_budget=$data_array[4][$k]->$month_data_var/$number_of_days;
                                    $percentage=0;
                                    // $percentage=$ffb_mt/$daily_budget*100;
                                    ?>
                                    @if($percentage>=0&&$percentage<80)
                                        <td class="border border-gray-300 p-1 bg-red-600 text-white">{{$monthly_ffb->cumulative_ffb_mt}}</td>
                                    @elseif($percentage>=80&&$percentage<100)
                                        <td class="border border-gray-300 p-1 bg-yellow-300 ">{{$monthly_ffb->cumulative_ffb_mt}}</td>
                                    @else
                                        <td class="border border-gray-300 p-1 bg-green-700 text-white">{{$monthly_ffb->cumulative_ffb_mt}}</td>
                                    @endif
                                    <?php 
                                        // $daily_budget=$data_array[4][$k]->$month_data_var/$number_of_days; 
                                        // $cumulative_daily_budget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);

                                        // $daily_ffbbudget=round($daily_budget*$j,2);
                                      
                                        
                                    ?>

                                    {{-- budget ffb mt --}}
                                    <?php $var=$data_array[5][$j];
                                    
                                    ?>
                                    @foreach($data_array[6] as $budget)
                                    <?php $hit_a=0;?>
                                        @if($monthly_ffb->estate_id==$budget->estate_id)
                                        <?php $hit_a=$hit_a+1;?>
                                        <td class="border border-gray-300 border-r-black p-1">{{$budget->$var;}}</td>
                                        @endif

                                    @endforeach

                                    <?php 
                                      
                                    
                                    
                                    // $daily_ffbbudget=FFBYieldController::ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget);
                                    
                                    ?>
                                    {{-- <td class="border border-gray-300 border-r-black p-1 "><//?php echo round($daily_budget*$j,2);?></td> --}}
                                    <?php $hit=$hit+1; ?>
                                @endif
                            @endforeach
                            
                            @if($hit==0)
                                <td class="border border-gray-300 p-1">-</td>
                                <td class="border border-gray-300 p-1">-</td>
                            @endif



                            
                            
                            @foreach($data_array[7] as $last_year_ffb)
                                @if($j==$last_year_ffb->month&&$last_year_ffb->estate_id==$estate_numbering[$k])
                                    <td class="border border-gray-300 p-1">{{$last_year_ffb->cumulative_ffb_mt}}</td>
                                @endif
                            @endforeach
                        @endfor
                        

                        {{-- total columns --}}
                        <?php
                        if($j==1)
                        {
                            $first_cum_ffb_budget=$cumulative_daily_budget;
                        }
                        $percentage3=0;
                        // $percentage3=$cumulative_total_ffb[$j]/$first_cum_ffb_budget*100;
                        ?>
                            
                        @if($percentage3>=0&&$percentage3<80)
                            <td class="border border-gray-300 p-1 bg-red-600 text-white font-bold">1{{$cumulative_total_ffb[$j]}}</td>
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
                        // $percentage4=$cumulative_total_ffb_by_day/$cumulative_daily_budget*100;
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