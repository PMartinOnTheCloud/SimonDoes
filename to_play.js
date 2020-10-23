function startGame() {
	hideButton();
	var arrayOfCeldasToIlluminate = document.getElementsByClassName("impostor");
	paintCeldas(arrayOfCeldasToIlluminate);
	//removeImpostorClass(arrayOfCeldasToIlluminate);
	setTimeout(function(){ playerPlays(); }, 1000);
}

function playerPlays() {
	var celdas = document.getElementById('general').children;
	clearCeldas(celdas);
	addEventListenerToCeldas(celdas);
}

function hideButton(){
	var button = document.getElementById('button');
	if (button.style.display === "none") {
    	button.style.display = "block";
  	}
}

function paintCeldas (arrayOfCeldasToIlluminate) {
	for (let i=0; i < arrayOfCeldasToIlluminate.length; i++) {
		arrayOfCeldasToIlluminate[i].style.backgroundColor = "red";
	}
}


/* En caso de que un jugador haga CTRL+U para ver las casillas que se iluminan
function removeImpostorClass (arrayOfCeldasToIlluminate) {
	while (arrayOfCeldasToIlluminate[0]){
		arrayOfCeldasToIlluminate[0].classList.remove('impostor');
	}
}
*/

function clearCeldas (celdas) {
	for (let i = 0; i < celdas.length; i++) {
		celdas[i].style.backgroundColor= "white";
	}
}

function addEventListenerToCeldas (celdas) {
	for (let i = 0; i < celdas.length; i++) {
		celdas[i].addEventListener("click",function() { celdas[i].style.backgroundColor = "green"; });
	}
}