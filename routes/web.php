<?php
use App\Art;
use App\Corp;
use App\Gyo;
use App\Like;
use App\Text;
use App\User;
use Illuminate\Http\Request;



// 一覧ページ（後藤田担当）
Route::get('/', function () {
    return view('index');
});

// 記事登録ページ（風太担当）
Route::get('/article', function () {
    return view('article');
});
Route::get('/edit', function () {
    return view('edit');
});

// マイページ（丹羽担当）
Route::get('/mypage', function () {
    return view('mypage');
});

// ログイン、認証ページ（田代担当）
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
