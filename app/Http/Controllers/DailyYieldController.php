<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\DailyYield;
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
        $dailyyields=DailyYield::select(['date','estate_id','ffb_mt','month','year','id'])->where('year',$year)->paginate(10);
        return view('admin.main',['dailyyields'=>$dailyyields]);
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

        $dailyyield=new DailyYield();
        $dailyyield->date=$request->date;
        $dailyyield->estate_id=$request->estate_id;
        $dailyyield->ffb_mt=$request->ffb_mt;
        $dailyyield->user_id=$request->user_id;
        $dailyyield->month=$request->month;
        $dailyyield->year=$request->year;

        $dailyyield->save();
        return redirect('/admin');
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
        $dailyyield->date=$request->date;
        //$dailyyield->estate_id=$request->estate_id;
        $dailyyield->ffb_mt=$request->ffb_mt;
        //$dailyyield->user_id=$request->user_id;
        $dailyyield->month=$request->month;
        $dailyyield->year=$request->year;

        $dailyyield->save();
        Session::flash('status','Data successfully updated');
        return redirect('/admin');
    }

    public function delete($id)
    {
        DB::table('daily_yields')->where('id',$id)->delete();
        Session::flash('delete','Successfully deleted');
        return redirect('/admin');
    }
}
