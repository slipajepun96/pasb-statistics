<?php

namespace App\Http\Controllers;

use App\Models\Estate;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function estate_detail_pdf($id)
    {
        $estate_detail=Estate::findOrFail($id);
        // $estate_name=$result->estate_name;
        // $data = [
        //     'estate_name' => "Ladang Sungai Kerpai",
        //     'date' => date('m/d/Y')
        // ];
          
        $pdf = PDF::loadView('admin.estate.detail_pdf',array('estate_detail'=>$estate_detail));
    
        return $pdf->download('estate_detail.pdf');
    }
}
