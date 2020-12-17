

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hooters</title>
    
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
<header></header>

<!-- 以下、main---------------------- -->
<main class="py-4">
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">プロフィールを編集</div>

                    <div class="card-body">
                        <form action="{{ url('/profile') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}

                            <input type="hidden" name='id' value="{{Auth::user()->id}}" class="form-control" >

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{Auth::user()->name}}"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{Auth::user()->email}}"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="intro" class="col-md-4 col-form-label text-md-right">自己紹介</label>
                                <div class="col-md-6">
                                    <!-- <input type="text" name="intro" value="{{Auth::user()->intro}}"   class="form-control input-lg" placeholder="100文字以内"> -->
                                    <textarea class="form-control" rows="5" name="intro" value="" placeholder="100文字以内" maxlength="100">{{Auth::user()->intro}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="site" class="col-md-4 col-form-label text-md-right">Githubページ</label>
                                <div class="col-md-6">
                                    <input type="url" name="site" value="{{Auth::user()->site}}"  class="form-control" placeholder="GithubページURL">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tsite" class="col-md-4 col-form-label text-md-right">Twitterページ</label>
                                <div class="col-md-6">
                                    <input type="url" name="tsite" value="{{Auth::user()->tsite}}"  class="form-control" placeholder="TwitterページURL">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fsite" class="col-md-4 col-form-label text-md-right">Facebookページ</label>
                                <div class="col-md-6">
                                    <input type="url" name="fsite" value="{{Auth::user()->fsite}}"  class="form-control" placeholder="FacebookページURL">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icon" class="col-md-4 col-form-label text-md-right">アイコン</label>
                                <div class="col-md-6">
                                    <input type="file" name="icon" value="{{Auth::user()->icon}}"  >
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- 以上、main---------------------- -->

<footer></footer>



</body>
</html>







