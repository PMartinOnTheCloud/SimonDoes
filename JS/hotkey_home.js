document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 72) {
    location.replace('index.php');
  }
};