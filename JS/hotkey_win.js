document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 72) {
    location.replace('index.php');
  } else if (key.ctrlKey && key.altKey && key.which == 84) {
  	document.getElementById("no").click();
  } else if (key.ctrlKey && key.altKey && key.which == 78) {
  	document.getElementById("yes").click();
  } else if (key.ctrlKey && key.altKey && key.which == 83) {
  	document.getElementById("puntos").click();
  } 
};
