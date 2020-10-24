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
	var selectedCeldasId = [];
	var correctCeldasId = getCeldasId();
	addEventListenerToCeldas(celdas,selectedCeldasId,correctCeldasId);
	
}

function hideButton(){
	var button = document.getElementById('button');
	button.style.visibility = "hidden";
}

function paintCeldas (arrayOfCeldasToIlluminate) {
	for (let i=0; i < arrayOfCeldasToIlluminate.length; i++) {
		arrayOfCeldasToIlluminate[i].style.backgroundColor = "red";
	}
}

function getCeldasId() {
	var tempCeldasId= [];
	for (let i=0; i< 7; i++) {
		tempCeldasId.push(parseInt(document.getElementsByClassName("impostor")[i].id));
	}
	return tempCeldasId;
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

function addEventListenerToCeldas (celdas,selectedCeldasId,correctCeldasId) {
	for (let i = 0; i < celdas.length; i++) {
		celdas[i].addEventListener("click",function() { checkCeldas(i,celdas,selectedCeldasId,correctCeldasId); });
	}
}

function checkCeldas(i,celdas,selectedCeldasId,correctCeldasId) {
	if (correctCeldasId.includes(i)) {
		celdas[i].style.backgroundColor = "green";
		selectedCeldasId.push(i);
	} else {
		youLose();
	}
	if (correctCeldasId.length == selectedCeldasId.length) {
		youWin();
	}
}


function youWin() {
	document.write("You Win");
}

function youLose() {
	document.write("You Lose");
}