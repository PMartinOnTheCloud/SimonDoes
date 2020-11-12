document.onkeyup = function(key) {
  if (key.altKey && key.which == 72) {
    document.getElementsByClassName("Logo")[0].click();
  } else if (key.altKey && key.which == 83) {
  	document.getElementById('buttonStart').click();
  } else if (key.altKey && key.which == 67) {
  	document.getElementById('buttonCheck').click();
  }
};