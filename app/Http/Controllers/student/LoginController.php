<?php

namespace App\Http\Controllers\student;

use App\Master;
use App\Quiz;
use App\QuizState;
use App\Student;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\converter;
use Illuminate\Support\Facades\DB;
use Session;
class LoginController extends Controller
{
    public function checkLogin()
    {
        if(Session::has('studentLogin')){
            return  redirect('mslogin/panel');
        }
            return view('mslogin.stlogin');
    }
    public function login(Request $request)
    {
        $data=$request->all();
        $rull=array(
            'stLogin'=>'required',
            'stPass'=>'required|min:8'
        );
        $message=array(
            'stLogin.required'=>'نام کاربری نمیتواند خالی باشد',
            'stPass.required'=>'پسورد نمیتواند خالی باشد',
            'stPass.min'=>'طول پسورد وارد شده کمتر از 8 رقم میباشد'
        );
        $validator=\Validator::make($data,$rull,$message);
        if($validator->fails())
        {
            return redirect('/mslogin')->withErrors($validator);
        }
        else{
       $student=Student::where('username',request('stLogin'))->where('state','1');
          if($student->count()==1){
              $hashedPassword=$student->first()->password;
                  if (\Hash::check($request->get('stPass'), $hashedPassword)) {
                      session(['studentLogin' => $student->first()->id]);
                      return  redirect('mslogin/panel');
                  }
                  else{
                      return back()->with('status', 'دانشجو با مشخصات وارد شده یافت نشد یا این دانشجو توسط مدیریت مسدود شده است !');
                  }
          }
          else{
              return back()->with('status', 'مطابقت نداشت ! اگر رمز عبور خود را فراموش کرده اید با مدیر سامانه در تماس باشید !');
          }
        }
    }

    public function showPanel()
    {
        $data=\App\Student::find(Session::get('studentLogin')) ;
        $username=$data->username;
        $state=$data->state;
        $fullName=$data->fullName;
        $FullName=$fullName;
        $quizState=$data->QuizState->where('point','=','0')->where('state','0');
        $quizCount=QuizState::where('studentCode','=',Session::get('studentLogin'))->get()->count();
        $quizez=$quizState;
        $stdPoint=QuizState::where('studentCode','=',Session::get('studentLogin'))->orderBy('point','desc')->sum('point');
        $maxPoint=QuizState::orderBy('point','desc')->sum('point');
        // $StdmaxPoint= Student::find($maxPoint->studentCode);
        return view('mslogin.Panel.Panel',[
            'quizState'=>$quizState,
            'quizCount'=>$quizCount,
            'stdPoint'=>$stdPoint,
            'fullName'=>$fullName,
            'state'=>$state,
            'userName'=>$username,
            'quizez'=>$quizez,
            'stdMaxPoint'=>$maxPoint]);
    }

    public  function Results()
    {
        $data=\App\Student::find(Session::get('studentLogin')) ;
        $fullName=$data->fullName;
        return view('mslogin.Panel.Results',compact('fullName'));
    }
    public function showResult(Request $request)
    {
        $errCode=0;
        $trackingCode=$request->get('trackingCode');
        $result=QuizState::where('trackingCode',$trackingCode)->get()->first();
        if($result->count()<1)
            return ++$errCode;
        $student=Student::find($result->first()->studentCode);
        $master=Master::find($result->first()->masterCode);
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
         $html="<div class=\"container\">

    <div class=\"main\">
        <!-- Card Header -->
    <div class=\"first\">
        <div class=\"God\">
            <div class=\"logo\"><img src=\"../logo.png\" width=\"12%\" height=\"12%\"></div>
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
<div class='print'>
<button  id='printBtn'  class='btn btn-outline-dark '>چاپ</button>
</div>
";

         return $html;
    }

    public function getTrackingCode(Request $request)
    {


        try {
            $users = DB::table('quiz_states')
                ->leftJoin('tests', 'quiz_states.testId', '=', 'tests.id')->select('quiz_states.trackingCode', 'tests.name', 'quiz_states.created_at', 'quiz_states.id', 'quiz_states.masterCode')
                ->where('name', 'like', '%' . $request->get('name') . '%')->where('studentCode', '=', Session::get('studentLogin'))->get();
      //----------------
           $html="";
           if ($users->count()>0) {
               foreach ($users as $item) {
                   $masterName = Master::find($item->masterCode)->name;
                   $html .= "<li  class=\"list-unstyled  mr-2 pt-2\">
<a href= \"#\" class=\"pr-5\" style=\"color: rgba(1,1,1,0.8);\">$item->name    |  نام استاد  : <span style='color: red'>$masterName</span>    </a>
<a title='$item->trackingCode' class= \"btn btn-success p-0 p-1 selectTest  \" style= \"position: absolute;left: 25% \"><i class= \"material-icons \">done</i></a>
</li>";
               }
               return $html;
           }
           else{
               return "نتیجه ای یافت نشد";
           }

        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }


    }
}
