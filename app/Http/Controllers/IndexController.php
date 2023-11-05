<?php


namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;
use App\Models\CumulativeFfb;
use App\Models\AreaEstate;
use App\Charts\MonthlyFFBChart;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(MonthlyFFBChart $chart)
    {

        $current_year=date("Y");
        // $current_year=2022;
        $yesterday_date=date('d.m.Y',strtotime("-1 days"));
        // dd($yesterday_date);
        // $yesterday_month=12;
        // $yesterday_year=2022;

        $yesterday_year=date('Y', strtotime($yesterday_date));
        $yesterday_month=date('m', strtotime($yesterday_date));
        $last_year=$current_year-1;
        // dd($yesterday_date);

        $estates_area=AreaEstate::select(['matured_area','estate_id'])->where('current_year','=',$current_year)->get();
        $estates=Estate::select(['estate_name','id','abbreviation'])->orderBy('id','ASC')->get();
        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$yesterday_year],['month','=',$yesterday_month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();
        $cumulative_ffb_mts=CumulativeFfb::select(['year','month','estate_id','cumulative_ffb_mt','latest_ffb_date'])->where('year','=',$yesterday_year)->get();
        $cumulative_ffb_mts_last_year=CumulativeFfb::select(['year','month','estate_id','cumulative_ffb_mt','latest_ffb_date'])->where('year','=',$last_year)->get();
        // dd($cumulative_ffb_mts);

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

            $matured_area=0;
            $estate_yph[$i][0]=$estate->id;//estateid
            foreach($estates_area as $estate_area)
            {
                // dd($estate_area->estate_id);
                if($estate_area->estate_id==$estate_yph[$i][0])
                {
                    $matured_area=$estate_area->matured_area;
                }
            }
            $estate_yph[$i][1]=0;//yield mt for each estate
            $estate_yph[$i][2]=0;//yph for each estate
            $estate_yph[$i][3]=0;//monthly yph 


            $total_matured_area=$total_matured_area+$matured_area;

            foreach($cumulative_ffb_mts as $cumulative_ffb_mt)
            {
                if($estate->id==$cumulative_ffb_mt->estate_id)
                {
                    $estate_yph[$i][1]=$estate_yph[$i][1]+$cumulative_ffb_mt->cumulative_ffb_mt;
                    $estate_monthly_yph=$cumulative_ffb_mt->cumulative_ffb_mt/$matured_area;
                    
                    $estate_monthly_yph=round($estate_monthly_yph,2);
                    $estate_yph[$i][3]=$estate_yph[$i][3]+$estate_monthly_yph;

                    // dd($estate_yph[$i][3]);
                }
            }
            $estate_yph[$i][2]=$estate_yph[$i][2]+$estate_yph[$i][3];
            $i=$i+1;
        }

        //passing monthly budget and monthly ffb to chart
        $monthly_ffb_budget[]=0;

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
        $data_array[4]=$estates->keys();
        $data_array[5]=$estates->values();

        //data for graph
        $graph_data=$this->getGraphData($yesterday_year,$yesterday_month,$yesterday_date);

        // dd($estate_yph[1][3]);
        return view('index',['data_array'=>$data_array,'chart'=>$chart->build($graph_data)]);
    }

    public function getGraphData($year,$yesterday_month,$yesterday_date)
    {
        //calculate monthly ffb yield 
        for($i=0;$i<12;$i++)
        {
            $month=0;
            if($i<9)
                 $month="0".$i+1;
            else
                $month=$i+1;
            
            $graph_data[0][$i]=$this->getMonthlyFFBYieldForCompany($month,$year);
        }

        //calculate budget
        for($j=0;$j<12;$j++)
        {
            if($j<9)
                 $month="0".$j+1;
            else
                $month=$j+1;
            // echo $month." ";
            $graph_data[1][$j]=$this->getMonthlyFFBBudgetForCompany($month,2023);
        }
        
        $graph_data[2]=$yesterday_month;
        $graph_data[3]=$yesterday_date;

        return $graph_data;
    }

    public function getMonthlyFFBYieldForCompany($month,$year)
    {
        $sum_cum_ffb=0;
        $cum_ffbs=CumulativeFfb::select(['year','month','estate_id','cumulative_ffb_mt','latest_ffb_date'])->where('year','=',$year)->where('month','=',$month)->get();
        //calculate cumulative ffb for that month
        foreach($cum_ffbs as $cum_ffb)
        {
            
            $sum_cum_ffb=$sum_cum_ffb + $cum_ffb->cumulative_ffb_mt;
        }
        if($sum_cum_ffb==0)
            $sum_cum_ffb=null;
        // echo $sum_cum_ffb;
        return round($sum_cum_ffb,2);
    }

    public function getMonthlyFFBBudgetForCompany($month,$year)
    {
        $sum_budget_ffb=0;
        $cum_budgets=Budget::select(['jan_budget_mt','feb_budget_mt','mac_budget_mt','apr_budget_mt','may_budget_mt','june_budget_mt','july_budget_mt','aug_budget_mt','sept_budget_mt','oct_budget_mt','nov_budget_mt','dec_budget_mt',])->where('year','=',$year)->get();

        foreach($cum_budgets as $cum_budget)
        {
            if($month=="01")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->jan_budget_mt;
            }
            else if($month=="02")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->feb_budget_mt;
            }
            else if($month=="03")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->mac_budget_mt;
            }
            else if($month=="04")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->apr_budget_mt;
            }
            else if($month=="05")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->may_budget_mt;
            }
            else if($month=="06")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->june_budget_mt;
            }
            else if($month=="07")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->july_budget_mt;
            }
            else if($month=="08")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->aug_budget_mt;
            }
            else if($month=="09")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->sept_budget_mt;
            }
            else if($month=="10")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->oct_budget_mt;
            }
            else if($month=="11")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->nov_budget_mt;
            }
            else if($month=="12")
            {
                $sum_budget_ffb=$sum_budget_ffb+$cum_budget->dec_budget_mt;
            }
            else
                $sum_budget_ffb="Error";
        }
        return round($sum_budget_ffb,2);
    }
}
