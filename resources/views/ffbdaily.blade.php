@extends('layout.master')

@section('content')
<div class="m-3 bg-white w-auto rounded-xl p-3">
    <p class="text-2xl font-bold">Daily FFB Output for May 2022</p>
    {{-- <p class="italic text-gray-700">Last Updates: 18 January 2022</p> --}}
    {{-- <p>~Table here~</p> --}}

    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="3%" class="border border-blue-900 p-3 display-none" rowspan="3">Date</td>
                    <?php $i=0; ?>
                    @foreach($data_array[2] as $estate_name)
                        <td width="10%" class="border border-blue-900 p-1" colspan="3">{{$estate_name->estate_name}}</td>
                        <?php 
                        $estate_numbering[$i]=$estate_name->id;
                        $i=$i+1;
                        ?>
                    @endforeach
                    <td width="15%" class="border border-blue-900 p-3" colspan="3">Total</td>
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="15%" class="border border-blue-900 p-1" colspan="2">Actual</td>
                        <td width="15%" class="border border-blue-900 p-1" colspan="1">Budget</td>
                    @endfor
                </tr>
                <tr class="bg-gray-200 p-3">
                    @for($i=0;$i<=$data_array[3];$i++)
                        <td width="15%" class="border border-blue-900 p-1">Today</td>
                        <td width="15%" class="border border-blue-900 p-1">Todate</td>
                        <td width="15%" class="border border-blue-900 p-1">Todate</td>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @if($ffbyields->count()==0)
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator as this is an error)</td>
                    </tr>
                @else
                <?php 
                    $number_of_days=cal_days_in_month(CAL_GREGORIAN,$data_array[1],$data_array[0]);
                ?>
                @for($j=1;$j<=$number_of_days;$j++)
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-1 px-3"><?php echo $j;?></td>
                        <?php $k=0; ?>
                        @foreach($ffbyields as $ffbyield)
                        <?php 
                            $date=DateTime::createFromFormat("Y-m-d",$ffbyield->date);
                            $day=$date->format("d");
                            // dd($estate_numbering[$k]);
                        ?>
                            <?php echo $k; ?>
                            @if(($day==$j)&&($ffbyield->estate_id==$estate_numbering[$k]))
                            
                            {{-- @if($estate_numbering[$number]==$ffbyield->estate_id) --}}
                            <td class="border border-gray-300 p-1 px-2">{{$ffbyield->ffb_mt}}</td>
                            <td class="border border-gray-300 p-1 px-2"></td>
                            <td class="border border-gray-300 p-1 px-2"></td>
                            @elseif()
                            @endif
                            <?php $k=$k+1;?>
                        @endforeach
                        <td class="border border-gray-300 p-3 px-5">0</td>
                        <td class="border border-gray-300 p-3 px-5">0</td>
                        <td class="border border-gray-300 p-3 px-5">0</td>
                    </tr>
                    {{-- @endfor --}}
                    @endfor
                @endif

            </tbody>
        </table>
 
        
    </div>
</div>
@endsection