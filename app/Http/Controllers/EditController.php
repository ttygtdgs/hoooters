<?php

namespace App\Http\Controllers;
use App\Art;
use Validator;
use Log;
use Illuminate\Http\Request;

class EditController extends Controller
{
    //登録
    public function register(Request $request){
        Log::debug($request);

        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'cid' => 'required',
            'gid' => 'required',
            'art_img' => 'required',
            'art_place' => 'required',
            'service' => 'required',
            'jcomme' => 'required',
            'zcomme' => 'required',
            'life_flg' => 'required',
            ]);

         //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('edit')
                    ->withInput()
                    ->withErrors($validator);
        }

        //画像変換
        $imgsrc = $request->art_img;
        list(, $imgsrc) = explode(',', $imgsrc);
        //PHPのデコードでは、+がスペースに置き換わってしまうので戻す
        $file_name = "./pic/".date("YmdHis").".png";

        file_put_contents($file_name, base64_decode(str_replace(" ","+",$imgsrc)));

        //  //アイコン 取得
        // $file = $request->file('art_img'); //file が空かチェック
        // if( !empty($file) ){
        //     //アイコン名を取得
        //     $filename = $file->getClientOriginalName(); //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
        //     $move = $file->move('./pic/',$filename);
        // }else{
        //     $filename = "test";
        // }

        //データ登録
        $article = new Art;
        $article->uid = $request->uid;
        $article->cid = $request->cid;
        $article->gid = $request->gid;
        $article->service = $request->service;
        // $article->art_img = '/pic/'.$filename;
        $article->art_img = $file_name;
        $article->art_place = $request->art_place;
        $article->jcomme = $request->jcomme;
        $article->zcomme = $request->zcomme;
        $article->life_flg = $request->life_flg;
        $article->save();
        return redirect('edit');
    }

    //表示
    public function edit(){
        return view('edit');
    }
}
