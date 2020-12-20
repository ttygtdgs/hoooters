$(function ()
{
    //「txtbtn」というidを持つタグがクリックされたときに以下の処理が走る
    $('#txtbtn').on('click', function ()
    {
        // 送られてきたデータの取得
        let id = $('#id').val();
        let aid = $('#aid').val();
        let txt = $('#txt').val();
        txtbtn = $(this);
            // 情報確認用
            // console.log(id);
            // console.log(aid);
            // console.log(txt);
            // console.log(txtbtn);
      
        $.ajax({
            headers: {
                // csrf対策、「article.blade.php」のheadにcsrf対策のmetaタグも追記
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
            },
            url: 'text',  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'id': id, 'aid': aid, 'txt': txt,}, //コントローラーに送るに名称をつけてデータを指定
                })
            //正常にコントローラーの処理が完了した場合
            .done(function (data) //コントローラーからのリターンされた値(like_product、つまりクリックした時の状態)をdataとして指定
            {
                // let html = '<div>'+data.icon+'</div>';
                // html += '<div>'+data.name+'</div>';
                // html += '<div>'+data.txt+'</div>';
                // html += '<div>'+data.textscreated_at+'</div>';
                // html += '<hr>';
                $('#comme3').remove();

                let html = '<li><div class="comme1">';
                html += '<div class="comme1_1">';
                html +='<div><img src="'+data.icon.slice(1)+'" alt=""></div>';
                html +='<div>＠'+data.name+'</div>';
                html +='</div>';
                html +='<div class="comme1_2">'+data.textscreated_at+'に投稿</div>';
                html +='</div>';
                html +='<br>';
                html +='<div class="comme2">'+data.txt+'</div></li>';
                 // console.log(html);
                 console.log(data.icon);
                
                 

                $(newtext).append(html);

                 // 入力フォームのデータを空にする
                $('#txt').val("");
                
                // ajax成功アラート
                // alert('コメント投稿成功')
            })
            ////正常に処理が完了しなかった場合
            .fail(function (data)
            {
                alert('コメント投稿処理失敗');
                alert(JSON.stringify(data));
            });
        
    });
});