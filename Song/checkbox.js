  var audio = new Audio('Song/checkbox.mp3');
  audio.oncanplay = function() {
    if (document.getElementById("liarbutton").checked) this.play()
  }
  function myfunction(el) {    
    if (el.checked) {
      audio.load();
    }
  }

  var audio2 = new Audio('Song/checkbox.mp3');
  audio.oncanplay = function() {
    if (document.getElementById("survivalbutton").checked) this.play()
  }
  function myfunction2(el) {    
    if (el.checked) {
      audio.load();
    }
  }
