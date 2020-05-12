<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Master;
use Illuminate\Http\Request;
use Session;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Session::get('adminState')<4)
        {
            return abort('403','شما به عنوان استاد دسترسی به این قسمت ندارید !');
        }
        return view('admin.Panel.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $mail=$request->get('email');
            $name=$request->get('name');
            $masterNc=$request->get('nationalCode');
            $masterPhone=$request->get('phone');
            $model=new Master();
            $model->name=$name;
            $model->state="1";
            $model->NationCode=$masterNc;
            $model->TelePhone=$masterPhone;
            $model->email=$mail;
            //add to admin  table
            $admin=new Admin();
            $admin->fname=$name;
            $admin->username=$mail;
            $admin->password=bcrypt($masterNc);
            $admin->level='3';
            $admin->lname=' ';

            //add to admin  table
            if(($model->save())&&($admin->save()))
                return "1";

            return "0";
        }
        catch (\Exception $e)
        {

            if (strpos($e, 'masters_email_unique') !== false) {
                return '   ایمیل استاد از قبل موجود است ! اضافه نشد! ';
            }
            else if (strpos($e, 'masters_nationcode_unique') !== false) {
                return '   کد  ملی استاد از قبل موجود است ! اضافه نشد! ';
            }
            else {
                return $e->getMessage();
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $model=Master::find($request->get('id'));
        $model->name=$request->get('masterName');
        $model->NationCode=$request->get('masterNtCode');
        $model->state=$request->get('state');
        $model->TelePhone=$request->get('masterPhone');
        //Update Admin Table
        $userName=Master::where('id',$id)->get()->first()->email;
        $admin=Admin::where('username',$userName)->get()->first()->id;
        $admin=Admin::find($admin);
        $admin->password=bcrypt($request->get('masterNtCode'));
        //end update Admin Table
        if(($model->save())&&($admin->save()))
        {
            return "true";
        }
        return "false";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userName=Master::where('id',$id)->get()->first()->email;
        $admin=Admin::where('username',$userName)->get()->first()->id;
        if((Master::destroy($id))&&(Admin::destroy($admin)))
        {
            return "true";
        }
        else{
            return "false";
        }
    }

    public function searchMasters(Request $request)
    {
        $row="";
        $name=$request->get('name');
        $student=Master::where('name','like','%'.$name.'%')->get();
        if (count($student)>0)
        {
            foreach ($student as $item) {
                if ($item->state>0)
                    $item->state="فعال";
                else
                    $item->state="غیر فعال";

                $row .= "<tr>
     <td>$item->id</td>
     <td> $item->name </td>
     <td> $item->NationCode </td>
     <td> $item->TelePhone </td>
     <td> $item->state </td>
     <td class='td-actions'>
     <button data-toggle='modal' data-target='#editStudentModal' type='button' rel='tooltip' class='btn btn-success editBtn '>
       <i class='material-icons'>edit</i>
      </button>
      <button data-toggle='modal' data-target='#deleteModal' type='button' rel='tooltip' class='btn btn-danger deleteBtn '>
       <i class='material-icons'>close</i>
      </button>
     </td>
    </tr>";
            }
            return $row;
        }
        else{
            return "false";
        }
    }
}
