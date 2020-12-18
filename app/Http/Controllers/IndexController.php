<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function top(){
        return view('index');
    }




}

