<?php

namespace App\Http\Controllers;
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Log;

class ArticleController extends Controller
{
    public function article(Art $aid){
        Log::debug($aid);
        // テキストテーブルからデータ取得(joinを使って、usersテーブルと結合)
        // created_atのカラム名が被っているので、selectを使って、textsテーブルのcreated_atを「textscreated_at」に変更
        // また、selectで結合したテーブルから、必要なカラムのみ、抽出する。ここでは、①textsテーブルの「textscreated_at(※上で名前変えたやつ！！)」、②textsテーブルの「txt」、③usersテーブルの「name」
        // orderByで、textsテーブルの「textscreated_at」で並び替え
        $art = Art::where('id',$aid)->get();
        $texts = Text::join('users','texts.uid','=','users.id')->select('texts.created_at as textscreated_at','texts.txt','users.name','users.icon')->orderBy('textscreated_at', 'asc')->get();

        $usersicon=Auth::user()->icon;
        // 対応するaidのデータのみとってくる。ここの「1」を変更！
        $textsnums =  Text::where('aid',$aid)->get();
        $likesnums =  Like::where('aid',$aid)->get();

        // 対応するlikeの状態データをとってくる。ここの「1」を変更！
        $likescon =  Like::where('uid',Auth::user()->id)->where('aid',$aid)->get();

        // 「article.blade.php」に遷移 & データを渡す
        return view('article',[
            'art' => $art,
            'aid' => $aid,
            'texts' => $texts,
            'usersicon' => $usersicon,
            'textsnums' => $textsnums,
            'likesnums' => $likesnums,
            'likescon' => $likescon,
             ]);
    }

}
