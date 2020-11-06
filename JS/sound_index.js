var audio = new Audio("http://music.ogg" ) ;

audio.oncanplaythrough = function(){
audio.play();
}

audio.loop = true;

function play() {
	var audio = document.getElementById("button");
	audio.play();}