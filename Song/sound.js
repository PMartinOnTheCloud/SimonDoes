window.onload = function (params) {
    var audio = document.getElementById("inicio");
    audio.volume = 0.1;
    audio.play();
};

var bleep = new Audio();
bleep.src = "Song/beep3.wav";