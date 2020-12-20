<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Like;
use App\User;
use App\Text;
use Auth;
use Log;

class TextContoroller extends Controller
{
    public function text(Request $request){
        // デバック部分
        Log::debug($request);

        // 「text.js」から、ajaxで、「web.php」経由で、情報を取得し、textテーブルにデータ登録
        $texts = new Text;
        $texts->id = Auth::user()->id;
        $texts->aid = $request->aid;
        $texts->txt = $request->txt;
        $texts->save();

        // 「text.js」に、情報返す
        return  $texts;

    }
}
