<?php
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;



// 一覧ページ（後藤田担当）
Route::get('/', 'IndexController@top');
Route::get('/indexcopy', 'IndexController@sub');
<<<<<<< HEAD
=======
Route::get('/latest', 'IndexController@latest');
>>>>>>> main

// ajaxの検索機能
Route::get('/kensaku','IndexController@kensaku');

// 記事登録ページ（風太担当）
    // ↓とりあえず
    Route::get('/article', 'ArticleController@article');
    // ↓こっち完成形
    // Route::get('/article/{aid}', 'ArticleController@article');

Route::get('/edit', 'EditController@edit');

Route::post('/edit', 'EditController@register');

Route::post('/corp', 'CorpController@register');

Route::post('/csearch', 'CsearchController@search');

// マイページ（丹羽担当）
Route::get('/mypage', 'MypageController@mypage');

Route::get('/profile', 'ProfileController@profile');

Route::post('/profile', 'ProfileController@update');

// ログイン、認証ページ（田代担当）

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// like関係
Route::post('/like_product', 'LikeController@like_product');
<<<<<<< HEAD
=======


// テキスト投稿用
Route::post('/text', 'TextContoroller@text');
>>>>>>> main
