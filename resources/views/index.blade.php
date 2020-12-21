<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hootersのトップページ</title>
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
  <!-- 後藤田用css -->
  <link href="{{asset('/css/index.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!-- ヘッダー統一用のfontawesome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">

</head>
<body>

<!-- HEADER -->
<header class="header">
    <h1>Hoooters</h1>
    <nav>
        <ul>
            <li>
                <a href="{{url('/')}}">
                <i class="fa fa-home" style="font-size: 2em; color: #fff;" ></i>
                </a>
            </li>
            <li>
                <a href="{{url('/edit')}}">
                <i class="fa fa-newspaper-o " style="font-size: 2em; color: #fff; " ></i>
                </a>
            </li>
            <li>
                <a href="{{url('/mypage')}}">
                <i class="fa fa-user-circle-o " style="font-size: 2em; color:#fff; " ></i>
                </a>
            </li>
            <li>
                <!--  以下、ログアウト処理-->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out " style="font-size: 2em; color:#fff; " ></i>
                </a>
                <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                <!--  以上、ログアウト処理-->
            </li>
        </ul>
    </nav>
</header>

<main>
    <div class="left-content">
        <div class="searchform">
                <i class="fas fa-search"></i>
                <input type="text" id="key" class="kensaku" placeholder="キーワードを入力">
        </div>
        <div class="left-box">
            <h2 class="left-title">記事フィード</h2>
            <ul class="menu-list">
                <li href="#" class="menu-item actmenu" id="timeline">
                    <i class="fas fa-clock"></i>
                    <p class="list-name">タイムライン</p>
                </li>
                <li href="#" class="menu-item" id="popular">
                    <i class="fas fa-fire-alt"></i>
                    <p class="list-name">人気記事</p>
                </li>
                <li href="#" class="menu-item" id="favorite">
                    <i class="fas fa-heart"></i>
                    <p class="list-name">お気に入り</p>
                </li>
                <li class="menu-item" id="gyo-btn">
                    <i class="fas fa-object-ungroup"></i>
                    <p class="list-name">業態別</p>
                    <div class="gyo-list-box">
                        <ul class="gyo-list">
                            <!-- gyo-listにclass"act"追加で以下表示-->
                            <li class="gyo-item" id="news">新規事業</li>
                            <li class="gyo-item" id="webservice">Webサービス</li>
                            <li class="gyo-item" id="production">Webプロダクション</li>
                            <li class="gyo-item" id="marketing">Webマーケティング</li>
                            <li class="gyo-item" id="other">その他</li>
                            <li class="gyo-item" id="sier">Sier系</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <div class="right-content">
        <!-- データを引っ張ってくる -->
        <div class="right-title">
            <i class="fas fa-clock" id="right-title-icon"></i>
            <h2 id="right-theme">タイムライン</h2>
        </div>
        <div class="right-content">
            <ul class="tab-wrap">
                <!-- １記事 -->


            </ul>
        </div>
    </div>
</main>




<footer>
    <p>@G's Academy TOKYO Lab10_Hooters</p>
</footer>



<!-- ajax用jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>

</html>