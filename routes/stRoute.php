<?php
Route::get('/startQuiz/quiz/{id}/{stId}','student\TestController@index');
Route::post('/endQuiz','student\TestController@submit')->name('submitQuizAjax');
Route::get('/quizResult','student\LoginController@Results')->name('quizResultGet');
Route::post('/quizResult','student\LoginController@showResult')->name('quizResultPost');
//----------------------------------------------
Route::post('/quizResult/getTrackingCode','student\LoginController@getTrackingCode')->name('getQuizTrackCode');