<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\Budget;
use App\Models\CumulativeFfb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FFBDailyYieldImport;

use PDF;


class DailyYieldController extends Controller
{
    public function index()
    {
        $year=date('Y');
        $month=date('m');
        // $month="05";
        // dd($year);
        $available_data_month_year=DailyYield::select(['month','year'])->groupBy('year')->groupBy('month')->orderBy('year', 'DESC')->orderBy('month', 'DESC')->get();
        $dailyyields=DailyYield::select(['date','estate_id','ffb_mt','month','year','id'])->where([['year','=',$year],['month','=',$month]])->get();
        $data_array[0]=$month;
        $data_array[1]=$year;
        $data_array[2]=$available_data_month_year;
        // dd($data_array);
        // $budget=Budget::select([''])
        return view('admin.main',['dailyyields'=>$dailyyields],['data_array'=>$data_array]);
    }

    public function index_monthsearch(Request $request)
    {
        // dd($request);
        $month_year_exploded=explode(" ",$request->month_year_selected);
        $month_in_string=$month_year_exploded[0];
        $year=$month_year_exploded[1];
        $month=date("m",strtotime($month_in_string));
   
        $available_data_month_year=DailyYield::select(['month','year'])->groupBy('year')->groupBy('month')->orderBy('year', 'DESC')->orderBy('month', 'DESC')->get();
        $dailyyields=DailyYield::select(['date','estate_id','ffb_mt','month','year','id'])->where([['year','=',$year],['month','=',$month]])->get();
        // $dailyyields=DailyYield::where([['year','=',$year],['month','=',$month]])->get();
        $data_array[0]=$month;
        $data_array[1]=$year;
        $data_array[2]=$available_data_month_year;
        
        // $budget=Budget::select([''])
        return view('admin.main',['dailyyields'=>$dailyyields],['data_array'=>$data_array]);
    }

