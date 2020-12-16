<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    //登録
    public function register(){
        return view('edit');
    }

    public function edit(){
        return view('edit');
    }
}
