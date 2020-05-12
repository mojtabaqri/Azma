<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
      return view('admin.Panel.studentManager');
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
        $name=$request->get('sName');
        $lName=$request->get('sLName');
        $ntCode=$request->get('sNc');
        $stCode=$request->get('sc');
        if(count(Student::where('username',$stCode)->get())>0 )
        {
            return "3";
        }
        $model= new Student();
        $model->username=$stCode;
        $model->password=bcrypt($ntCode);
        $model->fullName=$name." " .$lName;
        $model->state="1";
        if ($model->save()==true)
        {
            return "1";
        }
        else{
            return "0";
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
        $student=Student::find($id);
        $student->username=$request->get('studentCode');
        $student->fullName=$request->get('studentName');
        $student->state=$request->get('studentState');
        if($student->save())
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
        if(Student::destroy($id))
        {
            return "true";
        }
        else{
            return "false";
        }
    }

    protected function searchStudent(Request $request)
    {
        $row="";
        $name=$request->get('name');
        $student=Student::where('fullName','like','%'.$name.'%')->get();
       if (count($student)>0)
       {
           foreach ($student as $item) {
               if ($item->state>0)
                   $item->state="فعال";
               else
                   $item->state="غیر فعال";

               $row .= "<tr>
     <td>$item->id</td>
     <td> $item->username </td>
     <td> $item->fullName </td>
     <td>$item->state</td>
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
