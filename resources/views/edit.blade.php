<!-- 投稿・編集ページ -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <title>投稿・編集</title>
</head>
<body>
  <header style="width: 100vw; height: 7vh; background-color: red"></header>
  <div class="container">
    <form action="#">
      <!-- タイトル---------------------------------->
      <div class="title-wrapper">
        <!-- 会社名 -->
        <div class="cname-wrapper">
          <div class="clabel">企業名</div>
          <button id="csearch-btn" type="button">企業を選ぶ</button>
          <div class="cname"></div>
          <!-- cid -->
          <input type="hidden" name="cid">
        </div>

        <!-- 業態 -->
        <div class="gyo-wrapper">
          <div class="glabel">業態</div>
          <div class="gselect-wrapper">
            <select name="gid" id="gid"></select>
          </div>
        </div>
        <div class="service-wrapper">
          <div class="slabel">事業名</div>
          <div class="service-name">
            <input type="text" name="service">
          </div>
          <div class="service-detail">
            <input type="text" name="s_text">
          </div>
        </div>
      </div>
      <!-- 内容 --------------------------------------->
      <div class="content-wrapper">
        <div class="image-wrapper"></div>
        <div class="comment-wrapper"></div>
      </div>

      <!-- 送信ボタン -->
      <div class="btn-wrapper"></div>
    </form>
      <!-- ヘルプボタン -->
    <div class="help-wrapper"></div>
      <!-- 会社検索モーダル -->
    <div class="csearch-wrapper"></div>
  </div>
</body>
</html>