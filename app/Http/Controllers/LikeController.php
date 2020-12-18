<?php

namespace App\Http\Controllers;

use App\Like;
use Auth;
use Illuminate\Http\Request;
use Log;



class LikeController extends Controller
{
    public function like_product(Request $request)
    {
        Log::debug($request);
        Log::debug($request->aid);
        Log::debug($request->like_product);
        



         if ( $request->input('like_product') == 0) {
             //ステータスが0のときはデータベースに情報を保存
            //  Likes::create([
            //      'aid' => $request->input('aid'),
            //       'uid' => auth()->user()->id,
            //  ]);

             $likes = new Like;
             $likes->aid = $request->aid;
             $likes->uid = $request->like_product;
             $likes->save();




            //ステータスが1のときはデータベースに情報を削除
         } elseif ( $request->input('like_product')  == 1 ) {
            //  Likes::where('aid', "=", $request->input('aid'))
            //     ->where('uid', "=", auth()->user()->id)
            //     ->delete();

            $likes = Like::where('aid', "=", $request->aid);
            $likes->delete();
        }
         return  $request->input('like_product');
    } 
}


