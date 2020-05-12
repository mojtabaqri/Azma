<?php

namespace App\Http\Controllers\student;

use App\Quiz;
use App\QuizState;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;

class TestController extends Controller
{
    public function index($id,$stId)
    {
       $quiz=QuizState::find($id);
       if($quiz!=null){
          $stTest=$quiz->where('studentCode',$stId);
           if($stTest->first()!=null)
           {
               date_default_timezone_set('asia/tehran');
               $nowDate=date('H:i:s');
               if(($stTest->first()->point==0))
               {
                   $msg="شما با موفقیت در آزمون شرکت کردید به یاد داشته باشید درصورت قطع اینترنت یا بستن صفحه آزمون برگزار شده تلقی خواهد شد و نمره شما درنظر گرفته خواهد شد";
                 $questions=Quiz::all()->where('testId','=',$stTest->first()->testId);
                   $secs = strtotime($nowDate)-strtotime("00:00:00");
                   $test=Test::all()->where('id','=',$stTest->first()->testId);
                   $result = date("H:i:s",strtotime($test->first()->time)+$secs);

               if($quiz->state=="0") {
                   $quiz->state="1";
                   $quiz->trackingCode=$quiz->id+rand(3544421,79455429);
                   $quiz->expire = $result;
                   $quiz->save();
               }
                   //-------------------------------------------
                   if(strtotime($nowDate)<=strtotime($quiz->expire)) {
                       $secounds = strtotime($nowDate)-strtotime("00:00:00");
                       $resultt = date("H:i:s",strtotime($quiz->expire)-$secounds);
                       list($date, $hour, $minute) = preg_split('/[ :]/', $resultt);
                       $trackingCode=$quiz->trackingCode;
                       return view('mslogin.Panel.Test',compact('msg','questions','test','stId','hour','trackingCode'));

                   } else {
                       return abort('503','Zaman Azmon Payan Yafte Ast ');
                   }
               }
               else{
                   return abort('404');
               }
           }
           else{
               return abort('404');
           }
       }
       else{
           return abort('404');
       }

    }
    public function submit(Request $request)
    {
        $stId= $request->get('stdId');
        $totalPoint=0;
        $truePoint=0;
        $falsePoint=0;
        $data=$request->get('data');
        $testId=$request->get('testId');
        $testQty=Quiz::where('testId',$testId)->get()->count();//تعداد کل سوالات آزمون
        for($i=0;$i<count($data);$i++)
        {
            //-----------------Get Radio Select And Quiz Id---------------------
            $quiz=explode('-',$data[$i]);
            $qid=$quiz[0];//Quiz ID
            $userSelect=$quiz[1];//User Quiz Select (1-4)
            //-----------------Get Radio Select And Quiz Id---------------------
//            Search Correct Answer in Database And comparision
            $db=Quiz::find($qid);
            if($userSelect==$db->CorrectAnswer)
                $truePoint++;
            else
                $falsePoint++;
        }
        $totalPoint=$testQty-$falsePoint;
//            Search Correct Answer in Database And comparision
try{
    if($totalPoint>0)
    {
        $QuizState=QuizState::all()->where('studentCode','=',$stId)->where('testId','=',$testId);
        $QuizState=QuizState::find($QuizState->first()->id);
        $QuizState->point=$totalPoint;
        $QuizState->trueAnswer=$truePoint;
        $QuizState->falseAnswer=$falsePoint;
        $QuizState->save();
        return "success";
        }
    else{
        $QuizState=QuizState::all()->where('studentCode','=',$stId)->where('testId','=',$testId);
        $QuizState=QuizState::find($QuizState->first()->id);
        $QuizState->point=--$totalPoint;
        $QuizState->trueAnswer=$truePoint;
        $QuizState->falseAnswer=$falsePoint;
        $QuizState->save();
        return "success";

    }
}
        catch (\Exception $exception)
        {
            return "Error! Please Contact to Provider";
        }

    }



}
