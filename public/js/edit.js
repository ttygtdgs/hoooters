const gyos = document.querySelectorAll('.gyo-btn');

gyos.forEach(function (gyo){
  gyo.addEventListener('click', () => {
    document.querySelectorAll('.act')[0].classList.remove('act');
    const gyoid = Array.from(gyos).indexOf(gyo)+1;
    console.log(gyoid);
    document.getElementById('gid').value=gyoid;
    gyo.classList.add('act');
  });
});


const modalback = document.querySelector('.csearch-wrapper');
const c_modal = document.querySelector('.csearch-modal');
const add_modal = document.querySelector('.cadd-modal');

document.getElementById('csearch-btn').addEventListener('click',function(){
  modalback.classList.remove('none');
  modalback.classList.add('fadein');
  c_modal.classList.remove('none');
  c_modal.classList.add('fadein');
});


document.querySelector('.csearch-modal-wrapper').addEventListener('click', (e) => {
  if(!e.target.closest('.csearch-modal') && !e.target.closest('.cadd-modal')) {
    modalback.classList.add('none');
    modalback.classList.remove('fadein');
    add_modal.classList.add('none');
    add_modal.classList.remove('fadein');
    c_modal.classList.add('none');
    c_modal.classList.remove('fadein');
  } else {
    return;
  }
});

document.getElementById('cadd-btn').addEventListener('click',function(){
  add_modal.classList.remove('none');
  add_modal.classList.add('fadein');
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

  const params = new FormData();
  params.append('cname',cname);
  params.append('curl',curl);

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  fetch('http://localhost/hoooters/public/corp',{
    headers: {'X-CSRF-TOKEN': token},
    method: 'POST',
    cache: 'no-cache',
    body: params
  }).then((response) => {
    return response.json(); // あるいは response.blob()
  }).then(function(res){
    console.log(res.data);

  }).catch(function(error){
    console.log(error);
  });

});