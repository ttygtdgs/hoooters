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
<!-- 中野作成 -->
<link href="{{asset('/css/draft.css')}}" rel="stylesheet">
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


<main>
<div class="container">
    <div class="title-wrapper">
        <i class="fas fa-pencil-ruler"></i>
        <h1 class="page-title">下書き一覧</h1>
    </div>
    <ul class="draft-wrapper">
        @if($arts->isEmpty())
        <li class="error">
            <p>下書きはありません。</p>
        </li>
        @else
            @foreach($arts as $art)
            <li class="draft-item">
                <div class="item-left">
                    <div class="draft-title">
                        <h2 class="cname">{{$art->cname}}</h2>
                        <p class="service">{{$art->service}}</p>
                    </div>
                    <div class="draft-date">
                        <p class="update">{{$art->adate->format('Y/m/d')}} {{$art->adate->format('H:i')}}</p>
                        <p class="datetitle">-編集</p>
                    </div>
                </div>
                <div class="item-right">
                    <a href="{{ url('postedit/'.$art->id) }}" class="draft-btn">編集</a>
                    <div class="delete-btn">削除</div>
                    <form action="{{ url('draft/'.$art->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="none"></button>
                    </form>
                </div>
            </li>
            @endforeach
        @endif
    </ul>
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
<script src="{{ asset('js/draft.js') }}"></script>
</body>

</html>