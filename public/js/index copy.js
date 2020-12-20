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


//メニューバーの処理
const menus = document.querySelectorAll('.menu-item');
menus.forEach(menu=>{
  menu.addEventListener('click',function(){
    //actmenuクラス削除→クリックした要素にactmenuクラス追加
    document.querySelector('.actmenu').classList.remove('actmenu');
    menu.classList.add('actmenu');

    //right-title追加
    const children = menu.children;
    let icon,theme;
    for(let i = 0; i<children.length; i++){
      const child = children[i];
      if(child.classList.contains('fas')){
        icon = child.classList.value;
      }

      if(child.classList.contains('list-name')){
        theme = child.textContent;
      }
    }
    document.getElementById('right-title-icon').setAttribute('class',icon);
    document.getElementById('right-theme').textContent = theme;
  });
});


//業態リスト
let count = 0;
document.getElementById('gyo-btn').addEventListener('click',function(){
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
