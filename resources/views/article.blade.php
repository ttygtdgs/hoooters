<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- 以下は丹羽追記、ajax部分の対応 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Articleページ</title>
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
 <!-- fontawsome -->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- articleページ用css -->
  <link href="{{asset('/css/art.css')}}" rel="stylesheet">
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
</head>
<body>

<!-- 以下、header----------------------------------------------- -->
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

    
<!-- 以上、header----------------------------------------------- -->

<!-- 以下、検証 -->

              @if(isset($product->like_products[0]))
                  <a class="toggle_wish" aid="1" like_product="1">
                       <i class="fas fa-heart"></i>
                  </a>
              @else
                  <a class="toggle_wish" aid="1" like_product="0">
                      <i  class="far fa-heart"></i>
                  </a> 
              @endif



<!-- 以下、検証 -->




<!-- 以下、main----------------------------------------------- -->

    <main>

        <div class="wrapper">
              <div class="left-content">
                  <div class="like-icon">
                    <div class="page_top">
                      <p class="like-num">111</p>
                      <a href="#"><i class="far fa-heart fa-3x"></i></a>
                      <p class="like-num">225</p>
                      <a href="#"><i class="far fa-comments fa-3x"></i></a>
                    </div>
                  </div>
              </div>



              <div class="middle-content">
                        <div class="feed">                 
                              <div class="feed-top">
                                  <img src="{{asset('/pic/icon.png')}}"  class="float">
                                  <p class="kigyo"> @ふーたーず<span class="update-day">2020年12月25日</span>に更新</p>
                              </div>
                              <div class="cont">
                                    <p class="corp"><span class="kigyo-name">株式会社サンリオ</span> ハローキティ事業部</p>
                                    <p class="gyo-tag"><span class="gyo-tag-back">＃Webマーケ</span></p>
                                    
                                    <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                    <h2 class="j-title">事業概要</h2>
                                    <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。PROFILEハローキティ 1974年身長はりんご5個分。体重はりんご3個分。明るくて、優しい女のコ。クッキーを作ったり、ピアノをひくのが大好きで、夢はピアニストか、詩人になること。音楽と英語が得意。好きな食べ物は、ママが作ったアップルパイ。双子の妹、ミミィとは大の仲良し。</p>
                                      
                                    
                                    <h2 class="j-title">諸条件</h2>
                                    <p class="kigyo-comme">サンリオピューロランドはハローキティをはじめとする、たくさんのサンリオキャラクターに触れ合えるテーマパーク。全館屋内型の施設だから、天候を気にせずに思いっきり遊べます！サンリオの世界をより体験できるエリア「サンリオタウン」では、ハローキティ、マイメロディ、リトルツインスターズのそれぞれの世界を体験できちゃいます。その他にも本格的なミュージカルやパレードを上演！子どもから大人まで楽しめるテーマパークです。</p>
                              </div>
                              <div class="comme">
                                <h2 class="j-title">コメント</h2>
                                <p class="kigyo-comme">以下コメ

                              </div>
                        </div>  
                </div>
             
              

              <div class="right-content">右側
              </div>
        </div>  
    
    </main>
<!-- 以上、main----------------------------------------------- -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/like.js') }}"></script>
</body>
</html>