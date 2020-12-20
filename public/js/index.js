$(function ()
{
  
    $('#btn').on('click', function ()
    {
        console.log("footers");
      //  confirm('検索するよ？');
        var key = $('#key').val(); //検索ワードを取得
        console.log(key);

        // 空欄だったらそのまま
        if(!key){
          return false;
        };

        // axios.get('/kensaku')
        //   .then(function (response) {
        //       // handle success
        //     console.log(response);
        //   })
        //   .catch(function (error) {
        //       // handle error
        //     console.log(error);
        //   })
        //   .finally(function () {
        //       // always executed
        //   });


      
        $.ajax({
          type: 'get',
          url: 'kensaku' , //web.phpのURLと同じ形にする
          data: {'key' : key},

          // dataType:'json',
        }).done(function(data){
          //alert('ajax成功');
          // $('#text').html(results);
          // console.log()
          console.log(data);

        }).fail(function(){
            alert('ajax失敗');
        });
    })
  });
