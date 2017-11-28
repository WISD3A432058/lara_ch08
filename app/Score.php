<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Student as StudentEloquent;

class Score extends Model
{
    //設定 model 對應到的資料表
    protected $table = 'scores';

    //a Score belongTo a Student
    public function student(){
        return $this->belongsTo(StudentEloquent::class);
    }
}
