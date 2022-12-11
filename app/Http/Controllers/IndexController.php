<?php


namespace App\Http\Controllers;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // $current_year=date("Y");
        $yesterday_date=date('d.m.Y',strtotime("-1 days"));
        $yesterday_year=$yesterday_date->format("Y");
        $yesterday_month=$yesterday_date->format("m");
        $estates=Estate::select(['estate_name','id','abbreviation'])->get();
        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$yesterday_year],['month','=',$yesterday_month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();

        $total_ffbmt_yearly=0;
        foreach($ffbyields as $ffbyield)
        {
            $total_ffbmt_yearly=$total_ffbmt_yearly+$ffbyield;
        }
    }
}