    public function add()
    {
        $estates=Estate::all();
        return view('admin.ffbyield.add')->with('estates',$estates);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'date'=>'required',
            'estate_id'=>'required',
            'month'=>'required',
            'year'=>'required'
        ]);
        $status=DailyYield::where('estate_id',$request->estate_id)->where('date',$request->date)->first();


        $dailyyield=new DailyYield();
        $dailyyield->date=$request->date;
        $dailyyield->estate_id=$request->estate_id;
        $dailyyield->ffb_mt=$request->ffb_mt;
        $dailyyield->user_id=$request->user_id;
        $dailyyield->month=$request->month;
        $dailyyield->year=$request->year;

        


        $cumulative_ffb=CumulativeFfb::where('estate_id',$request->estate_id)->where('month',$request->month)->where('year',$request->year)->first();
        
        


        if(isset($status->estate_id)&&isset($status->date))
        {
            Session::flash('delete','Duplicate data, not saved');
            return redirect('/admin');
        }
        else
        {
            if(!$cumulative_ffb)
            {
                $cumulative_ffb_add=new CumulativeFfb();
                $cumulative_ffb_add->year=$request->year;
                $cumulative_ffb_add->month=$request->month;
                $cumulative_ffb_add->estate_id=$request->estate_id;
                $cumulative_ffb_add->latest_ffb_date=$request->date;
                $cumulative_ffb_add->cumulative_ffb_mt=$request->ffb_mt;

                $cumulative_ffb_add->save();
            }
            else
            {
                $cumulative_ffb->year=$request->year;
                $cumulative_ffb->month=$request->month;
                $cumulative_ffb->estate_id=$request->estate_id;
                $cumulative_ffb->latest_ffb_date=$request->date;
                $cumulative_ffb->cumulative_ffb_mt=$request->ffb_mt+$cumulative_ffb->cumulative_ffb_mt;

                $cumulative_ffb->save();
            }
            $dailyyield->save();
            Session::flash('status','Data successfully saved');
            return redirect('/admin');
        }

        
    }

    public function edit($id)
    {
        $dailyyield=DailyYield::find($id);

        return view('admin.ffbyield.edit',['dailyyield'=>$dailyyield]);
    }

    public function update(Request $request,$id)
    {
        
        $this->validate($request,[
            'date'=>'required',
            'month'=>'required',
            'year'=>'required',
            'ffb_mt'=>'required'
        ]);
        $dailyyield=DailyYield::findOrFail($id);

        //delete previous cumulative ffb
        $cumulative_ffb=CumulativeFfb::where('estate_id',$dailyyield->estate_id)->where('month',$dailyyield->month)->where('year',$dailyyield->year)->first();
        $cumulative_ffb->cumulative_ffb_mt=$cumulative_ffb->cumulative_ffb_mt-$dailyyield->ffb_mt;
        $cumulative_ffb->save();


        $dailyyield->date=$request->date;
        $dailyyield->ffb_mt=$request->ffb_mt;
        $dailyyield->month=$request->month;
        $dailyyield->year=$request->year;

        $cumulative_ffb_new=CumulativeFfb::where('estate_id',$dailyyield->estate_id)->where('month',$request->month)->where('year',$request->year)->first();

        if(!$cumulative_ffb_new)
        {
            $cumulative_ffb_add=new CumulativeFfb();
            $cumulative_ffb_add->year=$request->year;
            $cumulative_ffb_add->month=$request->month;
            $cumulative_ffb_add->estate_id=$dailyyield->estate_id;
            $cumulative_ffb_add->latest_ffb_date=$request->date;
            $cumulative_ffb_add->cumulative_ffb_mt=$request->ffb_mt;

            $cumulative_ffb_add->save();
        }
        else
        {
            $cumulative_ffb_new->year=$request->year;
            $cumulative_ffb_new->month=$request->month;
            $cumulative_ffb_new->estate_id=$dailyyield->estate_id;
            $cumulative_ffb_new->latest_ffb_date=$request->date;
            $cumulative_ffb_new->cumulative_ffb_mt=$cumulative_ffb_new->cumulative_ffb_mt+$request->ffb_mt;

            $cumulative_ffb_new->save();
        }

        $dailyyield->save();
        Session::flash('status','Data successfully updated');
        return redirect('/admin');
    }

    public function delete($id)
    {
        $dailyyield=DailyYield::find($id);
        //delete previous cumulative ffb
        $cumulative_ffb=CumulativeFfb::where('estate_id',$dailyyield->estate_id)->where('month',$dailyyield->month)->where('year',$dailyyield->year)->first();
        $cumulative_ffb->cumulative_ffb_mt=$cumulative_ffb->cumulative_ffb_mt-$dailyyield->ffb_mt;
        $cumulative_ffb->save();
        
        DB::table('daily_yields')->where('id',$id)->delete();
        Session::flash('delete','Successfully deleted');
        return redirect('/admin');
    }

    public static function monthYearConvert($month,$year)
    {
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F'); 
        
        $monthYear=$monthName.' '.$year;
        return $monthYear;
    }

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

    public function dailyYieldIndex(Request $request)
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

        $var=Budget::select(['estate_id',$month_budget_var,$daily_budget_var])->where('year',$year)->orderBy('estate_id','ASC')->get();
        $available_data_month_year=DailyYield::select(['month','year'])->groupBy('year')->groupBy('month')->orderBy('year', 'DESC')->orderBy('month', 'DESC')->get();

        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $data_array[0]=$year;
        $data_array[1]=$month;
        $data_array[2]=$estate_list;
        $data_array[3]=$number_of_estates;
        $data_array[4]=$var;
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

    public function dailyYieldPDF($data_pass)
    {

        $month_year_exploded=explode(' ',$data_pass);

        // $year=$data_pass[1];
        // dd($month_year_exploded);
        $month=$month_year_exploded[0];
        $year=$month_year_exploded[1];

        $ffbyields=DailyYield::select(['id','date','estate_id','ffb_mt'])->where([['year','=',$year],['month','=',$month]])->orderBy('date','ASC')->orderBy('estate_id','ASC')->get();
        $estate_list=Estate::select(['estate_name','id','abbreviation'])->get();
        $number_of_estates=$estate_list->count();

        $data_pass=$this->varSelector($month);
        $month_budget_var=$data_pass[0];
        $daily_budget_var=$data_pass[1];

        $var=Budget::select(['estate_id',$month_budget_var,$daily_budget_var])->where('year',$year)->orderBy('estate_id','ASC')->get();
        $available_data_month_year=DailyYield::select(['month','year'])->groupBy('year')->groupBy('month')->orderBy('year', 'DESC')->orderBy('month', 'DESC')->get();

        $month_name = date("F", mktime(0, 0, 0, $month, 10));

        $data_array[0]=$year;
        $data_array[1]=$month;
        $data_array[2]=$estate_list;
        $data_array[3]=$number_of_estates;
        $data_array[4]=$var;
        $data_array[5]=$month_budget_var;
        $data_array[6]=$month_name;
        $data_array[7]=$available_data_month_year;
        $data_array[8]=$ffbyields;
        // dd($data_array);
        // $pdf=PDF::loadView('admin.ffbyield.daily_report_pdf',array('data_array'=>$data_array))->setPaper('a4')->setOrientation('landscape')->setOption('margin-bottom', 10);
        $pdf=PDF::loadView('admin.ffbyield.daily_report_pdf',array('data_array'=>$data_array))->setPaper('a4')->setOrientation('landscape')->setOption('margin-top', 5)->setOption('margin-bottom',0);
        $name=$data_array[1].'-'.$data_array[0]."-Daily Report.pdf";
        return $pdf->download($name);

    }

    public function import(Request $request)
    {
        // dd($request);
        Excel::import(new FFBDailyYieldImport, $request->file('uploaded_file'));
        Session::flash('status_message','Data successfully saved');
        return redirect()->back();
        // return 'success';
    }

    public function upload_view()
    {
        return view('admin.ffbyield.import_ffb_daily_yield');
    }

}
