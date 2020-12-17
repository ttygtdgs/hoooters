//親
const parent = document.querySelector('.canvas-box');

//キャンバス
const can = document.getElementById('can');
const ctx = can.getContext('2d');

//キャンバスサイズ
const c_width = parent.clientWidth; //max700
const c_height = parent.clientHeight; //max525
can.setAttribute('width',c_width);
can.setAttribute('height',c_height);

//画像素材
const items = ['./pic/1.png','./pic/2.png','./pic/3.png','./pic/4.png','./pic/5.png',];

const images = [];
for (let i = 0; i<items.length; i++) {
  images[i] = new Image();
  images[i].src = items[i];
}

function dropitem(iconclass,img){
  document.querySelector(iconclass).addEventListener('click',function(){
    ctx.drawImage(img,0,0);
  });
}

dropitem('.fa-user', images[0]);
dropitem('.fa-building', images[1]);
dropitem('.fa-arrow-up', images[2]);
dropitem('.fa-yen-sign', images[3]);
dropitem('.fa-circle', images[4]);

//ドラッグフラグ
let dragging = false;
// ドラッグ開始位置
let start = {
  x: 0,
  y: 0
};
// ドラッグ中の位置
let diff = {
  x: 0,
  y: 0
};
// ドラッグ終了後の位置
let end = {
  x: 0,
  y: 0
}

const redraw = () => {
  ctx.clearRect(0, 0, can.width, can.height);
  ctx.drawImage(img, diff.x, diff.y)
};
canvas.addEventListener('mousedown', event => {
  isDragging = true;
  start.x = event.clientX;
  start.y = event.clientY;
});
canvas.addEventListener('mousemove', event => {
  if (isDragging) {
    diff.x = (event.clientX - start.x) + end.x;
    diff.y = (event.clientY - start.y) + end.y;
    redraw();
  }
});
canvas.addEventListener('mouseup', event => {
  isDragging = false;
  end.x = diff.x;
  end.y = diff.y;
});

function onDown(e) {
  // キャンバスの左上端の座標を取得
  const offsetX = canvas.getBoundingClientRect().left;
  const offsetY = canvas.getBoundingClientRect().top;

  // マウスが押された座標を取得
  x = e.clientX - offsetX;
  y = e.clientY - offsetY;

  // オブジェクト上の座標かどうかを判定
  if (objX < x && (objX + objWidth) > x && objY < y && (objY + objHeight) > y) {
    dragging = true; // ドラッグ開始
    relX = objX - x;
    relY = objY - y;
  }
}