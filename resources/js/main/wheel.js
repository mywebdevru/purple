function rotateMainRed(value) {
    let wheelInnerRed = document.querySelectorAll('.wheel__inner__red');
    deg = 100;
    for (let item of wheelInnerRed) {
      item.style.transform = `rotate(${deg}deg)`;
      item.style.color = 'rgb(73, 80, 87)';
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
      item.style.color = 'rgb(73, 80, 87)';
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
      item.style.color = 'rgb(73, 80, 87)';
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
  document.querySelectorAll('.wheel__inner__red')[0].style.transition = 'all 1s ease-in-out';
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
  document.querySelectorAll('.wheel__inner__green')[0].style.transition = 'all 1s ease-in-out';
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
  document.querySelectorAll('.wheel__inner__yellow')[0].style.transition = 'all 1s ease-in-out';
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

// Изменение цвета при нажатии на like и repost в фотогалереи
// todo перенести код в приемлемое место т.к. здесь скрипт отвечающий за кнопки ПОСТ / ФОТО / КАРТА

let btnPhotoGallery = document.getElementsByClassName('btn-for-gallery');


btnPhotoGallery[0].onclick = function() {

    document.getElementsByClassName('liked-photo')[0].style.fill = 'rgb(253, 41, 41)'
}

btnPhotoGallery[1].onclick = function() {
    document.getElementsByClassName('repost-photo')[0].style.fill = 'rgb(253, 41, 41)'
}


// Добавление комментарий

let comments = [];
loadComments();

document.getElementById('add-comment').onclick = function(){
    event.preventDefault();
    let commentElement = document.getElementById('text-comment');
    let comment = {
        body : commentElement.value,
        time : Math.floor(Date.now()/1000)
    }
    commentElement.value = '';
    comments.push(comment);
    console.log(comment);
    saveComments();
    showComments();
}

function saveComments() {
    localStorage.setItem('comments', JSON.stringify(comments));
}

function loadComments() {
    if (localStorage.getItem('comments')) comment = JSON.parse(localStorage.getItem('comments'));
    showComments();
}

function showComments() {
    let commentField = document.getElementById('modal-photo__comments');
    let out = '';

    comments.forEach(function(item){
        out += `<p class="comment-text-gallery-date">${timeConverter(item.time)}</p>`;
        out += `<p class="comment-text-gallery">${item.body}</p>`;
    })

    commentField.innerHTML = out;
}

function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
    return time;
}
