$('#key').on('keydown', function(e)
{
  if(e.key === 'Enter'){
    //  confirm('検索するよ？');
      const key = $('#key').val(); //検索ワードを取得
      console.log(key);

      // 空欄だったらそのまま
      if(key==""){
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
        url: 'http://localhost/hoooters/public/kensaku' , //web.phpのURLと同じ形にする
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
    }
});


//業態リスト
let count = 0;
document.getElementById('gyo-btn').addEventListener('click',function(){
  console.log(count);
  switch(count%2){
    case 0:
      document.querySelector('.gyo-list').classList.add('act');
      count++;
      break;
      case 1:
      document.querySelector('.gyo-list').classList.remove('act');
      count++;
      break;
  }
});