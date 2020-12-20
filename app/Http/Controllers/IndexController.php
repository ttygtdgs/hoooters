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
        $arts = \App\Art::get(); 

        return view('index',[
            "arts" => $arts

        ]);
    }

    public function kensaku($key){
        
        $arts = $this->art->
        Log::debug($key);



        return response()->json($arts);
    }


}