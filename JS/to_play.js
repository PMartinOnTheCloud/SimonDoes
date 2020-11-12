function startGame(seconds,liar,colorcorrect='red',colorliar='blue') {
	hideButtonStart();
	if (liar==true) {
		var arrayOfCeldasToLiar = document.getElementsByClassName("liar");
		paintLiarCeldas(arrayOfCeldasToLiar,colorliar);
	}
	var arrayOfCeldasToIlluminate = document.getElementsByClassName("correct");
	paintCeldas(arrayOfCeldasToIlluminate,colorcorrect);
	countdownAnimation(seconds);
	setTimeout(function(){ playerPlays(); }, (seconds * 1000));
}

function playerPlays() {
	var celdas = document.getElementById('general').children;
	clearCeldas(celdas);
	decisecondsTime = 0;
	decisecondsInterval = setInterval(function(){ decisecondsTime += 1; },100);
	showButtonCheck();
	addEventListenerToCeldas(celdas);}

function paintLiarCeldas(arrayOfCeldasToLiar,colorliar) {
	for (let i=0; i < arrayOfCeldasToLiar.length; i++) {
		arrayOfCeldasToLiar[i].style.backgroundColor = colorliar;
	}
}


function hideButtonStart(){
	var buttonStart = document.getElementById('buttonStart');
	buttonStart.style.visibility = "hidden";
}

function showButtonCheck(){
	var buttonCheck = document.getElementById('buttonCheck');
	buttonCheck.style.visibility = "visible";
}

function paintCeldas (arrayOfCeldasToIlluminate,colorcorrect) {
	for (let i=0; i < arrayOfCeldasToIlluminate.length; i++) {
		arrayOfCeldasToIlluminate[i].style.backgroundColor = colorcorrect;
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

function failOrGrace(numberOfCeldasToIlluminate,level){
	clearInterval(decisecondsInterval);
 	easterBool = easterEgg(level);
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
	} else if (easterBool==true){
		easterLocation();
	}
	else{
		youLose();
	}

}

function easterEgg(level){
	if (level=="B7771") {
		var easter = true;
		checkEaster = document.getElementById("general").children;
		for (let i = 0; checkEaster.length > i ; i++) {
			if (checkEaster[i].style.backgroundColor != "green") {
				easter = false;
			}
		}
		return easter;
	} else {
		var easter = false;
		return easter;
	}
}


function getCorrectCeldasId(numberOfCeldasToIlluminate){
	var tempCeldasId= [];
	for (let i=0; i< numberOfCeldasToIlluminate; i++) {
		tempCeldasId.push(parseInt(document.getElementsByClassName("correct")[i].id));
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
	url = 'win.php?'+decisecondsTime;
	location.replace(url);
}


function youLose() {
	location.replace('gameover.php');
}


function easterLocation() {
	location.replace('easter_egg.php');
}

function countdownAnimation (seconds) {
    document.getElementById("circle").style.visibility = "visible";
    document.getElementById("timer").style.visibility = "visible";
    document.getElementById("circle").style.animation = String(seconds)+"s circletimer linear";
    var countdown = seconds;
    var countdownStart = setInterval(function() {
        if (countdown == 1){
            document.getElementById("circle").style.visibility = "hidden";
            document.getElementById("timer").style.visibility = "hidden";
            document.getElementById("circle").style.zIndex = -1;
            document.getElementById("timer").style.zIndex = -1;
            document.getElementById("svg").style.zIndex = -1; 
            clearInterval(countdownStart);
        } else {
            --countdown;
            document.getElementById("timer").innerHTML = countdown;
        }
    },1000)

}
