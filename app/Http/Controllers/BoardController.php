<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Score;


class BoardController extends Controller
{
    public function getIndex()
     {
         //return view('board');

         //可由DB取得學生的國英數成績資料($scores)，且依成績高低排列(依總分排列，再依國英數)後，傳遞給board視圖呈現
         $scores=Score::orderByTotal()
             ->orderBySubject()->get();
         $data=['scores'=>$scores];
         return view('board',$data);
     }
}
