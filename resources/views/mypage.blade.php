<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Hoooters</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <!-- 丹羽作成 -->
  <link href="{{asset('/css/mypage.css')}}" rel="stylesheet">
  <!-- fontawsome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
  <!-- リセットcssを追加する -->
  <link rel="stylesheet" href="#">

</head>

<body>

<!--Header-->
<header style="background:rgb(8,165,234) ;">
  <nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="#"><strong>Hoooters</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Opinions</a>
        </li>
      </ul>
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </nav>

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
              <i class="fa fa-github my-icon" style="font-size: 2em; color: black;" aria-hidden="true"></i>
            </a>
          @endif
          @if (Auth::user()->tsite == "")
          @else
          <a href="{{Auth::user()->tsite}}" target="_blank" rel="noopener noreferrer">
            <i class="fa fa-twitter my-icon " style="font-size: 2em; " aria-hidden="true"></i>
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
            <!-- 初めまして、チキンです。原宿のエンジニア養成学校に通ってます。チーム開発頑張るぞ〜〜。 -->
            {{Auth::user()->intro}}
        </div> 
        <hr>
        <div  id="leftprofile5">
            <div id="leftprofile5_1">
                <!-- データ取得！！ -->
                <p class="p5">0</p>
                <p>投稿</p>
            </div>
            <div id="leftprofile5_2">
                <!-- データ取得！！ -->
                <p class="p5">0</p>
                <p>お気に入り</p>
            </div>
        </div>
        <div id="leftprofile6">
            <a href="/hoooters/public/profile" id="">
                プロフィールを編集する
            </a>
        </div>
        <!-- <hr>
        <div id="leftprofile7">
            <a href="" id="">
                ログアウト
            </a>
        </div> -->

    </div>

    <div id="rightprofile">
        <div id="like">
            <div id="like1">
                <span class="fa fa-thumb-tack" style="font-size:20px;color:#c5a800;margin-right:8px"></span>
                最新のお気に入り記事
            </div>
            <ul>
                <!-- foreach -->
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                    <div id="li2">投稿者：チキン&ensp;&ensp;投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                    <div id="li2">投稿者：チキン&ensp;&ensp;投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                    <div id="li2">投稿者：チキン&ensp;&ensp;投稿日：2020/12/15</div>
                </li>
                <hr>
                <!-- foreach -->
               
                <br>
            </ul>
        </div>

        <div id="article">  
            <div id="article1">
            <span class="fa fa-pencil" style="font-size:20px;color:#c5a800;margin-right:8px"></span>
                投稿した記事一覧
            </div>
            <ul>
                <!-- foreach -->
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                </li>
                <hr>
                <!-- foreach -->
                <br>
            </ul>
        </div>
    </div>

</div>


</main>

<!-- Main -->








<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Footer text 1</h5>
        <p>aaaaaaaaaaaaa</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
        <p>aaaaaaaaa</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Hoooters</div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



  <!-- SCRIPTS -->
 <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>

</html>