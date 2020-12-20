$('#key').on('keydown', function(e)
{
  if(e.key === 'Enter'){
      const key = $('#key').val(); //検索ワードを取得
      console.log(key);
      
      // 空欄だったらそのまま
      if(key==""){
        return false;
      };


      $.ajax({
        type: 'get',
        url: 'http://localhost/hoooters/public/kensaku' , //web.phpのURLと同じ形にする
        data: {'key' : key},
      }).done(function(data){

          console.log(data);

          let html = '';
        
          for(let i=0; i<data.length; i++){
            html =  '<li class="feed">' +
                    '<div class="feed-left">'+
                        '<p class="kigyo-name">'+data[i]['cname']+'</p>'+
                        '<p class="jigyo">'+data[i]['service']+'</p>'+
                        '<p class="jigyo">'+data[i]['gname']+'</p>'+
                        '<div class="kigyo-comme">'+data[i]['jcomme']+'<p class="jcomme">'+data[i]['zcomme']+'</p>'+'</div>'+
                    '</div>'+

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
            $('#futa').append(html);
          };
 

      }).fail(function(){
        alert('ajax失敗')
      
})
}})


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