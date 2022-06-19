<?php

namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;

use Illuminate\Http\Request;


class FFBYieldController extends Controller
{
    public function index()
    {
        $year=date('Y');
        // $month=date('m');
        $month=05;

        $ffbyields=DailyYield::select(['date','estate_id','ffb_mt'])->where([['year','=',$year],['month','=',$month]])->orderBy('estate_id','ASC')->orderBy('date','ASC')->get();
        $estate_list=Estate::select(['estate_name','id','abbreviation'])->get();
        $number_of_estates=$estate_list->count();

        $data_array[0]=$year;
        $data_array[1]=$month;
        $data_array[2]=$estate_list;
        $data_array[3]=$number_of_estates;

        // dd($ffbyields);

        return view('ffbdaily',['ffbyields'=>$ffbyields],['data_array'=>$data_array]);
    }
}
