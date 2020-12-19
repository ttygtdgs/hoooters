<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Log;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function top(){
        return view('index');
    }

    public function sub(){
        return view('indexcopy');
    }

    public function kensaku(){


        // Log::debug($request);
        return view('index');
    }

    public function getArticlesByKeyword($keyword)
    {
        $articles = Art::where('jcomme', $keyword)->groupBy('address')->pluck('address');

        return response()->json($addresses);
    }
}