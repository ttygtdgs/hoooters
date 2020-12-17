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
  document.getElementById('csearch').value = "";
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

//通信トークン
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//企業検索リスト
const cresult = document.querySelector('.cresult');

//検索の関数
function csearch(key){
  const params = new FormData();
  params.append('keyword',key);

  //非同期通信でcorpへpost
  fetch('http://localhost/hoooters/public/csearch',{
    headers: {'X-CSRF-TOKEN': token},
    method: 'POST',
    cache: 'no-cache',
    body: params
  }).then((response) => {
    return response.json(); // あるいは response.blob()
  }).then(function(val){
    while(cresult.firstChild){
      cresult.removeChild(cresult.firstChild);
    }
    for(let i = 0; i<val.length; i++){
      const li = document.createElement("li");
      li.id = val[i]["cid"];
      li.className = 'citem';
      li.innerHTML = '<p>'+val[i]["cname"]+'</p><button type="button" class="choice-btn">選択</button>';
      cresult.appendChild(li);
      choice();
    }
  }).catch(function(error){
    console.log(error);
  });
}

//企業選択時の処理
function choice(){
  const c_btns = document.querySelectorAll('.choice-btn');
  c_btns.forEach(c_btn => {
    c_btn.addEventListener('click',function(){
      document.getElementById('cchange-btn').classList.remove('none');
      document.getElementById('cname-box').classList.remove('none');
      document.getElementById('csearch-btn').classList.add('none');
      document.getElementById('cname-box').textContent = c_btn.previousElementSibling.textContent;
      document.getElementById('cid').value = c_btn.parentNode.getAttribute('id');
      modal_remove();
    });
  });
}

//ロード時に企業全件取得
window.addEventListener('load',function(){
  csearch('null');
})

//企業検索
document.getElementById('csearch').addEventListener('input',function(){
  const keyword = document.getElementById('csearch').value;
  csearch(keyword);
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
      document.getElementById('cname-box').textContent = res["cname"];
      document.getElementById('cchange-btn').classList.remove('none');
      document.getElementById('cname-box').classList.remove('none');
      document.getElementById('csearch-btn').classList.add('none');
      document.getElementById('cid').value = res["cid"];
      modal_remove();
  }).catch(function(error){
    console.log(error);
  });

});