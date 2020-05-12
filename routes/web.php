<?php
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('home.home');
});
Route::get('/admin','AdminController@checkLogin');
Route::get('/admin/panel','AdminController@showPanel')->middleware('auth');
Route::get('/admin/regTest','AdminController@showTest')->middleware('auth');
Route::get('/admin/logout',function (){
    Auth::logout();
    session()->forget('adminState');
    session()->forget('adminId');
    session()->flush();
    return redirect('/admin');
})->middleware('auth');
Route::post('/admin', [ 'as' => 'login','uses'=>'AdminController@login']);
Route::post('admin/registerTest','AdminController@registerTests')->name('ajax')->middleware('auth');
Route::get('admin/registerTest','AdminController@showPanel')->middleware('auth');
Route::post('admin/searchTest','AdminController@searchTest')->name('ajaxSearch')->middleware('auth');
Route::get('admin/searchTest','AdminController@showPanel')->middleware('auth');
Route::post('admin/deleteTest','AdminController@deleteTest')->name('ajaxDelete')->middleware('auth');
Route::post('admin/editTest','AdminController@editTest')->name('ajaxEdit')->middleware('auth');
Route::get('admin/editTest','AdminController@showPanel')->middleware('auth');
Route::get('admin/deleteTest','AdminController@showPanel')->middleware('auth');
Route::get('admin/quiz-{id}','AdminController@showQuiz')->name('showQuiz')->middleware('auth')->where(['id'=>'[0-9]+']);
Route::post('admin/deleteQuiz','AdminController@deleteQuiz')->name('deleteQuizAjax')->middleware('auth');
Route::get('admin/deleteQuiz',function (){
    abort(403, 'Unauthorized action.');
})->middleware('auth');
Route::post('admin/regQuiz','AdminController@registerQuiz')->name('registerQuizAjax')->middleware('auth');
Route::post('admin/editQuiz','AdminController@editQuiz')->name('editQuizAjax')->middleware('auth');
Route::get('admin/editQuiz',function (){
    abort(403, 'Unauthorized action.');
})->middleware('auth');
Route::resources(['admin/classManager'=>'ClassController']);
Route::resources(['admin/studentManager'=>'StudentController']);
Route::get('admin/class',function (){
    abort(403, 'Unauthorized action.');
})->middleware('auth');
Route::post('admin/class','ClassController@searchClass')->name('searchClassAjax')->middleware('auth');
Route::post('admin/student','StudentController@searchStudent')->name('searchStudentAjax')->middleware('auth');
Route::get('admin/student',function (){
    abort(403, 'Unauthorized action.');
})->middleware('auth');
Route::get('admin/addClass-{id}','ClassController@addStudent')->name('addStudent')->middleware('auth')->where(['id'=>'[0-9]+']);
Route::resources(['admin/unitManage'=>'UnitController']);
Route::resources(['admin/examHolding'=>'ExamHolderController']);
Route::resources(['admin/masterManager'=>'MasterController']);
Route::get('/mslogin','student\LoginController@checkLogin');
Route::post('/stLogin','student\LoginController@login');
Route::get('/stLogin',function (){
    abort('404');
});
Route::get('mslogin/panel','student\LoginController@showPanel')->middleware('stAuth')->name('stPanel');
Route::get('mslogin/panel/logout',function (){
    session()->forget('studentLogin');
    session()->flush();
   return  redirect('mslogin');
});
Route::post('admin/masterManager','MasterController@searchMasters')->name('searchMaster');
Route::get('admin/masterManager','MasterController@index');
Route::post('admin/masterManager/store','MasterController@store')->name('storeMaster');
Route::get('admin/masterManager/store','MasterController@index');
Route::get('admin/quizResult','ResultController@index')->name('resultTest');
Route::post('admin/quizResult','ResultController@searchResult')->name('searchResult');
Route::get('admin/quizResult/st/{id}-ts{testId}','ResultController@showResult')->name('showStdResult');
Route::Post('admin/examHolding/search','ExamHolderController@search')->name('examSearchAjax');
Route::Post('admin/search-student','ClassController@advSearchStudent')->name('advSearchAjax');
Route::get('admin/search-student',function (){
    abort('404');
});
Route::get('admin/setting','SettingController@index');
Route::post('admin/setting/update','SettingController@update')->name('UpdateProfileAjax');
