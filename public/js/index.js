$(function ()
{
  
    $('#btn').on('click', function ()
    {
        console.log("footers");
      //  confirm('検索するよ？');
        var key = $('#key').val(); //検索ワードを取得
        console.log(key);

        if(!key){
          return false;
        };

        $.ajax({
          type: 'GET',
          url: 'kensaku' + key, //後述するweb.phpのURLと同じ形にする
          data: {
              'search_key': key, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
          },
          dataType: 'json', //json形式で受け取る

        beforeSend: function () {
          $('.loading').removeClass('display-none');
        } //通信中の処理をここで記載。今回はぐるぐるさせるためにcssでスタイルを消す。

        }).done(function (data){

 

})

}
)})
  