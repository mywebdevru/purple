function rotateMainRed(value) {
    let wheelInnerRed = document.querySelectorAll('.wheel__inner__red');
    deg = 100;
    for (let item of wheelInnerRed) {
      item.style.transform = `rotate(${deg}deg)`;
      item.style.color = 'red';
      deg += value;
    }
    return value
    }
rotateMainRed(10);

function rotateMainGreen(value) {
    let wheelInnerGreen = document.querySelectorAll('.wheel__inner__green');
    deg = -121;
    for (let item of wheelInnerGreen) {
      item.style.transform = `rotate(${deg}deg)`;
      item.style.color = 'green';
      deg += value;
    }
    return value
    }
rotateMainGreen(10);

function rotateMainYellow(value) {
    let wheelInnerYellow = document.querySelectorAll('.wheel__inner__yellow');
    deg = -111;
    for (let item of wheelInnerYellow) {
      item.style.transform = `rotate(${deg}deg)`;
      item.style.color = 'black';
      deg += value;
    }
    return value
    }
rotateMainYellow(10);
  
function rotateOutherRed(value) {
    let wheelContentRed = document.querySelectorAll('.wheel__content__red');
    deg = 0;
    for (let item of wheelContentRed) {
      item.style.transform = `rotate(${deg}deg)`
      deg += value;
    }
}
rotateOutherRed(14);

function rotateOutherGreen(value) {
    let wheelContentGreen = document.querySelectorAll('.wheel__content__green');
    deg = 0;
    for (let item of wheelContentGreen) {
      item.style.transform = `rotate(${deg}deg)`
      deg += value;
    }
}
rotateOutherGreen(14);

function rotateOutherYellow(value) {
    let wheelContentYellow = document.querySelectorAll('.wheel__content__yellow');
    deg = 0;
    for (let item of wheelContentYellow) {
      item.style.transform = `rotate(${deg}deg)`
      deg += value;
    }
}
rotateOutherYellow(14);

function changeItemRed() {
  document.querySelector('.wheel__red').style.backgroundColor = 'antiquewhite';
  document.querySelector('.wheel__red').style.transition = '0.5s';
  document.querySelectorAll('.wheel__inner__red')[0].style.opacity = '1';
  document.querySelectorAll('.wheel__inner__red')[0].style.transform = 'rotate(-79deg)';
  document.querySelectorAll('.wheel__inner__red')[0].style.transition = 'all 2s ease-in-out';
}
function rechangeItemRed() {
  document.querySelector('.wheel__red').style.backgroundColor = 'unset';
  document.querySelectorAll('.wheel__inner__red')[0].style.opacity = '0';
}

function changeItemGreen() {
  document.querySelector('.wheel__green').style.backgroundColor = '#c7fcda';
  document.querySelector('.wheel__green').style.transition = '0.5s';
  document.querySelectorAll('.wheel__inner__green')[0].style.opacity = '1';
  document.querySelectorAll('.wheel__inner__green')[0].style.transform = 'rotate(-79deg)';
  document.querySelectorAll('.wheel__inner__green')[0].style.transition = 'all 2s ease-in-out';
}
function rechangeItemGreen() {
  document.querySelector('.wheel__green').style.backgroundColor = 'unset';
  document.querySelectorAll('.wheel__inner__green')[0].style.opacity = '0';
}

function changeItemYellow() {
  document.querySelector('.wheel__yellow').style.backgroundColor = '#fcf8d1';
  document.querySelector('.wheel__yellow').style.transition = '0.5s';
  document.querySelectorAll('.wheel__inner__yellow')[0].style.opacity = '1';
  document.querySelectorAll('.wheel__inner__yellow')[0].style.transform = 'rotate(-79deg)';
  document.querySelectorAll('.wheel__inner__yellow')[0].style.transition = 'all 2s ease-in-out';
}
function rechangeItemYellow() {
  document.querySelector('.wheel__yellow').style.backgroundColor = 'unset';
  document.querySelectorAll('.wheel__inner__yellow')[0].style.opacity = '0';
}

$(document).ready(function(){
    if ($(window).width() <= 768){
        $('.wheel').contents().unwrap();
        $('.wheel__inner__red').remove();
        $('.wheel__inner__green').remove();
        $('.wheel__inner__yellow').remove();
    }
});