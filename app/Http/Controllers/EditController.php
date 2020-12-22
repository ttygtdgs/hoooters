<?php

namespace App\Http\Controllers;
use App\Art;
use Validator;
use Auth;
use Log;
use Illuminate\Http\Request;

class EditController extends Controller
{
    //登録
    public function register(Request $request){
        // Log::debug($request);
        $validator = Validator::make($request->all(), [
            'uid' => 'required',
            'gid' => 'required',
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
        // $imgsrc = explode(',', $imgsrc);
        if(!empty($imgsrc)){
            $imgsrc = str_replace('data:image/png;base64,','',$imgsrc);
            $imgsrc = str_replace(' ','+',$imgsrc);
            $fileData = base64_decode($imgsrc);
            //PHPのデコードでは、+がスペースに置き換わってしまうので戻す
            $file_name = "./pic/".date("YmdHis").".png";

            file_put_contents($file_name, $fileData);
        }else{
            $file_name = NULL;
        }

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
        return redirect('/');
    }

    //表示
    public function edit(){
        $user = Auth::user();
        return view('edit',[
            'usericon'=>$user->icon
        ]);
    }

    public function postedit(){
        $user = Auth::user();

        return view('postedit',[
            'usericon'=>$user->icon
        ]);
    }
}
