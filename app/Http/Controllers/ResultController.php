<?php

namespace App\Http\Controllers;

use App\Library\converter;
use App\Master;
use App\Quiz;
use App\QuizState;
use App\Student;
use App\Test;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     return view('admin.Panel.result');
    }

    public function searchResult(Request $request)
    {
        $row="";
        $testId=$request->get('testId');
        $resultList=QuizState::where('testId',$testId)->get();
        try {
            if (count($resultList) > 0) {
                foreach ($resultList as $item) {
                    $studentName = Student::select('fullName')->where('id', $item->studentCode)->first()->fullName;
                    if ($item->state > 0)
                        $item->state = "شرکت کرده";
                    else {
                        $item->state = " شرکت نکرده";
                    }
                    $row .= "<tr>
     <td>$item->studentCode</td>
     <td>$studentName </td>
     <td> $item->state </td>
     <td> $item->point </td>
     <td class='td-actions'>
     <a href='./quizResult/st/$item->studentCode-ts$item->testId' target='_blank'> <button data-toggle='modal' title='مشاهده کارنامه'  type='button' rel='tooltip' class='btn btn-success  '>
       <i class='material-icons'>assignment</i>
      </button></a>
     </td>
    </tr>";
                }
                return $row;
            } else {
                return "false";
            }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function showResult($id,$testId)
    {
        $html="    <link href='http://www.fontonline.ir/css/BTitrBold.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/BNazanin.css' rel='stylesheet' type='text/css'>
    <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
    <style type=\"text/css\">

        .main{
            width: 80%;
            height: auto;
            padding-bottom: 20px;
            padding: 20px;
            margin: auto;
            background: white;
            border: solid 1px #8c8686;
            border-radius: 20px;
            font-size: 18px;
            font-family:BNazanin,'BNazanin',tahoma;
        }
        .bnaznin{
            font-family:BNazanin,'BNazanin',tahoma;
            font-size: 15px;
font-weight: bold;
        }
        .main span{
            font-size: 13px;
            font-family: BTitrBold,'BTitrBold',tahoma;

        }
        .titr{
            font-family: BTitrBold,'BTitrBold',tahoma;
        }

        .FlexContainer{
            padding-right: 15px;
            display: inline-flex;
            font-size: 18pt;
            flex-direction: row;
            flex-wrap: nowrap;
            font-weight: bold;
            margin-left: 20%;
        }
        section{
            padding: 10px 0px;
        }
        .first{
            flex-grow: 1;
            padding-left: 10pt;
    text-align: center;
        }
        .second{
            flex-grow: 1;
            text-align: right;
            padding-left: 16pt;


        }
        .third{
            flex-grow: 1;
            padding-left: 16pt;
        }
        .forth{
            flex-grow: 1;
            padding-left: 16pt;
        }
        .hr{
            border-top: solid 1px black;
            width: 100%;
            padding-left: 1px;
            padding-bottom: 15px;
        }
        .tbody{
            padding: 10px;
                margin-left: 15%;
        }
        .tbody th{
            padding-left: 20px;
            font-family: BYekan,'BYekan',tahoma;
            font-size: 10pt;
        }
        .tbody td{
            font-size: 10pt;
            font-weight: bold;
            
                text-align: right;
}
        }
        .God{
            padding: 10px;
            font-weight: bold;
            text-align: center;
            font-family: BTitrBold,'BTitrBold',tahoma;

        }
        .God h4,h3,h5{
            margin: 0;
            padding: 0;
        }
        .heading{
            margin: auto;
        }
        @media only screen and (max-width: 720px) {
            .main{
                width: 70%;
            }
            .tbody th {
    padding-left: 28px;
            }
            .heading{
                font-size: 6pt;
            }
        }
        .print{
            text-align: center;
            padding: 20px;
        }



    </style>";
        $result=QuizState::where('studentCode',$id)->where('testId',$testId)->get()->first();
        if($result!=null) {
            $student = Student::find($result->studentCode);
            $master=Master::find($result->masterCode);
            $test=Test::find($result->testId);
            $QuizQty=Quiz::where('testId','=',$result->testId)->orderBy('point','desc')->count();
            $quizStudentQty=QuizState::where('testId',$result->testId)->get()->count();
            $date =$test->created_at;
            $date=explode(' ',$date);
            $time=$date[1];
            $date=$date[0];
            list($gy,$gm,$gd)=explode('-',$date);
            $jalali=new converter($gy,$gm,$gd);
            $date=$jalali->gregorian_to_jalali($gy,$gm,$gd,'/');
            $data=[
                "testQty"=>$QuizQty,
                "student_name"=>$student->fullName,
                "master_name"=>$master->name,
                "testCode"=>$result->testId,
                "testName"=>$test->name,
                "testTime"=>$test->time,
                "testCreated"=>$date." در ساعت :".$time,
                "trueAnswers"=>$result->trueAnswer,
                'quizStudentQty'=>$quizStudentQty,
                "falseAnswer "=>$result->falseAnswer,
                'point'=>$result->point,
            ];
            $html.="<div class=\"container\">

    <div class=\"main\">
        <!-- Card Header -->
    <div class=\"first\">
        <div class=\"God\">
            <div class=\"logo\"><img src=\"/../logo.png\" width=\"12%\" height=\"12%\"></div>
            <div class=\"heading\">
                <h3 class='titr'>   وزارت آموزش و پرورش </h3>
                <h4 class='titr'> دانشگاه فنی حرفه ای </h4>
                <h5 class='titr'>   دانشکده شهید بهشتی   </h5>
            </div>
        </div>
    </div>

        <section>
            <div class=\"FlexContainer\">
                <div class=\"first\"><h6 class='bnaznin'><span> نام دانشجو:  </span> {$data['student_name']} </h6> </div>
                <div class=\"second\"><h6 class='bnaznin'><span> نام آزمون:  </span> {$data['testName']} </h6> </div>
                <div class=\"forth\"><h6 class='bnaznin'><span>   زمان:  </span> {$data['testTime']}</h6> </div>
                <div class=\"third\"><h6 class='bnaznin'><span> تاریخ برگزاری :  </span> {$data['testCreated']}</h6> </div>

            </div>
        </section>
        <div class=\"hr\"></div>

        <!-- Card Header -->
        <!--Card Quiz Info -->
        <table class=\"tbody\">
            <tbody><tr><th>کد آزمون  </th>
            <th>نام  آزمون  </th>
            <th>تعداد سوالات </th>
            <th>تعداد دانشجویان </th>
            <th> تعداد سوالات غلط </th>
            <th> تعداد سوالات صحیح </th>
            <th> نمره کل   </th>
            <th> نام استاد    </th>

            </tr></tbody><tbody>
            <tr>
                <td>{$data['testCode']}</td>
                <td>{$data['testName']}</td>
                <td>{$data['testQty']}</td>
                <td>{$data['quizStudentQty']}</td>
                <td>{$data['falseAnswer ']}</td>
                <td>{$data['trueAnswers']}</td>
                <td>{$data['point']}</td>
                <td>{$data['master_name']}</td>
            </tr>
            </tbody>
        </table>

        <!--Card Quiz Info -->



    </div>

</div>
";

            return $html;
        }
        else{
            return abort('403','Daneshjoei Ba in moshakhasat yaft nashod ');
        }

    }



}
