<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users_list=User::all();
        return view('admin.user.index',['users_list'=>$users_list]);
    }
}
