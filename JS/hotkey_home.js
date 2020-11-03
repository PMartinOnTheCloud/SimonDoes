document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 72) {
    location.replace('index.php');
  } else if(key.ctrlKey && key.altKey && key.which == 83) {
  	document.getElementById('start').click();
  }else if(key.ctrlKey && key.altKey && key.which == 82) {
  	document.getElementById('ranking').click();
  }
};