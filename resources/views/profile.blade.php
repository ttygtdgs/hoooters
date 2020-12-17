


<main>
<form action="{{ url('/profile') }}" enctype="multipart/form-data" method="POST">
{{ csrf_field() }}

<input type="hidden" name='id' value="{{Auth::user()->id}}" >

<label for="name">ユーザー名</label>
<input type="text" name="name" value="{{Auth::user()->name}}" required>


<br>

<label for="email">メールアドレス</label>
<input type="email" name="email" value="{{Auth::user()->email}}" required>

<br>

<label for="intro">自己紹介</label>
<input type="text" name="intro" value="{{Auth::user()->intro}}" placeholder="100文字以内">

<br>

<label for="site">githubページ</label>
<input type="url" name="site" value="{{Auth::user()->site}}" placeholder="githubページ">

<br>

<label for="site">画像</label>
<input type="file" name="icon">

<br>

<button type="submit">
    更新
</button>



</form>

</main>