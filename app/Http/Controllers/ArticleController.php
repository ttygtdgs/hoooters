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

        // 飛ぶ記事の情報
        $art = Art::where('id',$aid)->get();
        
        //飛ぶ記事に紐づくコメントの情報 (ページ遷移時表示用)
        $texts = Text::join('users','texts.uid','=','users.id')->select('texts.created_at as textscreated_at','texts.txt','users.name','users.icon')->orderBy('textscreated_at', 'asc')->where('aid',$aid->id)->get();

        // 飛ぶ記事に紐づくコメントの情報 (カウント用)
        $textsnums =  Text::where('aid',$aid->id)->get();

        // ユーザーのアイコン情報
        $usersicon=Auth::user()->icon;

        //飛ぶ記事に紐づくライクの情報 (ページ遷移時表示用)
        $likesnums =  Like::where('aid',$aid->id)->get();

        // 飛ぶ記事に紐づくライクの情報 (カウント用)
        $likescon =  Like::where('uid',Auth::user()->id)->where('aid',$aid->id)->get();

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
