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

<<<<<<< HEAD
        return view('index',[
            "arts" => $arts

        ]);
    }

    public function kensaku($key){
        
        $arts = $this->art->
        Log::debug($key);



        return response()->json($arts);
    }


=======
        return view('index');
    }


    public function sub(){
        return view('indexcopy');
    }



      public function kensaku(Request $request){
        // $arts = $this->art->where('jcomme','like','%'.$key.'%')->get();
        // return response()->json($users);
         // Log::debug($key);
         Log::debug($request);
         Log::debug($request->key);
        $key = $request->key;
        
        $query = Art::query();

        if (!empty($key)) {
            $query->where('jcomme', 'LIKE', "%{$key}%");
        }

        $arts = $query->get();

        $artss = Art::join('corps', 'arts.cid', '=', 'corps.cid')
                // ->select('aid', 'cname', 'jcomme')
                ->join('gyos', 'arts.gid', '=', 'gyos.gid');
                ->get();

        //  $arts = Art::where('jcomme','%'.$request->key.'%')->get();
        // $arts = "3";

         //Log::debug($arts);
         //Log::debug($arts[0]);
        //  Log::debug($arts->cid);
          Log::debug($artss);
            





         
        return $artss;
    }



         $arts = Art::where('jcomme','%'.$request->key.'%')->get();
        // $arts = "3";

         Log::debug($request->key);





         
        return $arts;
    }


    public function latest(){
        // $arts = $this->art->where('jcomme','like','%'.$key.'%')->get();
        // return response()->json($users);
        

        return view('edit');
    }

>>>>>>> main
}