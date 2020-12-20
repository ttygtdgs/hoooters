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

      public function kensaku(Request $request){
        // $arts = $this->art->where('jcomme','like','%'.$key.'%')->get();
        // return response()->json($users);
         // Log::debug($key);
        //  Log::debug($request->key);
        $key = $request->key;

        // $query = Art::query();

        if (!empty($key)) {
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->where('jcomme', 'LIKE', "%{$key}%") 
            ->where('zcomme', 'LIKE', "%{$key}%") 
            ->orWHERE('cname', 'LIKE', "%{$key}%")
            ->orWHERE('service', 'LIKE', "%{$key}%")
            ->get();
        }

        Log::debug($arts);

        // $arts = $query->get();

        // $cname = Corp::where('corps', 'arts.cid', '=', 'corps.cid')
                // ->select('aid', 'cname', 'jcomme')
                // ->join('gyos', 'arts.gid', '=', 'gyos.gid')
                // ->get();



        return response()->json($arts);
    }


}