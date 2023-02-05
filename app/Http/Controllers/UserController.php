<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\tempRegisteredUserEmail;
use App\Models\tempRegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users_list=User::all();
        $temp_users_list=tempRegisteredUser::all();
        return view('admin.user.index',['users_list'=>$users_list,'temp_users_list'=>$temp_users_list]);
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

        public function firstTimeLogin()
        {
            return view('firsttime');
        }

        public function firstTimeLoginPassword(Request $request)
        {
            $user=tempRegisteredUser::select(['id','name','email','password'])->where('email','=',$request->email)->first();
            // dd($user->password);
            $hash_random_password=Hash::make($request->password);
            // dd($hash_random_password);
            
            // dd(Hash::check($request->password, $user->password));
            if(Hash::check($request->password, $user->password))
            {
                DB::table('temp_registered_users')->where('id',$user->id)->delete();
                return view('set_password',['user'=>$user]);
            }
            else
            {
                Session::flash('status','Wrong email or password');
                return redirect('/firsttimelogin');
            }
        }
        public function registerUser(Request $request)
        {
            $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'
            ]);

            $user=new User();
            $user->name=$request->name;
            $user->password=Hash::make($request->password);
            $user->email=$request->email;
            $user->is_an_admin=0;
            $user->save();

            Session::flash('success','Account successsfully created. Please login using new password');
            return view('admin.login');
        }

        public function delete($id)
        {
            DB::table('users')->where('id',$id)->delete();
            Session::flash('delete','User successfully deleted');
            return redirect('/admin/user');
        }
}
