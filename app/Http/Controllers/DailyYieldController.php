<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Estate;
use App\Models\DailyYield;
use App\Models\CumulativeFfb;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
}
