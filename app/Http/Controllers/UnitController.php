<?php

namespace App\Http\Controllers;

use App\Student;
use App\Unit;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UnitController extends Controller
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
        return abort('403','Access Denied !');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('403','Access Denied !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errorCode=0;
        $studentCode=$request->get('studentCode');
        $classid=$request->get('classId');
        $student=Student::all()->where('username','=',$studentCode);
        if(count($student)>0)
        {
            $row='';
            $id=Student::select('id')->where('username',$studentCode)->get();
            $id=$id[0]->id;
            try {
                $unit = new Unit();
                $unit->classId=$classid;
            $unit->studentId=$id;
            if($unit->save()){
                $cs=Student::find($id);
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
                return $row;
            }
            else{
                return $errorCode=1;
            }

            }
            catch (\Exception $e){
                return $errorCode=2;
            }

        }
        else{
            return $errorCode=3;
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
        return abort('403','Access Denied !');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort('403','Access Denied !');

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
        return "update";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit =Unit::where('studentId', $id)->get();
        if($unit!=null)
        {
            Unit::where('studentId', $id)->delete();
            return "true";
        }
        else{
            return "false";
        }
    }
}
