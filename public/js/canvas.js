// //親
// const parent = document.querySelector('.canvas-box');

// //キャンバス
// const can = document.getElementById('can');
// const ctx = can.getContext('2d');

// //キャンバスサイズ
// const c_width = parent.clientWidth; //max700
// const c_height = parent.clientHeight; //max525
// can.setAttribute('width',c_width);
// can.setAttribute('height',c_height);

// //画像素材
// const items = ['./pic/1.png','./pic/2.png','./pic/3.png','./pic/4.png','./pic/5.png',];

// const images = [];
// for (let i = 0; i<items.length; i++) {
//   images[i] = new Image();
//   images[i].src = items[i];
// }

// //サイズ指定
// // images[0]["w"] = 105;
// // images[0]["h"] = 189;
// // images[1]["w"] = 108;
// // images[1]["h"] = 190;
// // images[2]["w"] = 171;
// // images[2]["h"] = 11;
// // images[3]["w"] = 47;
// // images[3]["h"] = 50;
// // images[4]["w"] = 56;
// // images[4]["h"] = 56;

// function dropitem(iconclass,img){
//   document.querySelector(iconclass).addEventListener('click',function(){
//     ctx.drawImage(img,0,0);
//   });
// }

// dropitem('.fa-user', images[0]);
// dropitem('.fa-building', images[1]);
// dropitem('.fa-arrow-up', images[2]);
// dropitem('.fa-yen-sign', images[3]);
// dropitem('.fa-circle', images[4]);


// function onDown ( e ) {
//   var x = e.pageX,
//       y = e.pageY;

//   x -= can.offsetLeft;
//   y -= can.offsetTop;
// }

// function onUp () {

// }

// can.addEventListener( "mousedown", onDown, false );
// can.addEventListener( "mouseup", onUp, false );


// //ドラッグフラグ
// let dragging = false;
// // ドラッグ開始位置
// let start = {
//   x: 0,
//   y: 0
// };
// // ドラッグ中の位置
// let diff = {
//   x: 0,
//   y: 0
// };
// // ドラッグ終了後の位置
// let end = {
//   x: 0,
//   y: 0
// }

// can.addEventListener('click',function(e){
//   //クリック座標を取得
//   const rect = can.getBoundingClientRect();
//   //キャンバス内の座標を取得
//   const point = {
//     x: e.clientX - rect.left,
//     y: e.clientY - rect.top
//   };




// });

// const redraw = (img) => {
//   ctx.clearRect(0, 0, can.width, can.height);
//   ctx.drawImage(img, diff.x, diff.y)
// };
// can.addEventListener('mousedown', event => {
//   dragging = true;
//   start.x = event.clientX;
//   start.y = event.clientY;
// });
// can.addEventListener('mousemove', event => {
//   if (dragging) {
//     diff.x = (event.clientX - start.x) + end.x;
//     diff.y = (event.clientY - start.y) + end.y;
//     redraw();
//   }
// });
// can.addEventListener('mouseup', event => {
//   dragging = false;
//   end.x = diff.x;
//   end.y = diff.y;
// });



// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
const field = document.querySelector('.canvas-box');

const imenu_items = document.querySelectorAll('.imenu-item');
imenu_items.forEach(imenu_item => {
  imenu_item.addEventListener('click',function(e){
    const index = Array.from(imenu_items).indexOf(imenu_item);
    let item = document.createElement('div');
    item.className = 'canvas-item';
    item.innerHTML = '<img src="pic/'+index+'.png" class="0">';
    field.appendChild(item);
    itemmoves();
  });
});


function itemmoves(){
  const canvas_items = document.querySelectorAll('.canvas-item');
  canvas_items.forEach(canvas_item => {
    canvas_item.onmousedown = function(e){
      canvas_item.style.zIndex = 1000;
      //canvas-boxの座標を取得
      const clientRect = field.getBoundingClientRect();
      const divY = clientRect.top;
      const divX = clientRect.left;
      const divW = clientRect.right;
      const divH = clientRect.bottom;
      //カーソルの座標をmoveAtに渡す
      moveAt(e.pageX-divX, e.pageY-divY);

      // ボールを（pageX、pageY）座標の中心に置く
      function moveAt(x, y) {
        canvas_item.style.left = x - canvas_item.offsetWidth / 2 + 'px';
        canvas_item.style.top = y - canvas_item.offsetHeight / 2 + 'px';
      }

      function onMouseMove(e) {
        moveAt(e.pageX-divX, e.pageY-divY);
      }

      // if(e.pageX-divX > divW-canvas_item.offsetWidth/2 || e.pageY-divH > canvas_item.offsetHeight/2){
      //   document.removeEventListener('mousemove', onMouseMove);
      //   canvas_item.onmouseup = null;
      // }

      // mousemove でボールを移動する
      document.addEventListener('mousemove', onMouseMove);

      // ボールをドロップする。不要なハンドラを削除する
      canvas_item.onmouseup = function() {
        document.removeEventListener('mousemove', onMouseMove);
        canvas_item.onmouseup = null;
      };

      canvas_item.ondragstart = function() {
        return false;
      };
    }
  });
};