document.onkeyup = function(key) {
  if (key.altKey && key.which == 72) {
    document.getElementsByClassName('Logo')[0].click();
  } else if (key.altKey && key.which == 87){
  	document.getElementById('colorblind').click();
  }
};
