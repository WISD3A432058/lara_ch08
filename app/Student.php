<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Score as ScoreEloquent;

use \App\User as UserEloquent;

class Student extends Model
{
    //設定 model 對應到的資料表
    protected $table = 'students';

    //a Student hasOne Score
    public function score(){
        return $this->hasOne(ScoreEloquent::class);
    }

    //a Student belongTo a User
    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }
}
