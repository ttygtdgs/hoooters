<!-- 投稿・編集ページ -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('/css/edit.css')}}">
  <title>投稿・編集</title>
</head>
<body>
  <header style="width: 100vw; height: 7vh; background-color: wheat">header</header>
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
                <input id="service" type="text" name="service" placeholder="事業やサービスの名前を入力してください">
              </div>
            </div>
          </div>
          <!-- 投稿 -->
          <div class="submit-wrapper">
            <button type="submit" id="submit-btn">投稿</button>
          </div>
        </div>
        <!-- 業態 -->
        <div class="gyo-wrapper">
          <div class="glabel">業態</div>
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
          <div class="image-wrapper"></div>
          <div class="comment-wrapper">
            <div class="jcomme-wrapper"></div>
            <div class="zcomme-wrapper"></div>
          </div>
        </div>
      </div>

      <!-- 送信ボタン -->
      <div class="btn-wrapper"></div>
    </form>
  </div>
      <!-- ヘルプボタン -->
    <div class="help-wrapper"></div>
      <!-- 会社検索モーダル -->
    <div class="csearch-wrapper"></div>

<!-- JS -->
<script src="{{ asset('js/edit.js') }}" defer></script>
</body>
</html>