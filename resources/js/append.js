let controlBlockButtonsRight = document.querySelector('.append');
let controlBlockButtonsLeft = document.querySelector('.control-block-button-left');
let bgPurple = document.querySelector('#bg-purple');

if (screen.width <= '768') {
  controlBlockButtonsRight.remove();
  controlBlockButtonsLeft.append(controlBlockButtonsRight, bgPurple);
  document.querySelector('#bg-purple').style.marginLeft = '3px';
}


