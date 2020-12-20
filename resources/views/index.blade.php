<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hootersのトップページ</title>
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
  <!-- 後藤田用css -->
  <link href="{{asset('/css/indexcopy.css')}}" rel="stylesheet">
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
            <div class="menu-list">
                <a href="#" class="menu-item act">
                    <i class="fas fa-clock"></i>
                    <p>タイムライン</p>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-fire-alt"></i>
                    <p>人気記事</p>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-heart"></i>
                    <p>お気に入り</p>
                </a>
                <div class="menu-item" id="gyo-btn">
                    <i class="fas fa-object-ungroup"></i>
                    <p>業態別</p>
                    <div class="gyo-list-box">
                        <ul class="gyo-list">
                            <!-- gyo-listにclass"act"追加で以下表示-->
                            <li class="gyo-item">新規事業</li>
                            <li class="gyo-item">Webサービス</li>
                            <li class="gyo-item">Webプロダクション</li>
                            <li class="gyo-item">Webマーケティング</li>
                            <li class="gyo-item">その他</li>
                            <li class="gyo-item">Sier系</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="right-content">
        <!-- データを引っ張ってくる -->
        <div class="right-title">
            <i class="fas fa-clock"></i>
            <h2 id="right-theme">タイムライン</h2>
        </div>
        <div class="right-content">
            <ul class="tab-wrap">
                <!-- １記事 -->
                <div id=futa></div>
                <li class="feed">
                    <div class="feed-left">
                        <p class="kigyo-name">株式会社サンリオ</p>
                        <p class="jigyo">ハローキティ事業部　WEBマーケ</p>
                        <div class="kigyo-comme"><p class="jcomme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい</p></div>
                    </div>
                    <!-- ピクト図読み込み -->
                    <div class="feed-right">
                        <img src="{{asset('/pic/example1.png')}}" class="feed-pict">
                    </div>
                    <!-- アイコン -->
                    <div class="feed-bottom">
                        <div class="icon-img">
                            <img src="{{asset('/pic/icon.png')}}"  class="float">
                        </div>
                        <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                    </div>
                </li>
                <!-- １記事 -->
                <li class="feed">
                    <div class="feed-left">
                        <p class="kigyo-name">株式会社サンリオ</p>
                        <p class="jigyo">ハローキティ事業部　WEBマーケ</p>
                        <div class="kigyo-comme"><p class="jcomme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい</p></div>
                    </div>
                    <!-- ピクト図読み込み -->
                    <div class="feed-right">
                        <img src="{{asset('/pic/example1.png')}}" class="feed-pict">
                    </div>
                    <!-- アイコン -->
                    <div class="feed-bottom">
                        <div class="icon-img">
                            <img src="{{asset('/pic/icon.png')}}"  class="float">
                        </div>
                        <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                    </div>
                </li>
                <!-- １記事 -->
                <li class="feed">
                    <div class="feed-left">
                        <p class="kigyo-name">株式会社サンリオ</p>
                        <p class="jigyo">ハローキティ事業部　WEBマーケ</p>
                        <div class="kigyo-comme"><p class="jcomme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい</p></div>
                    </div>
                    <!-- ピクト図読み込み -->
                    <div class="feed-right">
                        <img src="{{asset('/pic/example1.png')}}" class="feed-pict">
                    </div>
                    <!-- アイコン -->
                    <div class="feed-bottom">
                        <div class="icon-img">
                            <img src="{{asset('/pic/icon.png')}}"  class="float">
                        </div>
                        <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>




<footer>
    <p>@G's Academy TOKYO Lab10_Hooters</p>
</footer>



<!-- ajax用jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>

</html>