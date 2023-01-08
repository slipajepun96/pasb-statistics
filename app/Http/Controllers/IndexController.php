<?php


namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;
use App\Models\CumulativeFfb;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $current_year=date("Y");
        $yesterday_date=date('d.m.Y',strtotime("-1 days"));
        // dd($yesterday_year);
        // $yesterday_month=11;

        $yesterday_year=date('Y', strtotime($yesterday_date));
        $yesterday_month=date('m', strtotime($yesterday_date));
        $last_year=$current_year-1;


        $estates=Estate::select(['estate_name','id','abbreviation','matured_area'])->orderBy('id','ASC')->get();
        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$yesterday_year],['month','=',$yesterday_month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();
        $cumulative_ffb_mts=CumulativeFfb::select(['year','month','estate_id','cumulative_ffb_mt','latest_ffb_date'])->where('year','=',$yesterday_year)->get();
        $cumulative_ffb_mts_last_year=CumulativeFfb::select(['year','month','estate_id','cumulative_ffb_mt','latest_ffb_date'])->where('year','=',$last_year)->get();
        // dd($cumulative_ffb_mts_last_year);

        //calculate current year ffb output
        $total_ffbmt_yearly=0;
        foreach($cumulative_ffb_mts as $cumulative_ffb_mt)
        {
            $total_ffbmt_yearly=$total_ffbmt_yearly+$cumulative_ffb_mt->cumulative_ffb_mt;
        }

        //calculate last year ffb mt & output
        $last_year_total_ffb_mt_yearly=0;
        foreach($cumulative_ffb_mts_last_year as $cumulative_ffb_mt_last_year)
        {
            $last_year_total_ffb_mt_yearly=$last_year_total_ffb_mt_yearly+$cumulative_ffb_mt_last_year->cumulative_ffb_mt;
        }


        //calculate YPH
        $total_matured_area=0;
        $i=0;
        foreach($estates as $estate)
        {
            $estate_yph[$i][0]=$estate->id;//estateid
            $estate_yph[$i][1]=0;//yield mt for each estate
            $estate_yph[$i][2]=0;//yph for each estate

            $total_matured_area=$total_matured_area+$estate->matured_area;
            foreach($cumulative_ffb_mts as $cumulative_ffb_mt)
            {
                if($estate->id==$cumulative_ffb_mt->estate_id)
                {
                    $estate_yph[$i][1]=$estate_yph[$i][1]+$cumulative_ffb_mt->cumulative_ffb_mt;
                }
            }
            $estate_yph[$i][2]=$estate_yph[$i][1]/$estate->matured_area;
            $i=$i+1;
        }
        $company_yph=$total_ffbmt_yearly/$total_matured_area;

        //calculate estate YPH
        foreach($cumulative_ffb_mts as $cumulative_ffb_mt)
        {
            // for()
        }

        $data_array[0]=$total_ffbmt_yearly;
        $data_array[1]=$company_yph;
        $data_array[2]=$estates;
        $data_array[3]=$estate_yph;
        return view('index',['data_array'=>$data_array]);
    }
}
