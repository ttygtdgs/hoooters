<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //表示
    public function profile(){
        return view('profile');
    }

    public function update(Request $request){
        Log::debug($request);

        //バリデーション
        // $validator = $request->validate([
        //     'cname' => 'required|max:255',
        //     'curl' => 'required|max:255',
        // ]);

        // //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect('/edit')
        //         ->withInput()
        //         ->withErrors($validator);
        // }

        // Eloquentモデル
        $corp = new Corp;
        $corp->cname = $request->cname;
        $corp->curl = $request->curl;
        $corp->save();
        return $request->cname;

    }
    
}
