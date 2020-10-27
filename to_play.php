<<<<<<< HEAD
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>To_play</title>
	<style rel="stylesheet" type="text/css" href="CSS/All.css"></style>
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">

</head>
<body>
<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="Home.php">Home</a>
	</div>
</div>


<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
=======
<!DOCKTYPE html>
<head>
	<link rel="stylesheet" href="index.css">
</head>
<body>

<h1 id="demo">SIMON SAYS...</h1>


<?php

if (isset($level)) {
    $searchfor = $level;

}
else {
    $searchfor = 'R5553';

}

$file = 'conf.txt';
 //<-- 
// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, ',');

$pattern = "/^.*$pattern.*\$/m";
if(preg_match_all($pattern, $contents, $matches)){
    foreach ($matches[0] as $point) {
        $codeline=explode(",",$point);
        $name=$codeline[0];
        $width=$codeline[1];
        $heigth=$codeline[2];
        $numberOfCeldasToIlluminate=$codeline[3];
        $secondsin=$codeline[4];
        $code=$codeline[5];

    }

}
else{
   echo "No matches found";
} 

$arrayOfCeldasToIlluminate = [];

while (sizeof($arrayOfCeldasToIlluminate) < $numberOfCeldasToIlluminate) {
	$pos = random_int(0,($width*$heigth)-1);
	if (in_array($pos , $arrayOfCeldasToIlluminate) !== true){
		array_push($arrayOfCeldasToIlluminate, $pos);
	}
}

$identification = 0;

echo "<div id='general' style=''>";
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

<button id='buttonStart' onclick="startGame(<?php echo "$secondsin"; ?>)">START</button>
<button id='buttonCheck' onclick="failOrGrace(<?php echo "$numberOfCeldasToIlluminate"; ?>)">CHECK</button>

<script src="to_play.js" type="text/javascript">
</script>
</body>
</html>
>>>>>>> origin/PabloMartin
