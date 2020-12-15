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