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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        Log::debug(Auth::id());
        $uid = Auth::id();
        $id = $request->id;
        $key = $request->key;
        // $uid = $request->uid;

        if (!empty($key) || $key!=null) {
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where(function ($query) use ($key){
                $query->where('arts.jcomme', 'LIKE', "%{$key}%")
                    ->orWhere('arts.zcomme', 'LIKE', "%{$key}%")
                    ->orWhere('corps.cname', 'LIKE', "%{$key}%")
                    ->orWhere('arts.service', 'LIKE', "%{$key}%")
                    ->orderBy('adate','desc');
            })
            ->get();
        }else if($id=='timeline'){ //タイムライン
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='popular'){ //人気記事
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->join('likes','arts.aid', '=', 'likes.aid')
            ->groupBy('likes.aid')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name',\DB::raw('COUNT(likes.aid) as likes'))
            ->where('arts.life_flg', '=', 1)
            ->orderby('likes','desc')
            ->get();
        }else if($id=='favorite'){ //お気に入り
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->join('likes','arts.aid', '=', 'likes.aid')
            ->select('arts.updated_at as adate','likes.uid as likeuid','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('likeuid', '=', $uid)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='news'){ //新規事業
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 1)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='webservice'){ //Webサービス
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 2)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='production'){ //新規事業
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 3)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='marketing'){ //新規事業
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 4)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='other'){ //その他
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 5)
            ->orderby('adate','desc')
            ->get();
        }else if($id=='sier'){ //Sier系
            $arts = Art::join('corps','arts.cid', '=', 'corps.cid')
            ->join('gyos','arts.gid', '=', 'gyos.gid')
            ->join('users','arts.uid', '=', 'users.id')
            ->select('arts.updated_at as adate','corps.cname','arts.service','gyos.gid','gyos.gname','arts.jcomme','arts.art_img','users.icon','users.name')
            ->where('arts.life_flg', '=', 1)
            ->where('gyos.gid', '=', 6)
            ->orderby('adate','desc')
            ->get();
        }else{
            $arts = null;
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