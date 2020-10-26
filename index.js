/*function pop(intentos) {
	var celdas = document.getElementById("general").children;
	for (let i = 0; celdas.length > i; i++) {
		celdas[i].style.backgroundColor= "white";
	}
	if (intentos > 0) {
		var colores = ['yellow','red','blue','orange','gray','cyan','green'];
		var randcolor = Math.floor(Math.random() * colores.length);
		var randcell = Math.floor(Math.random() * 16);
		celdas[randcell].style.backgroundColor = colores[randcolor];
		setTimeout(function(){
		pop(intentos-1);},1500);
	}
	else {
		for (let i = 0; celdas.length > i; i++) {
		celdas[i].addEventListener("click",function() {alert("Esta es la casilla "+ (i+1));});
		}
	}
}*/


function startGame(numilluminated) {
	var celdas = document.getElementById("general").children;
	var arrayceldas = getCeldasToIlluminate(celdas,numilluminated);
	setTimeout (function() { for(let i=0;i<length(arrayceldas); i++) {celdas[i].style.backgroundColor = 'red';}},4000)


}
function getCeldasToIlluminate(celdas,numilluminated) {
	var arrayceldas = [];
	for(let i=0;i<length(numilluminated);i++){
		arrayceldas.push(Math.floor(Math.random() * length(celdas)));
	}
	return arrayceldas;
}