<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function mypage(){
        return view('mypage');
    }
}
