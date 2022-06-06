<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BudgetController extends Controller
{
    public function index()
    {
        $budget_lists=Budget::all();
        
        return view('admin.budget.index',['budget_lists'=>$budget_lists]);
    }

    public function add()
    {
        $estates=Estate::all();
        return view('admin.budget.add')->with('estates',$estates);
    }

    public function store(Request $request)
    {
        $year=$request->year;
        $feb_number_of_day=cal_days_in_month(CAL_GREGORIAN,2,$year);
        // dd($year);
        // dd($feb_number_of_day);
        $this->validate($request,[
            'year'=>'required',
            'estate_id'=>'required',
            'jan_budget_mt'=>'required',
            'feb_budget_mt'=>'required',
            'mac_budget_mt'=>'required',
            'apr_budget_mt'=>'required',
            'may_budget_mt'=>'required',
            'june_budget_mt'=>'required',
            'july_budget_mt'=>'required',
            'aug_budget_mt'=>'required',
            'sept_budget_mt'=>'required',
            'oct_budget_mt'=>'required',
            'nov_budget_mt'=>'required',
            'dec_budget_mt'=>'required',
        ]);

        $jan_daily_budget_mt=$request->jan_budget_mt/31;
        $feb_daily_budget_mt=$request->feb_budget_mt/$feb_number_of_day;
        $mac_daily_budget_mt=$request->mac_budget_mt/31;
        $apr_daily_budget_mt=$request->apr_budget_mt/30;
        $may_daily_budget_mt=$request->may_budget_mt/31;
        $june_daily_budget_mt=$request->june_budget_mt/30;
        $july_daily_budget_mt=$request->july_budget_mt/31;
        $aug_daily_budget_mt=$request->aug_budget_mt/31;
        $sept_daily_budget_mt=$request->sept_budget_mt/30;
        $oct_daily_budget_mt=$request->oct_budget_mt/31;
        $nov_daily_budget_mt=$request->nov_budget_mt/30;
        $dec_daily_budget_mt=$request->dec_budget_mt/31;

        $budget=new Budget();
        $budget->estate_id=$request->estate_id;
        $budget->year=$request->year;
        $budget->jan_budget_mt=$request->jan_budget_mt;
        $budget->feb_budget_mt=$request->feb_budget_mt;
        $budget->mac_budget_mt=$request->mac_budget_mt;
        $budget->apr_budget_mt=$request->apr_budget_mt;
        $budget->may_budget_mt=$request->may_budget_mt;
        $budget->june_budget_mt=$request->june_budget_mt;
        $budget->july_budget_mt=$request->july_budget_mt;
        $budget->aug_budget_mt=$request->aug_budget_mt;
        $budget->sept_budget_mt=$request->sept_budget_mt;
        $budget->oct_budget_mt=$request->oct_budget_mt;
        $budget->nov_budget_mt=$request->nov_budget_mt;
        $budget->dec_budget_mt=$request->dec_budget_mt;
        $budget->jan_daily_budget_mt=$jan_daily_budget_mt;
        $budget->feb_daily_budget_mt=$feb_daily_budget_mt;
        $budget->mac_daily_budget_mt=$mac_daily_budget_mt;
        $budget->apr_daily_budget_mt=$apr_daily_budget_mt;
        $budget->may_daily_budget_mt=$may_daily_budget_mt;
        $budget->june_daily_budget_mt=$june_daily_budget_mt;
        $budget->july_daily_budget_mt=$july_daily_budget_mt;
        $budget->aug_daily_budget_mt=$aug_daily_budget_mt;
        $budget->sept_daily_budget_mt=$sept_daily_budget_mt;
        $budget->oct_daily_budget_mt=$oct_daily_budget_mt;
        $budget->nov_daily_budget_mt=$nov_daily_budget_mt;
        $budget->dec_daily_budget_mt=$dec_daily_budget_mt;

        $budget->save();


        return redirect('/admin/ffb/budget/');

        
    } 

    public function view($id)
    {
        $budget_detail=Budget::findOrFail($id);
        return view('admin.budget.view',['budget_detail'=>$budget_detail]);
    }

    public function edit($id)
    {
        $budget_detail=Budget::findOrFail($id);
        return view('admin.budget.edit',['budget_detail'=>$budget_detail]);
    }

    public function update(Request $request,$id)
    {
        $year=$request->year;
        $feb_number_of_day=cal_days_in_month(CAL_GREGORIAN,2,$year);
        $this->validate($request,[

            'jan_budget_mt'=>'required',
            'feb_budget_mt'=>'required',
            'mac_budget_mt'=>'required',
            'apr_budget_mt'=>'required',
            'may_budget_mt'=>'required',
            'june_budget_mt'=>'required',
            'july_budget_mt'=>'required',
            'aug_budget_mt'=>'required',
            'sept_budget_mt'=>'required',
            'oct_budget_mt'=>'required',
            'nov_budget_mt'=>'required',
            'dec_budget_mt'=>'required',
        ]);

        $jan_daily_budget_mt=$request->jan_budget_mt/31;
        $feb_daily_budget_mt=$request->feb_budget_mt/$feb_number_of_day;
        $mac_daily_budget_mt=$request->mac_budget_mt/31;
        $apr_daily_budget_mt=$request->apr_budget_mt/30;
        $may_daily_budget_mt=$request->may_budget_mt/31;
        $june_daily_budget_mt=$request->june_budget_mt/30;
        $july_daily_budget_mt=$request->july_budget_mt/31;
        $aug_daily_budget_mt=$request->aug_budget_mt/31;
        $sept_daily_budget_mt=$request->sept_budget_mt/30;
        $oct_daily_budget_mt=$request->oct_budget_mt/31;
        $nov_daily_budget_mt=$request->nov_budget_mt/30;
        $dec_daily_budget_mt=$request->dec_budget_mt/31;

        $budget=Budget::findOrFail($id);
        $budget->jan_budget_mt=$request->jan_budget_mt;
        $budget->feb_budget_mt=$request->feb_budget_mt;
        $budget->mac_budget_mt=$request->mac_budget_mt;
        $budget->apr_budget_mt=$request->apr_budget_mt;
        $budget->may_budget_mt=$request->may_budget_mt;
        $budget->june_budget_mt=$request->june_budget_mt;
        $budget->july_budget_mt=$request->july_budget_mt;
        $budget->aug_budget_mt=$request->aug_budget_mt;
        $budget->sept_budget_mt=$request->sept_budget_mt;
        $budget->oct_budget_mt=$request->oct_budget_mt;
        $budget->nov_budget_mt=$request->nov_budget_mt;
        $budget->dec_budget_mt=$request->dec_budget_mt;
        $budget->jan_daily_budget_mt=$jan_daily_budget_mt;
        $budget->feb_daily_budget_mt=$feb_daily_budget_mt;
        $budget->mac_daily_budget_mt=$mac_daily_budget_mt;
        $budget->apr_daily_budget_mt=$apr_daily_budget_mt;
        $budget->may_daily_budget_mt=$may_daily_budget_mt;
        $budget->june_daily_budget_mt=$june_daily_budget_mt;
        $budget->july_daily_budget_mt=$july_daily_budget_mt;
        $budget->aug_daily_budget_mt=$aug_daily_budget_mt;
        $budget->sept_daily_budget_mt=$sept_daily_budget_mt;
        $budget->oct_daily_budget_mt=$oct_daily_budget_mt;
        $budget->nov_daily_budget_mt=$nov_daily_budget_mt;
        $budget->dec_daily_budget_mt=$dec_daily_budget_mt;

        $budget->save();

        Session::flash('status','Budget updated');
        return redirect('/admin/ffb/budget/');
    }

    public function delete($id)
    {
        DB::table('budgets')->where('id',$id)->delete();
        Session::flash('status','Successfully deleted');
        return redirect('/admin/ffb/budget/');
    }
}
