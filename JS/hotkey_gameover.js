document.onkeyup = function(key) {
  if (key.ctrlKey && key.altKey && key.which == 72) {
    location.replace('index.php');
  } else if (key.ctrlKey && key.altKey && key.which == 84) {
  	document.getElementById("no").click();
  } /* else if (key.ctrlKey && key.altKey && key.which == 83) {
  	Aqui va la accion para redirigir al ranking y salvar el score
  } */
};