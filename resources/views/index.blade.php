<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hootersのトップページ</title>
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <!-- 後藤田用css -->
  <link href="{{asset('/css/index.css')}}" rel="stylesheet">
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
  <!-- ヘッダー統一用のfontawesome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
 <!-- ajax用に入れる -->

</head>
<body>

<form action="{{ url('/kensaku') }}"  method="get">
    <input type="text" name="keyword" id="1">
    <input type="button" name="keyword" value="検索">
</form>

<div class="footerFixed">
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
                   <!--  以上、ログアウト処理-->
                </li>          
            </ul>
        </nav>
    </header>
  
    <main>
        <div class="wrapper">
            <div class="left-content">
                <div class="left-box">
                    <ul>
                        <li>人気フィード</li>
                        <li>最新投稿</li>
                        <li>業態別</li>
                        <li>追加機能１</li>
                        <li>追加機能２</li>
                        <li>追加機能３</li>
                        <li>追加機能４</li>
                        <li>追加機能５</li>

                    
                    </ul>
                
                
                </div>
            </div>


            <div class="right-content">
        
                    


                <!-- データを引っ張ってくる -->

                
                <div class="tab-wrap">
                    <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">人気フィード</label>
                        <div class="tab-content">

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                                </div>
                            </div>

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                                </div>
                            </div>

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                                </div>
                            </div>

                            
                            
                           
                        </div>

                    <input id="TAB-02" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-02">最新投稿</label>
                    <div class="tab-content">
                        最新投稿
                    </div>
                    <input id="TAB-03" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-03">カテゴリ</label>
                    <div class="tab-content">
                        カテゴリ
                    </div>
                </div>












            </div>
        
        </div>


    
    </main>




    <footer>
        <p>Hootersのフッター</p>    
    </footer>



</div>
</div>


<!-- js読み込みAJAX用 -->
<script src="{{ asset('js/index.js') }}"></script>
<!-- ajax用jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>

</html>