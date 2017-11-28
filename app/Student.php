<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //設定 model 對應到的資料表
    protected $table = 'students';

    //a Student hasOne Score
    public function score(){
        return $this->hasOne(ScoreEloquent::class);
    }
}
