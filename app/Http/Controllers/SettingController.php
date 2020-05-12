<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Master;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $master="";
        $adminId= Session::get('adminId');
        $admin=Admin::where('id',$adminId)->get()->first();
        if($admin->level<4) {
            $master=Master::where('email',$admin->username)->get()->first();
        }
        $info=array(
            'name'=>$admin->fname,
            'lastName'=>$admin->lname,
            'id'=>$admin->id,
            'email'=>$admin->username,
            'level'=>$admin->level,
        );
        return view('admin.Panel.setting',compact('info','master'));
    }
    public function update(Request $request)
    {
        try {
            $username="";
            $password="";
            $fname="";
            $lname="";
            $passWordChange=false;
            $isAdmin = $request->get('isAdmin');
            if ($isAdmin > 0) {
                $username=$request->get('username');
                $password=$request->get('password');
                if($password!=null)
                    $passWordChange=true;

                $fname=$request->get('fname');
                $lname=$request->get('lname');
                $id=$request->get('id');
                //Update Admin Table
                $admin=Admin::find($id);
                $admin->fname=$fname;
                $admin->lname=$lname;
                $admin->username=$username;
                if($passWordChange)
                $admin->password=bcrypt($password);

                if($admin->save())
                    return "true";
                return "false";


            }
            else {
                $username=$request->get('username');//email
                $password=$request->get('password');//nation code
                $fname=$request->get('fname');
                $phone=$request->get('phone');
                $id=$request->get('id');
                $master=Master::find($id);
                $master->name=$fname;
                $master->NationCode=$password;
                $master->TelePhone=$phone;
                $master->email=$username;
                //end update master Table
                //Update Admin Table
                $admin=Admin::find($request->get('masterAdmin'));
                $admin->fname=$fname;
                $admin->username=$username;
                $admin->password=bcrypt($password);
                if(($admin->save())&&($master->save()))
                {
                    return "true";
                }

            }

        }
        catch (\Exception $exception)
        {
            return $exception->getMessage();
        }

    }


}
