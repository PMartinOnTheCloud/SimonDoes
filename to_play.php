<!DOCKTYPE html>
<head>
	<link rel="stylesheet" href="index.css">
</head>
<body>

<h1 id="demo">SIMON SAYS...</h1>


<?php 


$heigth = 5;
$width = 5;
$numberOfCeldasToIlluminate = 7;
$arrayOfCeldasToIlluminate = [];

while (sizeof($arrayOfCeldasToIlluminate) < $numberOfCeldasToIlluminate) {
	$pos = random_int(0,($width*$heigth)-1);
	if (in_array($pos , $arrayOfCeldasToIlluminate) !== true){
		array_push($arrayOfCeldasToIlluminate, $pos);
	}
}

$identification = 0;

echo "<div id='general'>";
for ($h=0;$h<$heigth;$h++){
	for ($w=0;$w<$width;$w++){
		if (in_array($identification, $arrayOfCeldasToIlluminate)) {
			echo "<div id='$identification' class='impostor'></div>";
		} else {
			echo "<div id='$identification' class=''></div>";
		}
		$identification += 1;
	}
}

echo "</div>";
?>

<button id='button' onclick="startGame()">START</button>
<script src="to_play.js" type="text/javascript">
</script>
</body>
</html>
