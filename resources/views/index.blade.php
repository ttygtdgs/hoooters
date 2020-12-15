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
</head>
<body>

<div class="footerFixed">
    <header>Hootersのヘッダー</header>
  
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
                <div class="right-box">
                    
                
                <div class="tab-wrap">
                    <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">人気フィード</label>
                    <div class="tab-content">

                        <div class="feed">
                            <div class="feed-profile">
                                <div class="icon-image">
                                    <img src="." alt="">
                                </div>
                                <p class="title">tatsuya　2020/12/25</p>
                                <img src="" class="icon" alt="">
                            </div>
                            <h2>企業名</h2>
                            <div class="feed-pict">
                                <img src="" class="top-pict" alt="">ピクト図
                            </div>
                            <div class="feed-bottom">
                                like数取ってくる
                            </div>
                        </div>
                        <div class="feed">
                            <div class="feed-profile">
                                <p>tatsuya　2020/12/25</p>
                                <img src="" class="icon" alt="">
                            </div>
                            <h2>企業名</h2>
                            <div class="feed-pict">
                                <img src="" class="top-pict" alt="">ピクト図
                            </div>
                            <div class="feed-bottom">
                                like数取ってくる
                            </div>
                        </div>
                        <div class="feed">
                            <div class="feed-profile">
                                <p>tatsuya　2020/12/25</p>
                                <img src="" class="icon" alt="">
                            </div>
                            <h2>企業名</h2>
                            <div class="feed-pict">
                                <img src="" class="top-pict" alt="">ピクト図
                            </div>
                            <div class="feed-bottom">
                                like数取ってくる
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
        
        </div>


    
    </main>




    <footer>
        <p>Hootersのフッター</p>    
    </footer>



</div>

</body>
</html>