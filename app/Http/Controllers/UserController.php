<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\tempRegisteredUserEmail;
use App\Models\tempRegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function tempRegisteredUser()
    {
        return view('admin.register');
    }

    public function tempRegisteredUserStore(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);

        $temp_user=new tempRegisteredUser();
        $temp_user->name=$request->name;
        $temp_user->email=$request->email;
        $random_password = Str::random(12);
        $temp_user->password=Hash::make($random_password);
        // dd($temp_user->password);

        $temp_user->save();

        $temp_user->random_password=$random_password;

        $data_array=['name'=>$temp_user->name,'email'=>$temp_user->email,'random_password'=>$random_password];

        Mail::to($temp_user->email)->send(new tempRegisteredUserEmail($data_array));
        return redirect('/admin/user');

        
    }
}
