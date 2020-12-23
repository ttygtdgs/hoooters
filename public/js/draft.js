const delete_btns = document.querySelectorAll('.delete-btn');
delete_btns.forEach(delete_btn=>{
  delete_btn.addEventListener('click',function(){
    if(confirm('この記事を削除しますか？')){
      delete_btn.nextElementSibling[2].click();
    }else{
      return;
    }
  });
});