<?php

namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;
use App\Models\CumulativeFFB;
use App\Models\AreaEstate;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class FFBYieldController extends Controller
{

    public function varSelector($month)
    {
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

        $varSelector_pass[0]=$month_budget_var;
        $varSelector_pass[1]=$daily_budget_var;
        return $varSelector_pass;
    }

    public function index(Request $request)
    {
        if(empty($request->month_year_selected))
        {
            $year=date('Y');
            $month=date('m');
        }
        else
        {
            $month_year_exploded=explode(" ",$request->month_year_selected);
            $month_in_string=$month_year_exploded[0];
            $year=$month_year_exploded[1];
            $month=date("m",strtotime($month_in_string));
            
        }
       

        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$year],['month','=',$month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();
        $estate_list=Estate::select(['estate_name','id','abbreviation'])->get();
        $number_of_estates=$estate_list->count();

        $data_pass=$this->varSelector($month);
        $month_budget_var=$data_pass[0];
        $daily_budget_var=$data_pass[1];

        $budget=Budget::select(['estate_id',$month_budget_var,$daily_budget_var])->where('year',$year)->orderBy('estate_id','ASC')->get();
        $available_data_month_year=DailyYield::select(['month','year'])->groupBy('year')->groupBy('month')->orderBy('year', 'DESC')->orderBy('month', 'DESC')->get();

        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $data_array[0]=$year;
        $data_array[1]=$month;
        $data_array[2]=$estate_list;
        $data_array[3]=$number_of_estates;
        $data_array[4]=$budget;
        $data_array[5]=$month_budget_var;
        $data_array[6]=$month_name;
        $data_array[7]=$available_data_month_year;
    

        

        return view('ffbdaily',['ffbyields'=>$ffbyields],['data_array'=>$data_array]);
    }
    
    public static function ffbBudgetCount($j,$daily_budget,$cumulative_daily_budget)
    {
        $daily_ffbbudget=round($daily_budget*$j,2);
        $cumulative_daily_budget=$cumulative_daily_budget+$daily_ffbbudget;
        return $cumulative_daily_budget;
    }


    public function monthlyReport(Request $request)
    {
        // $year=date('Y');
        $year=2022;
        // if(empty($request->month_year_selected))
        // {
        //     $year=date('Y');
        //     $month=date('m');
        // }
        // else
        // {
        //     $month_year_exploded=explode(" ",$request->month_year_selected);
        //     $month_in_string=$month_year_exploded[0];
        //     $year=$month_year_exploded[1];
        //     $month=date("m",strtotime($month_in_string));
            
        // }


        $monthly_ffbs=CumulativeFfb::select(['month','estate_id','cumulative_ffb_mt'])->where('year','=',$year)->orderBy('month','ASC')->orderBy('estate_id','ASC')->get();
        $last_year_monthly_ffbs=CumulativeFfb::select(['month','estate_id','cumulative_ffb_mt'])->where('year','=',$year-1)->orderBy('month','ASC')->orderBy('estate_id','ASC')->get();
        $available_data_year=CumulativeFfb::select(['year'])->groupBy('year')->orderBy('year', 'DESC')->get();
        $estate_list=Estate::all();
        $num_of_estate=Estate::all()->count();
        $estate_areas=AreaEstate::select(['estate_id','current_year','planted_area'])->where('current_year','=',$year)->get();
        $budget=Budget::select(['estate_id','year','jan_budget_mt','feb_budget_mt','mac_budget_mt','apr_budget_mt','may_budget_mt','june_budget_mt','july_budget_mt','aug_budget_mt','sept_budget_mt','oct_budget_mt','nov_budget_mt','dec_budget_mt'])->where('year',$year)->get();
        // dd($last_year_monthly_ffbs);
        $month[0]=$year;
        $month[1]="jan_budget_mt";
        $month[2]="feb_budget_mt";
        $month[3]="mac_budget_mt";
        $month[4]="apr_budget_mt";
        $month[5]="may_budget_mt";
        $month[6]="june_budget_mt";
        $month[7]="july_budget_mt";
        $month[8]="aug_budget_mt";
        $month[9]="sept_budget_mt";
        $month[10]="oct_budget_mt";
        $month[11]="nov_budget_mt";
        $month[12]="dec_budget_mt";

        
        // $data[i][0]


        $data_array[0]=$year;
        $data_array[1]=$estate_list;
        $data_array[2]=$monthly_ffbs;
        $data_array[3]=$num_of_estate;
        $data_array[4]=$available_data_year;
        $data_array[5]=$month;
        $data_array[6]=$budget;
        $data_array[7]=$last_year_monthly_ffbs;
        $data_array[8]=$estate_areas;

        


        return view('admin.ffbyield.monthly_report',['data_array'=>$data_array,'month'=>$month]);
    }

    public static function getEstateArea($estate_id,$year)
    {
        $area=DB::table('area_estates')->where('estate_id','=',$estate_id)->where('current_year','=',$year)->value('planted_area');
        // $area=AreaEstate::select(['planted_area'])->where('estate_id','=',$estate_id)->where('current_year','=',$year)->get();
        return $area;
    }
}
