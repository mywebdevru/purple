function rotateMain(value) {
    let wheelInner = document.querySelectorAll('.wheel__inner');
    deg = 0;
    for (let item of wheelInner) {
      item.style.transform = `rotate(${deg}deg)`
      deg += value;
    }
    return value
}
rotateMain(10);
  
function rotateOuther(value) {
    let wheelContent = document.querySelectorAll('.wheel__content');
    deg = 0;
    for (let item of wheelContent) {
      item.style.transform = `rotate(${deg}deg)`
      deg += value;
    }
}
rotateOuther(12)