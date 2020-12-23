<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- 以下は丹羽追記、ajax部分の対応 -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hoooters</title>
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
 <!-- fontawsome -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- articleページ用css -->
  <link href="{{asset('/css/art.css')}}" rel="stylesheet">
  <!-- リセットcss -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
  <!-- Favicons -->
  <link href="{{asset('/pic/favicon.png')}}" rel="icon">
</head>
<body>

<!-- 以下、header----------------------------------------------- -->
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
                    <img src="{{asset($usersicon)}}">
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

<!-- 以上、header----------------------------------------------- -->


<!-- 以下、main----------------------------------------------- -->
    <main>

        <div class="wrapper">

              <div class="left-content">
                  <div class="like-icon">
                    <div class="page_top">
                      <p class="like-num1">{{count($likesnums)}}</p>
                      <!-- aidのデータ連携！！！！！！ -->
                      <!-- like_product=0は、いいね押してない状態 -->
                      <!-- like_product=1は、いいね押してる状態 -->
                      @if(isset($likescon[0] -> like_product))
                        <a class="iine" aid="{{$aid->id}}" like_product="1">
                            <!-- これはいいね押してるハート -->
                            <i class="fas fa-heart fa-3x"></i>
                        </a>
                      @else
                        <a class="iine" aid="{{$aid->id}}" like_product="0">
                          <!-- これはいいね押してないハート -->
                            <i  class="far fa-heart fa-3x"></i>
                        </a>
                       @endif

                       <p class="like-num2">{{count($textsnums)}}</p>
                      <!-- <a href="#"> -->
                        <i class="far fa-comments fa-3x"></i>
                      <!-- </a> -->
                    </div>
                  </div>
              </div>
              <div class="middle-content">
                        <div class="feed">
                              <div class="feed-top">
                                  <img src="{{asset($art->icon)}}"  class="float">
                                  <a href="{{ url('othersmypage/'.$art->uid) }}" class=""><p class="kigyo"> ＠{{$art->name}}さんが<span class="update-day">{{$art->adate->format('Y年m月d日')}}</span>に更新</p></a>
                              </div>
                              <div class="cont">

                                    @if(Auth::user()->id == $art->uid)
                                      <div class="deletearea">
                                        <p><span>{{$art->cname}}</span>{{$aid->service}}</p>
                                        <div class="deletearea1">
                                          <a href="{{ url('postedit/'.$aid->id) }}" class="">
                                            <button><i class="fa fa-pencil fa-1x"></i>修正</button>
                                          </a>
                                          <form id="delete_form"action="{{ url('article/'.$art->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="deletebtn">
                                              <i class="fa fa-trash-o fa-1x"></i>
                                              削除する
                                            </button>
                                          </form>
                                        </div>

                                      </div>
                                    @else
                                      <p class="corp"><span class="kigyo-name">{{$art->cname}}</span>{{$aid->service}}</p>
                                    @endif

                                    <div class="gyo-tag">
                                      <button type="button" class="gyo-tag-back">＃{{$art->gname}}</button>
                                    </div>
                                    <img src="{{asset($aid->art_img)}}" class="feed-pict" alt="">
                                    <h2 class="j-title">事業概要</h2>
                                    <p class="kigyo-comme">{!! nl2br(e($art->jcomme)) !!}</p>


                                    <h2 class="j-title">諸条件</h2>
                                    <p class="kigyo-comme">{!! nl2br(e($art->zcomme)) !!}</p>

                                    <h2 class="j-title">企業リンク</h2>
                                    <a href="{{$art->curl}}" style="color: black; font-size: 18px;" target="_blank"><p class="kigyo-comme">{{$art->curl}}</p></a>

                              </div>


                              <div class="comme">
                                <h2 class="j-title">コメント</h2>
                                <ul id="newtext">
                                @if(count($texts)>0)
                                    @foreach ($texts as $texts)
                                    <li>
                                      <div class="comme1">
                                        <div class="comme1_1">
                                          <div class="comme1_1_1"><img src="{{asset($texts->icon)}}" alt=""></div>
                                          <a href="{{ url('othersmypage/'.$texts->uid) }}" class="" style="color: black;"><div>＠{{ $texts->name }}</div></a>
                                        </div>
                                        <div class="comme1_2">{{ $texts->textscreated_at->format('Y年m月d日') }}に投稿</div>
                                      </div>
                                      <br>
                                      <div class="comme2">{{ $texts->txt }}</div>
                                    </li>
                                    @endforeach
                                @else
                                </ul>
                                <div id="comme3">
                                  <p >現在、この記事にコメントはありません。</p>
                                </div>
                                @endif
                              </div>


                             <div class="commepost">
                                <div class="commepost1">
                                  <img src="{{asset($usersicon)}}"  class="">
                                  <p>投稿する</p>
                                </div>
                                <div class="commepost2">
                                  <div class="commepost2_1">
                                    <input type="hidden" name='id' id='id' value="{{Auth::user()->id}}" >
                                    <input type="hidden" name='aid' id='aid' value="{{$aid->id}}" >
                                    <textarea name="txt" id="txt" cols="80" rows="3" placeholder="コメント入力(100文字以内)" maxlength="100" required></textarea>
                                  </div>
                                  <div class="commepost2_2">
                                    <input type="button" id="txtbtn" style="margin-left: auto;" value="投稿">
                                  </div>
                                </div>
                              </div>
                        </div>

                </div>



              <div class="right-content">
              </div>
        </div>

    </main>
<!-- 以上、main----------------------------------------------- -->

<!-- 以下、footer ----------------------------------------->
<footer>
    <p>@G's Academy TOKYO Lab10_Hooters</p>
</footer>
<!-- 以上、footer ----------------------------------------->


<script src="{{ asset('js/url.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('js/article.js') }}"></script>
<script src="{{ asset('js/header.js') }}"></script>
</body>
</html>