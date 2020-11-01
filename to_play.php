<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>To_play</title>
	<style rel="stylesheet" type="text/css" href="CSS/All.css"></style>
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">
	<link rel="stylesheet" href="CSS/to_play.css">
</head>
<body>
<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php" accesskey="h">Home</a>
	</div>
</div>

<?php

if (isset($level)) {
    $searchfor = $level;

}
else {
    $searchfor = 'B1010101';

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

$relativeheight = (100/$heigth)-(0.4);
$relativewidth= (100/$width)-(0.4);


echo "<div id='general'>";
for ($h=0;$h<$heigth;$h++){
	for ($w=0;$w<$width;$w++){
		if (in_array($identification, $arrayOfCeldasToIlluminate)) {
			echo "<div id='$identification' class='impostor' style='height: $relativeheight%;width: $relativewidth%;'></div>";
		} else {
			echo "<div id='$identification' class='' style='height: $relativeheight%;width: $relativewidth%;'></div>";
		}
		$identification += 1;
	}
}

echo "</div>";
?>

<button accesskey="s" id='buttonStart' onclick="startGame(<?php echo "$secondsin"; ?>)">START</button>
<button accesskey="k" id='buttonCheck' onclick="failOrGrace(<?php echo "$numberOfCeldasToIlluminate"; ?>)">CHECK</button>

<script src="JS/to_play.js" type="text/javascript"></script>

<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
