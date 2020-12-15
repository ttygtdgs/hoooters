<!-- 投稿・編集ページ -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/css/edit.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <title>投稿・編集</title>
</head>
<body>
  <header style="width: 100vw; height: 7vh; background-color:  rgb(113, 203, 241)">header</header>
  <div class="container">
    <form action="#">
      <!-- タイトル---------------------------------->
      <div class="title-wrapper">
        <div class="title-top">
          <div class="corp-wrapper">
            <!-- 会社名 -->
            <div class="company-wrapper">
              <div class="clabel tlabel">企業</div>
              <div class="cname-wrapper">
                <div id="csearch-btn" type="button">企業を選ぶ</div>
                <div class="cname"></div>
              </div>
              <!-- cid -->
              <input type="hidden" name="cid">
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
            <button type="submit" id="submit-btn">下書き</button>
            <button type="submit" id="submit-btn">投稿</button>
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
                  <li class="imenu-item"><i class="fas fa-user"></i></li>
                  <li class="imenu-item"><i class="fas fa-arrow-up"></i></li>
                  <li class="imenu-item"><i class="fas fa-yen-sign"></i></li>
                  <li class="imenu-item"><i class="fas fa-trash-alt"></i></li>
                </ul>
              </div>
            </div>
            <div class="image-content"></div>
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
              <textarea name="zcomme" id="zcomme" placeholder="給与条件や労働条件など、働き方に関する諸条件を入力してください。"></textarea>
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
            <li class="citem">
              <p>企業名</p>
              <button type="button">選択</button>
            </li>
            <li class="citem">
              <p>企業名</p>
              <button type="button">選択</button>
            </li>
            <li class="citem nullmesse">登録はありません</li>
          </ul>
          <div class="cmodal-bottom">
            <a id="cadd-btn" href="#">企業を登録</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- JS -->
<script src="{{ asset('js/edit.js') }}" defer></script>
</body>
</html>