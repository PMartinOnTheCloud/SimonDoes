document.onkeyup = function(key) {
  if (key.altKey && key.which == 67) {
  	document.getElementById('button').click();
  } else if (key.altKey && key.which == 82){
  	document.getElementById('ranking').click();
  } else if (key.altKey && key.which == 76){
  	document.getElementById('liarbutton').click();
  } else if (key.altKey && key.which == 83){
  	document.getElementById('survivalbutton').click();
  } else if (key.altKey && key.which == 87){
  	document.getElementById('colorblind').click();
  }
};
