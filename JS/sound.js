var bleep = new Audio();
bleep.src = "Sound/016.mp3";

function play() {
	var audio = new Audio();
	audio.src = "Sound/016.mp3";
    var audio = document.getElementById("SaveExit");
        audio.play();
      }
let playsound = function(){document.getElementById("audiosound").play()}


function play1() { 
  var mp3 = '<source src="Sound/016.mp3" type="audio/mpeg">'; 
  document.getElementById("sound").innerHTML ='<audio autoplay="autoplay">' + mp3 + "</audio>"; 
            } 