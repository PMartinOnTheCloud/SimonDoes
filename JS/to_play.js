function startGame(seconds) {
	hideButtonStart();
	var arrayOfCeldasToIlluminate = document.getElementsByClassName("impostor");
	paintCeldas(arrayOfCeldasToIlluminate);
	setTimeout(function(){ playerPlays(); }, (seconds * 1000));
}

function playerPlays() {
	var celdas = document.getElementById('general').children;
	var s = 0;
	scnds = setInterval(function () { s += 1; },1000);
	clearCeldas(celdas);
	showButtonCheck();
	addEventListenerToCeldas(celdas);}

function hideButtonStart(){
	var buttonStart = document.getElementById('buttonStart');
	buttonStart.style.visibility = "hidden";
}

function showButtonCheck(){
	var buttonCheck = document.getElementById('buttonCheck');
	buttonCheck.style.visibility = "visible";
}

function paintCeldas (arrayOfCeldasToIlluminate) {
	for (let i=0; i < arrayOfCeldasToIlluminate.length; i++) {
		arrayOfCeldasToIlluminate[i].style.backgroundColor = "red";
	}
}

function clearCeldas (celdas) {
	for (let i = 0; i < celdas.length; i++) {
		celdas[i].style.backgroundColor= "white";
	}
}

function addEventListenerToCeldas (celdas,selectedCeldasId,correctCeldasId) {
	for (let i = 0; i < celdas.length; i++) {
		celdas[i].addEventListener("click",function() { checkCeldas(i,celdas); });
	}
}

function checkCeldas(i,celdas) {
	if (celdas[i].style.backgroundColor == "white") {
		celdas[i].style.backgroundColor = "green";
	} else if (celdas[i].style.backgroundColor == "green") {
		celdas[i].style.backgroundColor = "white"
	}	
}


function failOrGrace(numberOfCeldasToIlluminate){
	clearInterval(scnds);
	var correctCeldasId = getCorrectCeldasId(numberOfCeldasToIlluminate);
	var coloredCeldasId = getColoredCeldasId();
	var fallo = false;
	for (let i = 0; i < coloredCeldasId.length; i++) {
		if (correctCeldasId.includes(coloredCeldasId[i]) == false && fallo == false) {
			fallo = true;
		}
	}
	if (fallo == false && coloredCeldasId.length==correctCeldasId.length){
		youWin();
	}
	else{
		youLose();
	}
}


function getCorrectCeldasId(numberOfCeldasToIlluminate){
	var tempCeldasId= [];
	for (let i=0; i< numberOfCeldasToIlluminate; i++) {
		tempCeldasId.push(parseInt(document.getElementsByClassName("impostor")[i].id));
	}
	return tempCeldasId;
}

function getColoredCeldasId() {
	var celdas = document.getElementById('general').children;
	var tempCeldasId = []
	var cont = 0;
	while (celdas[cont]){
		if (celdas[cont].style.backgroundColor == "green") {
			tempCeldasId.push(parseInt(celdas[cont].id));
		}
		cont +=1;
	}
	return tempCeldasId;
}



function youWin() {
	location.replace('win.php');
}

function youLose() {
	location.replace('gameover.php');
}