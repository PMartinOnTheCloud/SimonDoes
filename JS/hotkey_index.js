document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 67) {
  	document.getElementById('button').click();
  } else if (key.ctrlKey && key.altKey && key.which == 82){
  	location.replace("ranking.php");
  }
};