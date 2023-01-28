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

    public function downgrade($id)
    {
        $user=User::where('id',$id)->update(['is_an_admin'=>0]);
        return redirect('/admin/user');
    }

    public function upgrade($id)
    {
        $user=User::where('id',$id)->update(['is_an_admin'=>1]);
        return redirect('/admin/user');
    }
}
