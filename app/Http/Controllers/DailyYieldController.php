<?php

namespace App\Http\Controllers;

use App\Models\Estate;

use Illuminate\Http\Request;

class DailyYieldController extends Controller
{
    public function add()
    {

        return view('admin.ffbyield.add');
    }
}
