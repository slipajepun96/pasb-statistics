<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\AreaEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'abbreviation'=>'required|max:4',
            'plant_type'=>'required'
        ]);

        $estate=new Estate();
        $estate->estate_name=$request->estate_name;
        $estate->manager_name=$request->manager_name;
        $estate->year=$request->year;
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

    public function delete($id)
    {
        DB::table('estates')->where('id',$id)->delete();
        Session::flash('status','Successfully deleted');
        return redirect('/admin/estate');
    }

    public function edit($id)
    {
        $estate_detail=Estate::find($id);

        return view('admin.estate.edit',['estate_detail'=>$estate_detail]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'estate_name'=>'required',
            'manager_name'=>'required',
            'year'=>'required|max:4',
            'abbreviation'=>'required|max:4',
            'plant_type'=>'required'
        ]);

        $estate=Estate::findOrFail($id);
        $estate->estate_name=$request->estate_name;
        $estate->manager_name=$request->manager_name;
        $estate->year=$request->year;
        $estate->abbreviation=$request->abbreviation;
        $estate->plant_type=$request->plant_type;

        $estate->save();
        return redirect('/admin/estate');
    }

        public function areaEstate($estate_id)
    {
        $estate_area_lists=AreaEstate::select(['current_year','total_area','estate_id','planted_area','matured_area','immatured_area','month_active_from','month_active_to'])->where('estate_id','=',$estate_id)->orderBy('current_year','DESC')->get();
        $estate=Estate::find($estate_id);
        // dd($estate);
        return view('admin.estate.area_data',['estate_area_lists'=>$estate_area_lists],['estate'=>$estate]);
    }
    public function areaEstateStore(Request $request)
    {
        $this->validate($request,[
            'estate_id'=>'required',
            'current_year'=>'required',
            'immatured_area'=>'required',
            'matured_area'=>'required',
            'planted_area'=>'required',
            'total_area'=>'required'
        ]);


        $find=AreaEstate::where('estate_id',$request->estate_id)->where('current_year',$request->current_year)->first();

        if(isset($find->estate_id)&&isset($find->current_year))
        {
            Session::flash('status','Duplicate data, not saved');
        }
        else
        {
            $area_estate=new AreaEstate();
            $area_estate->estate_id=$request->estate_id;
            $area_estate->current_year=$request->current_year;
            $area_estate->immatured_area=$request->immatured_area;
            $area_estate->matured_area=$request->matured_area;
            $area_estate->planted_area=$request->planted_area;
            $area_estate->total_area=$request->total_area;
            $area_estate->month_active_from=$request->from;
            $area_estate->month_active_to=$request->to;
            $area_estate->save();

            
        }
        $estate_id=$request->estate_id;
        $estate_area_lists=AreaEstate::select(['current_year','total_area','estate_id','planted_area','matured_area','immatured_area'])->where('estate_id','=',$estate_id)->orderBy('current_year','DESC')->get();
        $estate=Estate::find($estate_id);
        return view('admin.estate.area_data',['estate_area_lists'=>$estate_area_lists],['estate'=>$estate]);
    }

}
