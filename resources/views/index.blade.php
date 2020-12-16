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
        
                    


                <!-- データを引っ張ってくる -->

                
                <div class="tab-wrap">
                    <input id="TAB-01" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-01">人気フィード</label>
                        <div class="tab-content">

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                                </div>
                            </div>

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
                                </div>
                            </div>

                            <div class="feed">                               
                                
                                <p class="corp"><span class="kigyo-name">株式会社サンリオ</span>　ハローキティ事業部　WEBマーケ</p>
                                
                                <img src="{{asset('/pic/example1.png')}}" class="feed-pict" alt=""> 
                                <p class="kigyo-comme">キティちゃん人形の拡販。きてぃーちゃんタイムズの運用。ああああああああああああああああああああああああああああ</p>

                                <div class="feed-bottom"><img src="{{asset('/pic/icon.png')}}"  class="float">
                                    <p class="kigyo"> @ふーたーずが2020年12月25日に投稿</p>
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


    
    </main>




    <footer>
        <p>Hootersのフッター</p>    
    </footer>



</div>

</body>
</html>