<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Hoooters</title>

<!-- リセットcss -->
<link href="{{asset('/css/reset.css')}}" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- fontawsome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
<!-- 丹羽作成 -->
<link href="{{asset('/css/mypage.css')}}" rel="stylesheet">
<!-- Favicons -->
<link href="{{asset('/pic/favicon.png')}}" rel="icon">
</head>

<body>

<!--Header-->
<header class="header">
    <div class="header-container">
        <a href="{{url('/')}}" class="header-left">
            <img src="{{asset('pic/logo.png')}}" alt="Hoooters">
        </a>
        <div class="header-right">
            <a href="{{url('/edit')}}" class="edit-btn">
                <i class="fas fa-edit"></i>
                <p>投稿する</p>
            </a>
            <div class="icon-wrapper">
                <div class="myicon">
                    <!-- アイコン -->
                    <img src="{{$usersicon}}">
                </div>
                <i class="fas fa-sort-down"></i>
                <div class="mypage-list none">
                    <a href="{{url('/mypage')}}" id="mypage-btn">マイページ</a>
                    <a href="{{url('/draft')}}" id="draft-btn">下書き一覧</a>
                    <div id="logout-btn">ログアウト</div>
                    <form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!--Header-->



<!-- Main -->
<!-- 以下、「ProfileController.php」のバリテーションエラー確認用 -->
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<!-- 以上、「ProfileController.php」のバリテーションエラー確認用 -->
<main>

<div id="profile">
  <div id="leftprofilebox">
    <div id="leftprofile">
        <div id="leftprofile1">
            <img src="{{$usersicon}}" alt="">
        </div>
        <div id="leftprofile2">
            <!-- ユーザーネーム -->
            {{Auth::user()->name}}さん
        </div>
        <div id="leftprofile3">
          @if (Auth::user()->site == "")
          @else
            <a href="{{Auth::user()->site}}" target="_blank" rel="noopener noreferrer">
              <i class="fa fa-github my-icon" style="font-size: 2em; color: rgb(53, 53, 53);" aria-hidden="true"></i>
            </a>
          @endif
          @if (Auth::user()->tsite == "")
          @else
          <a href="{{Auth::user()->tsite}}" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-twitter my-icon " style="font-size: 2em; color:#55acee; " aria-hidden="true"></i>
          </a>
          @endif
          @if (Auth::user()->fsite == "")
          @else
          <a href="{{Auth::user()->fsite}}" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook-square" style="font-size: 2em; color: royalblue;" aria-hidden="true"></i>
          </a>
          @endif
        </div>
        <div id="leftprofile4">
          @if (Auth::user()->intro == "")
              <p>「プロフィールを編集する」から<br>自己紹介文を記載しましょう！</p>
          @else
               <!-- 初めまして、チキンです。原宿のエンジニア養成学校に通ってます。チーム開発頑張るぞ〜〜。 -->
               <p>{{Auth::user()->intro}}</p>
          @endif
        </div>
        <div  id="leftprofile5">
            <div id="leftprofile5_1">
                <!-- データ取得！！ -->
                <p class="p5">{{$artcount}}</p>
                <p class="p6">Posts</p>
            </div>
            <div id="leftprofile5_2">
                <!-- データ取得！！ -->
                <p class="p5">{{$likecount}}</p>
                <p class="p6">Likes</p>
            </div>
        </div>
        <div id="leftprofile6">
            <a href="/hoooters/public/profile" id="">
                プロフィールを編集する
            </a>
        </div>
    </div>
  </div>

    <div id="rightprofile">
        <div id="like">
            <div class="article-title">
                <span class="fa fa-thumb-tack"></span>
                <p>最新のお気に入り記事</p>
            </div>
            <ul class="art-list">
                <!-- foreach -->
                @foreach ($likearts->all() as $likeart)
                <li class="art-item">
                    <a href="{{url('/article/'.$likeart->id)}}" class="art-title">{{$likeart->cname}}<span>{{$likeart->service}}</span></a>
                    <div class="post-name">
                        <div class="poster-icon">
                            <img src="{{$likeart->icon}}">
                        </div>
                        <p class="poster-info">{{$likeart->name}}さんが{{$likeart->adate->format('Y年m月d日')}}に投稿</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div id="article">
            <div class="article-title">
                <span class="fa fa-pencil"></span>
                <p>投稿した記事</p>
            </div>
            <ul class="art-list">
                <!-- foreach -->
                @foreach ($postarts->all() as $postart)
                <li class="art-item myarts">
                    <a href="{{url('/article/'.$postart->id)}}" class="art-title">{{$postart->cname}}<span>{{$postart->service}}</span></a>
                    <div class="post-name">
                        <p class="poster-info">{{$postart->adate->format('Y年m月d日')}}に投稿</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
</main>

<!-- Main -->

<!-- 以下、footer ----------------------------------------->
<footer>
    <p>@G's Academy TOKYO Lab10_Hooters</p>
</footer>
<!-- 以上、footer ----------------------------------------->

<script src="{{ asset('js/url.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>
</body>

</html>