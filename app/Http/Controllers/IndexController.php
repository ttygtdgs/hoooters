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

    public function kensaku(Request $request){
        // $arts = $this->art->where('jcomme','like','%'.$key.'%')->get();
        // return response()->json($users);
        //  Log::debug($request->key);
        $id = $request->id;
        Log::debug($id);

        $key = $request->key;

        // $query = Art::query();

        if (!empty($key) || $key!=null) {
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->where('jcomme', 'LIKE', "%{$key}%")
            ->where('zcomme', 'LIKE', "%{$key}%")
            ->orWHERE('cname', 'LIKE', "%{$key}%")
            ->orWHERE('service', 'LIKE', "%{$key}%")
            ->get();
        }else if($id=='timeline'){
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            // ->orderby('update_at','desc')
            ->get();
        }else if($id=='popular'){

        }else if($id=='favorite'){

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