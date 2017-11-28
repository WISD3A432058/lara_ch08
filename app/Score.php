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

    //對查詢的資料作排序(依總分排序)
    public function scopeOrderByTotal($query){
        return $query->orderBy('score.total','DESC');
    }

    //對查詢的資料作排序(依國英數排序)
    public function scopeOrderBySubject($query){
        return $query->orderBy('score.chinese','DESC')
            ->orderBy('score.english','DESC')
            ->orderBy('score.math','DESC');
    }
}
