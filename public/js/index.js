//フリーワード検索
$('#key').on('keydown', function(e)
{
  if(e.key === 'Enter'){
      const key = $('#key').val(); //検索ワードを取得
      console.log(key);

      // 空欄だったらそのまま
      if(key==""){
        return false;
      };

      ajax('search',key);

      $('#key').val("");
      $('#key').blur();
      $('#key').attr('placeholder','キーワードを入力');
}});

//メニュー検索
$('.menu-item').on('click',function(){
  const id = $(this).attr('id');
  console.log(id);
  if(id=='gyo-btn'){
    return false;
  }
  ajax(id);
});

//起動時タイムライン表示
$(window).on('load',function(){
  ajax('timeline');
});

//ajax関数
function ajax(id,key){
  $.ajax({
    type: 'get',
    url: 'http://localhost/hoooters/public/kensaku' , //web.phpのURLと同じ形にする
    data: {'id':id,'key' : key},
  }).done(function(data){
    $('.tab-wrap').children().remove();
      console.log(data);

      let html;

      for(let i=0; i<data.length; i++){
        html =  '<li class="feed">' +
                '<div class="feed-left">'+
                    '<a href="#" class="kigyo-name">'+data[i]['cname']+'</a>'+
                    '<p class="jigyo">'+data[i]['service']+'</p>'+
                    '<div class="gyoicon" id="gyoid'+data[i]['gid']+'">'+data[i]['gname']+'</div>'+
                    '<div class="kigyo-comme">'+data[i]['jcomme']+'</div></div>'+

                '<div class="feed-right">'+
                    '<img src="'+data[i]['art_img']+'" class="feed-pict">'+
                '</div>'+

                '<div class="feed-bottom">'+
                    '<div class="icon-img">'+
                        '<img src="'+data[i]['icon']+'"  class="float">'+
                    '</div>'+
                    '<p class="kigyo">@' +data[i]['name']+'が2020年12月25日に投稿'+'</p>'+
                '</div>'+
            '</li>'

                ;
        $('.tab-wrap').append(html);
      };


  }).fail(function(){
    alert('ajax失敗')
  });
}


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
