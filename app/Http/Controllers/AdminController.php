<?php

namespace App\Http\Controllers;

use App\Master;
use App\Quiz;
use App\Student;
use App\Test;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Session;
class AdminController extends Controller
{

    public function login(Request $request)
    {
        $data=$request->all();
        $rull=array(
        'adminLogin'=>'required|email',
         'adminPass'=>'required|min:8'
        );

        $message=array(
          'adminLogin.required'=>'ایمیل نمیتواند خالی باشد',
            'adminLogin.email'=>'ایمیل وارد شده صحیح نیست',
           'adminPass.required'=>'پسورد نمیتواند خالی باشد',
           'adminPass.min'=>'طول پسورد وارد شده کمتر از 8 رقم میباشد'
        );

        $validator=Validator::make($data,$rull,$message);
          if($validator->fails())
          {
              return redirect('/admin')->withErrors($validator);
          }
          else{

              $dataAttempt = array(
                  'username' => $data['adminLogin'],
                  'password' =>$data['adminPass']
              );
              if(Auth::attempt($dataAttempt))
              {
                  $adminId=Admin::where('username','=',$data['adminLogin'])->get()->first()->id;
                  $state=Admin::where('username','=',$data['adminLogin'])->get()->first()->level;
                  session(['adminState' => $state]);
                  session(['adminId' => $adminId]);
                  return redirect('/admin/panel');
              }
              else{
                  return back()->with('status', 'مطابقت نداشت ! اگر رمز عبور خود را فراموش کرده اید با مدیر سامانه در تماس باشید !');
              }


          }




    }

    public function checkLogin()
    {
        if (Auth::user())
        {
            return redirect('admin/panel');
        }
        else{
            return view('admin.login');
        }
    }

    public function showPanel()
    {

        $info=[
         'stduentCount'=>Student::all()->count(),
         'questionCount'=>Test::all()->count(),
         'masterCount'=>Master::all()->count(),
         'successQuizCount'=>Quiz::all()->count(),
     ];
      $student=(Student::all()->where('state','=','1')) ;
     return view('admin.Panel.panel',compact('info','student'));
    }

    protected function showTest()
    {
        return view('admin.Panel.regTest');
    }

    protected function registerTests(Request $request)
    {
        //Insert to Test Tabl

        try{
            $testTable = new Test;
            $testTable->name = $request->get('testName');
            $testTable->masterId = $request->get('masterId');;
            $testTable->time = $request->get('testTime');
            $testTable->state = "1";
            $testTable->save();
            return "با موفقیت ثبت شد ";
        }
        catch(\Exception $e){
            return "انجام نشد لطفا ورودی های خود را کنترل کنید ";
        }
        //End Insert into Test Table
     }
    protected function searchTest(Request $request)
    {
      //  Search item in  Test table
        try{
          $mastercode=$request->get('masterId');
          $records= Test::all()->where('masterId','=',$mastercode);
          $records  = json_decode($records, true);
          if(count($records)>0)
              return $records;
              return "یافت نشد";
        }
        catch(\Exception $e){
            return "یافت نشد لطفا ورودی های خود را کنترل کنید ";
        }
        //End Search item in  Test table

     }
    protected function deleteTest(Request $request)
    {
      //  Search item in  Test table
        try{
           $ajaxId=$request->get('id');
            $id=Test::all()->find($ajaxId);
            if($id){
                if(Test::all()->find($ajaxId)->delete())
                return "true";
            }
        }
        catch(\Exception $e){
            return "دسترسی غیر مجاز صورت نخواهد گرفت ";
        }
        //End Search item in  Test table

     }
    protected function editTest(Request $request)
    {
      //  Search item in  Test table



        try{

            $id = $request->get('id');
            $masterId= $request->get('masterId');;
            $time = $request->get('testTime');
            $name = $request->get('testName');
            $state = $request->get('testState');
            $table=Test::all()->find($id);
            $table->update([
                'masterId'=>$masterId,
                'name'=>$name,
                'state'=>$state,
                 'time'=>$time]);
            $table->save();
            return "انجام شد";
        }
        catch(\Exception $e){
            return "دسترسی غیر مجاز صورت نخواهد گرفت ";
        }
        //End Search item in  Test table

     }
    protected function showQuiz($id )
    {
        $test = Test::find($id);
        if($test!=null){
            $testName=$test->name;
            $test=$test->quiz()->get() ;
            $row="";
            foreach ($test as $item)
            {
                $row.="<tr>
     <td>$item->id</td>
     <td> $item->caption </td>
     <td>$item->answer1</td>
     <td>$item->answer2</td>
     <td >$item->answer3</td>
     <td >$item->answer4</td>
     <td >$item->CorrectAnswer</td>
     <td class='td-actions'>
     <button data-toggle='modal' data-target='#editQuiz' type='button' rel='tooltip' class='btn btn-success editBtn '>
       <i class='material-icons'>edit</i>
      </button>
      <button data-toggle='modal' data-target='#deleteModal' type='button' rel='tooltip' class='btn btn-danger deleteBtn '>
       <i class='material-icons'>close</i>
      </button>
     </td>
    </tr>";
            }
           return view('admin.Panel.quizManager',compact('id','testName','row','test'));
        }
        return abort('404');
    }
    protected function deleteQuiz(Request $request )
    {
        try{
            $ajaxId=$request->get('id');
            $id=Quiz::all()->find($ajaxId);
            if($id){
                if(Quiz::all()->find($ajaxId)->delete())
                    return "با موفقیت حذف شد ";
            }
        }
        catch(\Exception $e){
            return "دسترسی غیر مجاز صورت نخواهد گرفت ";
        }
    }
    protected function registerQuiz(Request $request )
    {
        $lastid=$request->get('id');
        $testId=$request->get('testId');
        $caption=$request->get('caption');
        $q1=$request->get('q1');
        $q2=$request->get('q2');
        $q3=$request->get('q3');
        $q4=$request->get('q4');
        $qt=$request->get('qt');
        try{
            $quizTable = new Quiz();
            $quizTable->testId =$testId;
            $quizTable->caption = $caption;
            $quizTable->answer1 =$q1;
            $quizTable->answer2 = $q2;
            $quizTable->answer3 = $q3;
            $quizTable->answer4 = $q4;
            $quizTable->CorrectAnswer = $qt;
            $quizTable->save();
            $row="<tr>
     <td>$quizTable->id</td>
     <td> $caption </td>
     <td>$q1</td>
     <td>$q2</td>
     <td >$q3</td>
     <td >$q4</td>
     <td >$qt</td>
     <td class='td-actions'>
     <button data-toggle='modal' data-target='#editQuiz' type='button' rel='tooltip' class='btn btn-success editBtn '>
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
            return "دسترسی غیر مجاز صورت نخواهد گرفت ";
        }
    }
    protected function editQuiz(Request $request )
    {
        $testId=$request->get('testId');
        $caption=$request->get('caption');
        $q1=$request->get('q1');
        $q2=$request->get('q2');
        $q3=$request->get('q3');
        $q4=$request->get('q4');
        $qt=$request->get('qt');
        $qid=$request->get('qid');
       try{
           $table=Quiz::find($qid);
           $table->testId =$testId;
           $table->caption = $caption;
           $table->answer1 =$q1;
           $table->answer2 = $q2;
           $table->answer3 = $q3;
           $table->answer4 = $q4;
           $table->CorrectAnswer = $qt;
           $table->save();
            return "true";
        }
        catch(\Exception $e){
            return "دسترسی غیر مجاز صورت نخواهد گرفت ";
        }
    }

}
