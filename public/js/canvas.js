const field = document.querySelector('.canvas-box');
//canvas-boxの座標を取得
const clientRect = field.getBoundingClientRect();
const divY = clientRect.top;
const divX = clientRect.left;
const divW = clientRect.right;
const divH = clientRect.bottom;
const centerX = (divW - divX)/2;
const centerY = (divH - divY)/2;

const imenu_items = document.querySelectorAll('.canicon');
imenu_items.forEach(imenu_item => {
  imenu_item.addEventListener('click',function(){
    const index = Array.from(imenu_items).indexOf(imenu_item);
    let item = document.createElement('div');
    item.className = 'canvas-item';
    item.innerHTML = '<img src="./pic/'+index+'.png" class="iconimg">';
    item.style.top = centerY/2 + 'px';
    item.style.left = centerX + 'px';
    field.appendChild(item);
    itemmoves();
  });
});


function itemmoves(){
  const canvas_items = document.querySelectorAll('.canvas-item');

  canvas_items.forEach(canvas_item => {
    canvas_item.onmousedown = function(){
      canvas_item.style.zIndex = 1000;
      canvas_item.classList.add('active');
      // ボールを（pageX、pageY）座標の中心に置く
      function moveAt(x, y) {
        canvas_item.style.left = x - canvas_item.offsetWidth / 2 + 'px';
        canvas_item.style.top = y - canvas_item.offsetHeight / 2 + 'px';
      }

      function onMouseMove(e) {
        moveAt(e.pageX-divX, e.pageY-divY);
        if(e.pageX < divX + canvas_item.offsetWidth/2 || e.pageY < divY + canvas_item.offsetHeight/2 || e.pageX > divW - canvas_item.offsetWidth/2 || e.pageY > divH - canvas_item.offsetHeight/2){
          canvas_item.onmouseup();
        }
      }

      // mousemove でボールを移動する
      document.addEventListener('mousemove', onMouseMove);

      // ボールをドロップする。不要なハンドラを削除する
      canvas_item.ondragstart = function() {
        return false;
      };

      canvas_item.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        canvas_item.classList.remove('active');
      };

      canvas_item.addEventListener('click',function(){
        document.removeEventListener('mousemove', onMouseMove);
        canvas_item.classList.remove('active');
      });
    }

    //ダブルクリックで選択
    canvas_item.addEventListener('dblclick',function(){
      if(canvas_item.classList.contains('cantext')){
        canvas_item.firstElementChild.readOnly = false;
        canvas_item.firstElementChild.disabled = false;
        canvas_item.firstElementChild.focus();
      }
      canvas_item.classList.add('active');
    })

    field.addEventListener('click',function(){
      document.removeEventListener('mousemove', onMouseMove);
      canvas_item.classList.remove('active');
    });

  });
};

//画面をクリックで選択解除
field.addEventListener('click', (e) => {
  if(!e.target.closest('.canvas-item')) {
    document.querySelectorAll('.canvas-item').forEach(item=>{
      item.onmouseup = null;
    });
    const actives = document.querySelectorAll('.active');
    actives.forEach(active=>{
      if(active.classList.contains('cantext')){
        active.firstElementChild.readOnly = true;
        active.firstElementChild.disabled = true;
      }
      active.classList.remove('active');
    });
  } else {
    return;
  }
});

//アイコン削除
document.querySelector('.fa-trash-alt').addEventListener('click',function(){
  const actives = document.querySelectorAll('.active');
    actives.forEach(active=>{
      active.remove();
    });
});

//文字
document.querySelector('.fa-font').addEventListener('click',function(){
  const font = document.createElement('div');
  font.className = 'canvas-item cantext';
  font.innerHTML = '<textarea readonly disabled>テキスト</textarea>';
  font.style.top = centerY/2 + 'px';
  font.style.left = centerX + 'px';
  field.appendChild(font);
  itemmoves();
});


