<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
//顯示學生的資料與成績
Route::get('student/{student_no}', function ($student_no) {
    return "學號:".$student_no;
});

Route::get('student/{student_no}/score', function ($student_no) {
    return "學號:".$student_no."的所有成績";
});


//多個參數路由設定
Route::get('student/{student_no}/score/{subject}', function ($student_no,$subject) {
    return "學號:".$student_no."的".$subject."所有成績";
});
*/

//選擇性路由參數
Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject = null) {
    return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
});
