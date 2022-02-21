<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index()
    {
        $estate_lists=Estate::all();
        return view('admin.estate.index',['estate_lists'=>$estate_lists]);
    }

    public function add()
    {
        return view('admin.estate.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'estate_name'=>'required',
            'manager_name'=>'required',
            'year'=>'required|max:4',
            'total_area'=>'required',
            'planted_area'=>'required',
            'matured_area'=>'required',
            'inmatured_area'=>'required',
            'abbreviation'=>'required|max:4',
            'plant_type'=>'required'
        ]);

        $estate=new Estate();
        $estate->estate_name=$request->estate_name;
        $estate->manager_name=$request->manager_name;
        $estate->year=$request->year;
        $estate->total_area=$request->total_area;
        $estate->planted_area=$request->planted_area;
        $estate->matured_area=$request->matured_area;
        $estate->inmatured_area=$request->inmatured_area;
        $estate->abbreviation=$request->abbreviation;
        $estate->plant_type=$request->plant_type;

        $estate->save();
        return redirect('/admin/estate');
    }

    public function view($id)
    {
        $estate_detail=Estate::findOrFail($id);
        return view('admin.estate.view',['estate_detail'=>$estate_detail]);
    }

    public function delete()
    {
        DB::table('estates')->where('id',$id)->delete();
        Session::flash('status','Successfully deleted');
        return redirect('/admin/estate');
    }
}
