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

         //アイコン 取得
        $file = $request->file('art_img'); //file が空かチェック
        if( !empty($file) ){
            //アイコン名を取得
            $filename = $file->getClientOriginalName(); //AWSの場合どちらかになる事がある”../upload/” or “./upload/”
            $move = $file->move('./pic/',$filename);
        }else{
            $filename = "test";
        }

        //データ登録
        $article = new Art;
        $article->uid = $request->uid;
        $article->cid = $request->cid;
        $article->gid = $request->gid;
        $article->service = $request->service;
        $article->art_img = '/pic/'.$filename;
        $article->art_place = 'test';
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
