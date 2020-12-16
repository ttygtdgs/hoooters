<?php

namespace App\Http\Controllers;
use App\Corp;
use Log;
use Illuminate\Http\Request;

class CorpController extends Controller
{
    public function register(Request $request){
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
        $cname = $request->cname;
        return response()->json($cname);

    }
}
