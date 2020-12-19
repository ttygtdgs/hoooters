<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //入ってきた時
    public function article(){
        // ＄likes = Like::
        return view('article');
    }

}
