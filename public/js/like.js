$(function ()
{
    //「iine」というクラスを持つタグがクリックされたときに以下の処理が走る
    $('.iine').on('click', function ()
    {
        //表示しているaidといいねの状態、押したボタンの情報を取得
        aid = $(this).attr("aid");
        like_product = $(this).attr("like_product");
        click_button = $(this);

        $.ajax({
            headers: {
                // csrf対策、「article.blade.php」のheadにcsrf対策のmetaタグも追記
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
            },
            url: 'like_product',  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'aid': aid, 'like_product': like_product, }, //コントローラーに送るに名称をつけてデータを指定
                })
            //正常にコントローラーの処理が完了した場合
            .done(function (data) //コントローラーからのリターンされた値(like_product、つまりクリックした時の状態)をdataとして指定
            {
<<<<<<< HEAD
=======
                //console.log(data);
>>>>>>> main
                if ( data == 0 ) //like_product=0 いいね押してない状態
                {
                    //クリックしたタグをいいね押している状態（like_product=1）に変更
                    click_button.attr("like_product", "1");
                    //クリックしたタグの子の要素を変更(ハートをいいね状態に)
                    click_button.children().attr("class", "fas fa-heart fa-3x");
                }
                if ( data == 1 ) //like_product=1 いいね押しnない状態
                {
                    //クリックしたタグをいいね押してない状態（like_product=0）に変更
                    click_button.attr("like_product", "0");
                    //クリックしたタグの子の要素を変更(ハートをいいね押してない状態に)
                    click_button.children().attr("class", "far fa-heart fa-3x");
                }
            })
            ////正常に処理が完了しなかった場合
            .fail(function (data)
            {
                alert('いいね処理失敗');
                alert(JSON.stringify(data));
            });
    });
});