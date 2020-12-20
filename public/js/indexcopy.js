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