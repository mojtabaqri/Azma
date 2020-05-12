<?php

namespace App\Http\Controllers;

use App\Master;
use App\QuizState;
use App\Student;
use App\Tclass;
use App\Test;
use App\Unit;
use http\Env\Response;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ExamHolderController extends Controller
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
        return view('admin.Panel.examHolding');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $erCode = 0; //error code Handler
        $examId = $request->get('examId');//get test id
        $classId = $request->get('classId');//get class id
        $testId = Test::find($examId); // if test id exist returned true
        $class = Tclass::find($classId);//if class id exist returned true
        if ($class == null)
            return $erCode = 1;
        else if ($testId == null)
            return $erCode = 2;
        try {
            $units = Unit::all()->where('classId', '=', $classId);//get students units
            if ($units == null) return $erCode = 3;
            $masterCode = Test::select('masterId')->where('id', '=', $examId)->first(); //get master code of test
            $time = Test::select('time')->where('id', '=', $examId)->first(); //get time of test
            foreach ($units as $val) {
                $quizState = new QuizState();
                $quizState->studentCode = $val->studentId;
                $quizState->testId = $examId;
                $quizState->state = "0";
                $quizState->point = 0;
                $quizState->falseAnswer = 0;
                $quizState->trueAnswer = 0;
                $quizState->expire = $time->time;
                $quizState->masterCode = $masterCode->masterId;
                if (!$quizState->save())
                    return $erCode = 4;
            }
            return $erCode = 0;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $flag = $request->get('flag');
        $className="";
        $testName="";
        $data="";
        switch ($flag)
        {
            case 1:
                $className=$request->get('className');
                $data=Tclass::where('name','like','%'.$className.'%')->get();
                break;
            case 2:
                $testName=$request->get('testName');
                $data= Test::where('name','like','%'.$testName.'%')->get();
                break;
            default:
                return "Command Not Found Or Data corrupt ";
        }
        //-----------------------Processing Data  --------------------------------
      $html="";
        if($data->count()>0)
      {
          if($data[0]->time!=null)
              $state="selectTest";
          else
              $state="selectClass";
          foreach ($data as $item)
          {

              $masterName=Master::find($item->masterId)->name;
              $html.="<li class=\"list-unstyled  mr-2 pt-2\">
<a href= \"#\" class=\"pr-5\" style=\"color: rgba(1,1,1,0.8);\">$item->name    |  نام استاد  : <span style='color: red'>$masterName</span>  </a>
<a title='$item->id' class= \"btn btn-success p-0 p-1 $state  \" style= \"position: absolute;left: 25% \"><i class= \"material-icons \">done</i></a>
</li>";
          }
          return $html;
      }
      return "010";
        //-----------------------Processing Data  --------------------------------
    }
}

