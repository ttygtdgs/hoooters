//業態の選択
const gyos = document.querySelectorAll('.gyo-btn');

gyos.forEach(function (gyo){
  gyo.addEventListener('click', () => {
    document.querySelectorAll('.act')[0].classList.remove('act');
    const gyoid = Array.from(gyos).indexOf(gyo)+1;
    document.getElementById('gid').value=gyoid;
    gyo.classList.add('act');
  });
});



//企業登録モーダル
const modalback = document.querySelector('.csearch-wrapper');
const c_modal = document.querySelector('.csearch-modal');
const add_modal = document.querySelector('.cadd-modal');
const loading = document.querySelector('.loading-wrapper');

//全モーダル削除
function modal_remove(){
  modalback.classList.add('none');
  modalback.classList.remove('fadein');
  add_modal.classList.add('none');
  add_modal.classList.remove('fadein');
  c_modal.classList.add('none');
  c_modal.classList.remove('fadein');
  document.getElementById('cname').value = "";
  document.getElementById('curl').value = "";
}

//モーダル出現
function modal_add(idname){
  idname.classList.remove('none');
  idname.classList.add('fadein');
}

document.getElementById('csearch-btn').addEventListener('click',function(){
  modal_add(modalback);
  modal_add(c_modal);
});

document.getElementById('cchange-btn').addEventListener('click',function(){
  modal_add(modalback);
  modal_add(c_modal);
});


document.querySelector('.csearch-modal-wrapper').addEventListener('click', (e) => {
  if(!e.target.closest('.csearch-modal') && !e.target.closest('.cadd-modal')) {
    modal_remove();
  } else {
    return;
  }
});

document.getElementById('cadd-btn').addEventListener('click',function(){
  modal_add(add_modal);
  c_modal.classList.add('none');
  c_modal.classList.remove('fadein');
});


//企業登録
document.getElementById('cadd-submit').addEventListener('click',function(){
  const cname = document.getElementById('cname').value;
  const curl = document.getElementById('curl').value;

  if(cname=="" || curl==""){
    alert('未入力箇所があります');
    return;
  }

  // loading.classList.remove('none');

  const params = new FormData();
  params.append('cname',cname);
  params.append('curl',curl);

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  //非同期通信でcorpへpost
  fetch('http://localhost/hoooters/public/corp',{
    headers: {'X-CSRF-TOKEN': token},
    method: 'POST',
    cache: 'no-cache',
    body: params
  }).then((response) => {
    // loading.classList.add('none');
    return response.json(); // あるいは response.blob()
  }).then(function(res){
    if(confirm(res+'を記事に反映しますか？')){
      document.getElementById('cname-box').textContent = res;
      document.getElementById('cchange-btn').classList.remove('none');
      document.getElementById('cname-box').classList.remove('none');
      document.getElementById('csearch-btn').classList.add('none');
      modal_remove();
    }else{
      alert(res+'を登録しました！');
      modal_remove();
    }

  }).catch(function(error){
    console.log(error);
  });

});