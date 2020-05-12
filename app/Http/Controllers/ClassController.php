<?php

namespace App\Http\Controllers;

use App\Student;
use App\Tclass;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ClassController extends Controller
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
        return view('admin.Panel.classManager');
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
            $classTable = new Tclass();
            $classTable->name = $request->get('className');
            $classTable->masterId = $request->get('masterId');;
            $classTable->save();
            $row="<tr>
     <td>$classTable->id</td>
     <td> $classTable->name </td>
     <td>$classTable->masterId</td>
     <td class='td-actions'>
     <button data-toggle='modal' data-target='#editClassModal' type='button' rel='tooltip' class='btn btn-success editBtn '>
       <i class='material-icons'>edit</i>
      </button>
      <button data-toggle='modal' data-target='#deleteModal' type='button' rel='tooltip' class='btn btn-danger deleteBtn '>
       <i class='material-icons'>close</i>
      </button>
     </td>
    </tr>";

            return $row;

        }
        catch(\Exception $e){
            return "false";
        }
        //End Insert into Test Table
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
        $class=Tclass::find($id);
        $class->name=$request->get('className');
        $class->masterId=$request->get('masterCode');
       if($class->save())
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

    protected function searchClass(Request $request){
        $id=$request->get('id');
        $row="";
        try {
            $class = Tclass::all()->where('masterId', '=', $id);
            if (count($class) > 0) {
                foreach ($class as $item) {
                    $row .= "<tr>
     <td>$item->id</td>
     <td> $item->name </td>
     <td>$item->masterId</td>
     <td class='td-actions'>
     <button title='ویرایش ' data-toggle='modal' data-target='#editClassModal' type='button' rel='tooltip' class='btn btn-outline-success editBtn '>
       <i class='material-icons'>edit</i>
      </button>
      <button title='حذف کلاس' data-toggle='modal' data-target='#deleteModal' type='button' rel='tooltip' class='btn btn-outline-danger deleteBtn '>
       <i class='material-icons'>close</i>
      </button>
           <a target='_blank' href='./addClass-$item->id'> <button title='اضافه کردن دانشجو'  type='button' rel='tooltip' class='btn btn-outline-secondary addToClassBtn '>
       <i class='material-icons'>supervised_user_circle</i>
      </button></a>
     </td>
    </tr>";
                }
                return $row;
            }
            else{
                return "false";
            }
        }
        catch
            (\Exception $exception)
        {
            return "false";
        }

    }
    public function destroy($id)
    {
       if(Tclass::destroy($id))
       {
           return "true";
       }
       else{
           return "false";
       }
    }
    protected function addStudent($id)
    {
        try{
            $class=Tclass::find($id);
            if($class!=null)
            {
                $className=$class->name;
                $unit=$class->unit()->get();
                $row="";
                $i=0;
                foreach ($unit as $item)
                {
                    $cs=Student::find($unit[$i]->studentId);
                    if ($cs->state>0)
                    $cs->state="قعال"; else $cs->state="غیرفعال";
                    $row.="<tr>
     <td>$cs->id</td>
     <td>$cs->username</td>
          <td>$cs->fullName</td>
     <td>$cs->state</td>
     <td class='td-actions'>
      <button title='حذف  دانشجو از کلاس' data-toggle='modal' data-target='#deleteModal' type='button' rel='tooltip' class='btn btn-danger deleteBtn '>
       <i class='material-icons'>close</i>
      </button>
     </td>
    </tr>";
                    $i++;
                }
              return view('admin.Panel.addStudentToClass',compact('id','unit','className','row'));

            }
            else{
              return  abort(403, 'Unauthorized action.');
            }
        }
        catch (\Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    protected function advSearchStudent(Request $request)
    {
        $html="";
        $name=$request->get('name');
        $student=Student::where('fullName','like','%'.$name.'%')->get();
         if($student->count() > 0){
             foreach ($student as $item) {
                 $html .= "<li class=\"list-unstyled avdItem mr-2 pt-2\">
<a href= \"#\" class=\"pr-5\" style=\"color: rgba(1,1,1,0.8);\">$item->fullName    |  کد    : <span style='color: red'>$item->username</span>  </a>
<a title='$item->username' class= \"btn btn-success p-0 p-1 select  \" style= \"position: absolute;left: 20% \"><i class= \"material-icons \">done</i></a>
</li>";
             }
             return $html;
         }
         else{
             return "010";
         }
    }



}
