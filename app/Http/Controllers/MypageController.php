<?php

namespace App\Http\Controllers;

use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Auth;
use Illuminate\Http\Request;


class MypageController extends Controller
{
    public function mypage(){
        $users = Auth::user();
        $usersicon=Auth::user()->icon;
        // 上の$usersiconでassetヘルパー関数の引数に入れても画像は表示されない→{{asset('{{$usersicon}}')}}。''で囲むと文字列になって、ヘルパー関数使えないか?
        $usersicon=asset($usersicon);


        return view('mypage',[
            'users' => $users,
            'usersicon' => $usersicon
        ]);

    }
}
