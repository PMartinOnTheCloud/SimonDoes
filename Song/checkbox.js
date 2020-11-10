  var audio = new Audio('Song/checkbox.mp3');
  audio.oncanplay = function() {
    if (document.getElementById("liarbutton").checked) this.play()
  }
  function myfunction(el) {    
    if (el.checked) {
      audio.load();
    }
  }
