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


//選擇性路由參數
Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject = null) {
    return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
});


//正規表達式限制參數-使用 where 限制
Route::get('student/{student_no}', function ($student_no) {
    return "學號:".$student_no;
}) ->where(['student_no' => 's [0-9] {10} ']);

Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject = null) {
    return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
})->where(['student_no'=>'s[0-9]{10}','subject'=>'(chinese | english | math)']);


//正規表達式限制參數-使用  pattern 限制
Route::pattern('student_no','s [0-9] {10} ');
Route::get('student/{student_no}', function ($student_no) {
    return "學號:".$student_no;
}) ;

Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject = null) {
    return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
})->where(['subject'=>'(chinese | english | math)']);


//路由群組--Route Prefixing
Route::pattern('student_no','s [0-9] {10}');
Route::group(['prefix'=>'student'], function () {
    Route::get('{student_no}', function ($student_no) {
        return "學號:" . $student_no;
    });
        Route::get('student/{student_no}/score/{subject?}', function ($student_no,$subject = null) {
            return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
        })->where(['subject'=>'(chinese | english | math)']);
    });

//路由命名
Route::pattern('student_no','s [0-9] {10}');
Route::group(['prefix'=>'student'], function () {
    Route::get('{student_no}',['as'=>'student','users'=> function ($student_no) {
        return "學號:" . $student_no;
    }
    ]);
    Route::get('student/{student_no}/score/{subject?}',['as'=>'student.score','users' => function ($student_no,$subject = null) {
        return "學號:".$student_no."的".((is_null($subject))?"所有科目":$subject)."成績";
    }
    ])->where(['subject'=>'(chinese | english | math)']);
});

//修改根路由'/'，使之可執行HomeController的indexc函數
Route::get('/','HomeController@index');
*/
Route::group(['prefix'=>'student'], function () {
    Route::get('{student_no}',[
        'as'=>'student',
        'uses'=> 'StudentController@getStudentData '
    ]);
    Route::get('student/{student_no}/score/{subject?}',[
        'as'=>'student.score',
        'uses' =>'StudentController@getStudentData '
    ])->where(['subject'=>'(chinese | english | math)']);
});
