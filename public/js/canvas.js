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
      canvas_item.classList.add('active');
      // ボールを（pageX、pageY）座標の中心に置く
      function moveAt(x, y) {
        canvas_item.style.left = x - canvas_item.offsetWidth / 2 + 'px';
        canvas_item.style.top = y - canvas_item.offsetHeight / 2 + 'px';
      }

      function onMouseMove(e) {
        canvas_item.style.zIndex = 9;
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
        canvas_item.style.zIndex = 0;
      };

      canvas_item.addEventListener('click',function(){
        document.removeEventListener('mousemove', onMouseMove);
        canvas_item.classList.remove('active');
      });

      field.addEventListener('click',function(){
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
  font.innerHTML = '<textarea class="textcontent" readonly disabled>テキスト</textarea>';
  font.style.top = '10px';
  font.style.left = '10px';
  field.appendChild(font);
  itemmoves();
  textchange();
});

//文字変更
function textchange(){
  const textcontents = document.querySelectorAll('.textcontent');
  textcontents.forEach(textcontent=>{
    textcontent.addEventListener('change',function(){
      const content = textcontent.value;
      textcontent.textContent = content;
    });
  })
}

const gyo_btns = document.querySelectorAll('.gyo-btn');
const canvas_box = document.querySelector('.canvas-box');
gyo_btns.forEach(gyo_btn => {
  gyo_btn.addEventListener('click',function(){
    const id = gyo_btn.getAttribute('id');
    switch(id){
      case 'new':
        canvas_box.innerHTML = '<div class="canvas-item" style="top: 176.609px; left: 594px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 174.609px; left: 529.5px; z-index: 1000;"><img src="./pic/0.png" class="iconimg"></div><div class="canvas-item" style="top: 173.609px; left: 303.5px; z-index: 1000;"><img src="./pic/8.png" class="iconimg"></div><div class="canvas-item" style="top: 175.609px; left: 80px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 201.609px; left: 150px; z-index: 1000;"><img src="./pic/3.png" class="iconimg"></div><div class="canvas-item" style="top: 205.609px; left: 384px; z-index: 1000;"><img src="./pic/3.png" class="iconimg"></div><div class="canvas-item" style="top: 237.609px; left: 152px; z-index: 1000;"><img src="./pic/5.png" class="iconimg"></div><div class="canvas-item" style="top: 243.609px; left: 385px; z-index: 1000;"><img src="./pic/5.png" class="iconimg"></div><div class="canvas-item" style="top: 234.109px; left: 428.5px; z-index: 1000;"><img src="./pic/6.png" class="iconimg"></div><div class="canvas-item" style="top: 186.109px; left: 423.5px; z-index: 1000;"><img src="./pic/7.png" class="iconimg"></div><div class="canvas-item" style="top: 222.109px; left: 191.5px; z-index: 1000;"><img src="./pic/6.png" class="iconimg"></div><div class="canvas-item cantext" style="top: 292.109px; left: 233px; z-index: 1000;"><textarea class="textcontent" readonly disabled>IT技術を用いた\n新規事業</textarea></div><div class="canvas-item cantext" style="top: 289.109px; left: 8px; z-index: 1000;"><textarea class="textcontent" readonly disabled>自社</textarea></div><div class="canvas-item cantext" style="top: 291.109px; left: 491px; z-index: 1000;"><textarea class="textcontent" readonly disabled>カスタマー</textarea></div><div class="canvas-item cantext" style="top: 263.109px; left: 111px; z-index: 1000;"><textarea class="textcontent" readonly disabled>売上</textarea></div><div class="canvas-item cantext" style="top: 272.109px; left: 347px; z-index: 1000;"><textarea class="textcontent" readonly disabled>利用料</textarea></div><div class="canvas-item cantext" style="top: 151.109px; left: 346px; z-index: 1000;"><textarea class="textcontent" readonly disabled>サービス</textarea></div><div class="canvas-item cantext" style="top: 149.109px; left: 109px; z-index: 1000;"><textarea class="textcontent" readonly disabled>予算・人材\n自社の強み</textarea></div>';
        itemmoves();
        textchange();
        break;
      case 'webservice':
        canvas_box.innerHTML = '<div class="canvas-item" style="top: 177.609px; left: 528px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 177.609px; left: 456.5px; z-index: 1000;"><img src="./pic/0.png" class="iconimg"></div><div class="canvas-item" style="top: 178.609px; left: 159.5px; z-index: 1000;"><img src="./pic/8.png" class="iconimg"></div><div class="canvas-item" style="top: 206.609px; left: 285px; z-index: 1000;"><img src="./pic/3.png" class="iconimg"></div><div class="canvas-item" style="top: 257.609px; left: 283px; z-index: 1000;"><img src="./pic/5.png" class="iconimg"></div><div class="canvas-item" style="top: 242.109px; left: 329.5px; z-index: 1000;"><img src="./pic/6.png" class="iconimg"></div><div class="canvas-item" style="top: 187.109px; left: 325.5px; z-index: 1000;"><img src="./pic/7.png" class="iconimg"></div><div class="canvas-item cantext" style="top: 290.109px; left: 87px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">自社サービス</textarea></div><div class="canvas-item cantext" style="top: 290.109px; left: 420px; z-index: 1000;"><textarea class="textcontent">ユーザー</textarea></div><div class="canvas-item cantext" style="top: 279.109px; left: 248px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">利用料</textarea></div><div class="canvas-item cantext" style="top: 159.109px; left: 250px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">サービス</textarea></div>';
        itemmoves();
        textchange();
        break;
      case 'production':
        canvas_box.innerHTML = '<div class="canvas-item" style="top: 98.6094px; left: 536px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 95.6094px; left: 468.5px; z-index: 1000;"><img src="./pic/0.png" class="iconimg"></div><div class="canvas-item" style="top: 131.609px; left: 308px; z-index: 1000;"><img src="./pic/3.png" class="iconimg"></div><div class="canvas-item" style="top: 173.609px; left: 309px; z-index: 1000;"><img src="./pic/5.png" class="iconimg"></div><div class="canvas-item" style="top: 160.109px; left: 350.5px; z-index: 1000;"><img src="./pic/6.png" class="iconimg"></div><div class="canvas-item" style="top: 113.109px; left: 346.5px; z-index: 1000;"><img src="./pic/7.png" class="iconimg"></div><div class="canvas-item cantext" style="top: 209.109px; left: 140px; z-index: 1000;"><textarea class="textcontent">顧客</textarea></div><div class="canvas-item cantext" style="top: 207.109px; left: 431px; z-index: 1000;"><textarea class="textcontent">ユーザー</textarea></div><div class="canvas-item cantext" style="top: 199.109px; left: 270px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">利用料</textarea></div><div class="canvas-item cantext" style="top: 76.1094px; left: 272px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">サービス</textarea></div><div class="canvas-item" style="top: 100.609px; left: 211px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 381.609px; left: 212px; z-index: 1000;"><img src="./pic/1.png" class="iconimg"></div><div class="canvas-item" style="top: 245.609px; left: 216px; z-index: 1000;"><img src="./pic/2.png" class="iconimg"></div><div class="canvas-item" style="top: 246.609px; left: 256px; z-index: 1000;"><img src="./pic/4.png" class="iconimg"></div><div class="canvas-item" style="top: 292.109px; left: 242.5px; z-index: 1000;"><img src="./pic/6.png" class="iconimg"></div><div class="canvas-item" style="top: 290.109px; left: 195.5px; z-index: 1000;"><img src="./pic/7.png" class="iconimg"></div><div class="canvas-item cantext" style="top: 302.109px; left: 226px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">開発依頼</textarea></div><div class="canvas-item cantext" style="top: 300.109px; left: 52px; z-index: 1000;"><textarea class="textcontent" readonly="" disabled="">技術提供</textarea></div><div class="canvas-item cantext" style="top: 486.109px; left: 142px; z-index: 1000;"><textarea class="textcontent">自社</textarea></div>';
        itemmoves();
        textchange();
        break;
      case 'marketing':
        canvas_box.innerHTML = '';
        itemmoves();
        textchange();
        break;
      case 'other':
        canvas_box.innerHTML = '';
        itemmoves();
        textchange();
        break;
      case 'sier':
        canvas_box.innerHTML = '';
        itemmoves();
        textchange();
        break;
    }
  });
})

