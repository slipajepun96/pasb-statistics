<?php

namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;

use Illuminate\Http\Request;


class FFBYieldController extends Controller
{
    public function index()
    {
        $year=date('Y');
        $year=2022;
        $month=date('m');
        // dd($month);
        // $month=05;

        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$year],['month','=',$month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();
        $estate_list=Estate::select(['estate_name','id','abbreviation'])->get();
        $number_of_estates=$estate_list->count();

        // foreach($ffbyields as $ffbyield)
        // {
        //     if(!is_null($ffbyield->date)&&is_null($ffbyield->date)&&is_null($ffbyield->date))
        //     {
        //         echo $ffbyield->id.",";
        //         $ffbarray[0]=$ffbyield->date;
        //         $ffbarray[1]=$ffbyield->estate_id;
        //         $ffbarray[2]=$ffbyield->ffb_mt;
        //         $ffbarray[3]=$ffbyield->date;
        //         $ffbarray[0]=$ffbyield->date;
        //     }
        //     else
        //     {
        //         echo "false";
        //     }
        // }

        if($month=="01")
        {
            $month_budget_var="jan_budget_mt";
            $daily_budget_var="jan_daily_budget_mt";
        }
        elseif($month=="02")
        {
            $month_budget_var="feb_budget_mt";
            $daily_budget_var="feb_daily_budget_mt";
        }
        elseif($month=="03")
        {
            $month_budget_var="mac_budget_mt";
            $daily_budget_var="mac_daily_budget_mt";
        }
        elseif($month=="04")
        {
            $month_budget_var="apr_budget_mt";
            $daily_budget_var="apr_daily_budget_mt";
        }
        elseif($month=="05")
        {
            $month_budget_var="may_budget_mt";
            $daily_budget_var="may_daily_budget_mt";
        }
        elseif($month=="06")
        {
            $month_budget_var="june_budget_mt";
            $daily_budget_var="june_daily_budget_mt";
        }
        elseif($month=="07")
        {
            $month_budget_var="july_budget_mt";
            $daily_budget_var="july_daily_budget_mt";
        }
        elseif($month=="08")
        {
            $month_budget_var="aug_budget_mt";
            $daily_budget_var="aug_daily_budget_mt";
        }
        elseif($month=="09")
        {
            $month_budget_var="sept_budget_mt";
            $daily_budget_var="sept_daily_budget_mt";
        }
        elseif($month=="10")
        {
            $month_budget_var="oct_budget_mt";
            $daily_budget_var="oct_daily_budget_mt";
        }
        elseif($month=="11")
        {
            $month_budget_var="nov_budget_mt";
            $daily_budget_var="nov_daily_budget_mt";
        }
        elseif($month=="12")
        {
            $month_budget_var="dec_budget_mt";
            $daily_budget_var="dec_daily_budget_mt";
        }
        else
        {
            $month_budget_var="0";
            $daily_budget_var="0";
        }

        $var=Budget::select(['estate_id',$month_budget_var,$daily_budget_var])->where('year',$year)->orderBy('estate_id','ASC')->get();
        // dd($var);


        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $data_array[0]=$year;
        $data_array[1]=$month;
        $data_array[2]=$estate_list;
        $data_array[3]=$number_of_estates;
        $data_array[4]=$var;
        $data_array[5]=$month_budget_var;
        $data_array[6]=$month_name;

        // dd($ffbyields);

        return view('ffbdaily',['ffbyields'=>$ffbyields],['data_array'=>$data_array]);
    }
    
    public static function ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget)
    {
        $daily_ffbbudget=round($daily_budget*$j,2);
        $cumulative_daily_budget=$cumulative_daily_budget+$daily_ffbbudget;
        return $cumulative_daily_budget;
    }
}
