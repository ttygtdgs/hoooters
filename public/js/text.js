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
            console.log(id);
            console.log(aid);
            console.log(txt);
            //console.log(txtbtn);
      
        $.ajax({
            headers: {
                // csrf対策、「article.blade.php」のheadにcsrf対策のmetaタグも追記
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
            },
            url: 'http://localhost/hoooters/public/text',  //route.phpで指定したコントローラーのメソッドURLを指定
            type: 'POST',   //GETかPOSTメソットを選択
            data: { 'id': id, 'aid': aid, 'txt': txt,}, //コントローラーに送るに名称をつけてデータを指定
                })
            //正常にコントローラーの処理が完了した場合
            .done(function (data) //コントローラーからのリターンされた値(like_product、つまりクリックした時の状態)をdataとして指定
            {
                // 確認用
                // console.log(data);
                // console.log(data[0].icon);

                //①コメント覧の対応
                    // コメントがない場合のhtmlを消去
                    $('#comme3').remove();
            
                    //挿入するhtmlを作成
                    let html = '<li><div class="comme1">';
                    html += '<div class="comme1_1">';
                    html +='<div><img src="http://localhost/hoooters/public/'+data[0].icon+'" alt=""></div>';
                    html +='<div>＠'+data[0].name+'</div>';
                    html +='</div>';
                    html +='<div class="comme1_2">'+data[0].textscreated_at+'に投稿</div>';
                    html +='</div>';
                    html +='<br>';
                    html +='<div class="comme2">'+data[0].txt+'</div></li>';
                    // console.log(html);
                    //console.log(data.icon);
                    
                    //htmlを挿入
                    $(newtext).append(html);

                    // 入力フォームのデータを空にする
                    $('#txt').val("");

                //②コメント数の対応
                $('.like-num2').html(data[1].length);
                
                // ajax成功アラート
                // alert('コメント投稿成功')
            })
            ////正常に処理が完了しなかった場合
            .fail(function (data)
            {
                alert('コメント投稿処理失敗');
                // alert(JSON.stringify(data));
            });
        
    });
});