<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Hoooters</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- fontawsome -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
  <!-- 丹羽作成 -->
  <link href="{{asset('/css/mypage.css')}}" rel="stylesheet">
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">

</head>

<body>

<!--Header-->
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
                  <a href="{{ route('logout') }}" id="logout">
                    <i class="fa fa-sign-out " style="font-size: 2em; color:#fff; " ></i>
                   </a>
                   <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
                   {{ csrf_field() }}
                   <!--  以上、ログアウト処理-->
                </li>          
            </ul>
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
              <i class="fa fa-github my-icon" style="font-size: 2em; color: black;" aria-hidden="true"></i>
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
              <p>「プロフィールを編集する」から、自己紹介文を記載しましょう！</p>
          @else
               <!-- 初めまして、チキンです。原宿のエンジニア養成学校に通ってます。チーム開発頑張るぞ〜〜。 -->
               <p>{{Auth::user()->intro}}</p>
          @endif
        </div> 
        <div  id="leftprofile5">
            <div id="leftprofile5_1">
                <!-- データ取得！！ -->
                <p class="p5">0</p>
                <p class="p6">投稿</p>
            </div>
            <div id="leftprofile5_2">
                <!-- データ取得！！ -->
                <p class="p5">0</p>
                <p class="p6">お気に入り</p>
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
                    <hr>
                </li>
                
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                    <div id="li2">投稿者：チキン&ensp;&ensp;投稿日：2020/12/15</div>
                    <hr>
                </li>
                
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</div>
                    <div id="li2">投稿者：チキン&ensp;&ensp;投稿日：2020/12/15</div>
                    <hr>
                </li>
                
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
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                <li>
                    <a href="" class="">サイバーエージェント&ensp;webマーケティング&ensp;開発事業</a> 
                    <div id="li1">投稿日：2020/12/15</div>
                    <hr>
                </li>
                
                
              
                <!-- foreach -->
                <br>
            </ul>
        </div>
    </div>

</div>
</main>

<!-- Main -->

<script src="{{ asset('js/logoutconfirm.js') }}"></script>
</body>

</html>