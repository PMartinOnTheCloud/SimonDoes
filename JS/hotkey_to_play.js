document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 72) {
    location.replace('index.php');
  } else if (key.ctrlKey && key.altKey && key.which == 83) {
  	document.getElementById('buttonStart').click();
  } else if (key.ctrlKey && key.altKey && key.which == 67) {
  	document.getElementById('buttonCheck').click();
  }
};