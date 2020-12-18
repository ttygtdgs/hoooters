<!-- 投稿・編集ページ -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/css/edit.css')}}">
  <link rel="stylesheet" href="{{asset('/css/canvas.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=2">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>投稿・編集</title>
</head>
<body>
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
          <form id='logout-form' action={{route('logout')}} method="POST" style="display: none;">
          {{ csrf_field() }}
          <!--  以上、ログアウト処理-->
          </form>
      </li>
    </ul>
  </nav>
</header>
  <div class="container">
    <form action="{{ url('/edit') }}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
      <!-- タイトル---------------------------------->
      <!-- uid -->
      <input type="hidden" name="uid" id="uid" value="1">
      <div class="title-wrapper">
        <div class="title-top">
          <div class="corp-wrapper">
            <!-- 会社名 -->
            <div class="company-wrapper">
              <div class="clabel tlabel">企業</div>
              <div class="cname-wrapper">
                <div id="csearch-btn" type="button"><i class="far fa-hand-point-right"></i>企業を選ぶ</div>
                <div id="cname-box" class="none"></div>
                <div id="cchange-btn" class="none">変更する</div>
              </div>
              <!-- cid -->
              <input type="hidden" name="cid" id="cid">
            </div>
            <!-- サービス -->
            <div class="service-wrapper">
              <div class="slabel tlabel">事業</div>
              <div class="service-name">
                <!-- service -->
                <input id="service" type="text" name="service" placeholder="事業やサービスの名前を入力してください。">
              </div>
            </div>
          </div>
          <!-- 投稿 -->
          <div class="submit-wrapper">
            <button type="button" class="submit-btn" id="draft">下書き</button>
            <button type="button" class="submit-btn" id="deploy">投稿</button>
            <input type="hidden" name="life_flg" id="life_flg" value="0">
            <button type="submit" class="none" id="submit"></button>
            <i class="fas fa-question-circle"></i>
          </div>
        </div>
        <!-- 業態 -->
        <div class="gyo-wrapper">
          <div class="glabel tlabel">業態</div>
          <div class="gselect-wrapper">
            <!-- gid -->
            <input name="gid" id="gid" type="range" min="1" max="6" value="1">
            <div class="gyo-btn act">新規事業</div>
            <div class="gyo-btn">Webサービス</div>
            <div class="gyo-btn">Webプロダクション</div>
            <div class="gyo-btn">Webマーケティング</div>
            <div class="gyo-btn">その他</div>
            <div class="gyo-btn">Sier系</div>
          </div>
        </div>
      </div>
      <!-- 内容 --------------------------------------->
      <div class="content-wrapper">
        <div class="main-wrapper">
          <div class="image-wrapper">
            <div class="image-top">
              <div class="ilabel tlabel">ピクト図</div>
              <div class="imenu-wrapper">
                <ul class="imenu">
                  <li class="imenu-item"><i class="fas fa-font"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-user"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-building"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-arrow-up"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-arrow-right"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-arrow-down"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-arrow-left"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-yen-sign"></i></li>
                  <li class="imenu-item canicon"><i class="fas fa-circle"></i></li>
                  <li class="imenu-item"><i class="fas fa-trash-alt"></i></li>
                </ul>
              </div>
            </div>
            <div class="image-content">
              <!-- キャンバス -->
              <div id="capture">
                <div class="canvas-box">
                </div>
              </div>
              <textarea type="text" name="art_img" id="art_img" class="none"></textarea>
              <input type="text" name="art_place" id="art_place" class="none">
            </div>
          </div>
          <div class="comment-wrapper">
            <div class="jcomme-wrapper">
              <div class="j-top">
                <div class="jlabel tlabel">コメント</div>
              </div>
              <textarea name="jcomme" id="jcomme" placeholder="サービスの具体的な内容や、企業の良い点・悪い点などを紹介してください。"></textarea>
            </div>
            <div class="zcomme-wrapper">
              <div class="z-top">
                <div class="zlabel tlabel">諸情報</div>
              </div>
              <textarea name="zcomme" id="zcomme" placeholder="給与条件や労働条件など、働き方に関する諸情報を入力してください。"></textarea>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

    <!-- ヘルプボタン -->
  <div class="help-wrapper"></div>
    <!-- 会社検索モーダル -->
  <div class="csearch-wrapper none">
    <div class="csearch-modal-wrapper">
      <div class="csearch-modal">
        <div class="cmodal-top">
          <i class="fas fa-search"></i>
          <input type="text" placeholder="企業名を検索" id="csearch">
        </div>
        <div class="cmodal-content">
          <ul class="cresult">
            <!-- 企業リスト -->
          </ul>
          <div class="cmodal-bottom">
            <div id="cadd-btn">新しく企業を登録</div>
          </div>
        </div>
      </div>
      <div class="cadd-modal none">
        <div class="cadd-box">
          <label class="tlabel cadd" for="cname">企業名</label>
          <input type="text" name="cname" id="cname">
        </div>
        <div class="cadd-box">
          <label class="tlabel cadd" for="curl">企業URL</label>
          <input type="text" name="curl" id="curl">
        </div>
        <button id="cadd-submit">登録</button>
      </div>
    </div>
  </div>



  <!-- <div class="loading-wrapper none">
    <div class="gif-wrapper">
      <img src="pic/loading.gif">
    </div>
  </div> -->

<!-- JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
<script src="{{ asset('js/html2canvas.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/canvas.js') }}"></script>
</body>
</html>