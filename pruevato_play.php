<?php session_start();?>
<?php
      if (isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"]; 
    }
      ?>
<!DOCTYPE html>
<html>
<head>
	<title>To_play</title>
	<link rel="stylesheet" href="CSS/pruevato_play.css">
</head>
<body>
<div id="Header">
        <a class="Logo">SimonDoes</a>
        <div class="Header-right">
            <a id="sound"class="Active" href="index.php">Home</a>
        </div>
    </div>
 <?php

if (!isset($_SESSION['pastname'])){
	$_SESSION['level'] = 0;
	$_SESSION['points'] = 0;
	$_SESSION['pastname'] = $_SESSION['username'];
} else {
	if ($_SESSION['pastname'] != $_SESSION['username']) {
		$_SESSION['level'] = 0;
		$_SESSION['points'] = 0;
		$_SESSION['pastname'] = $_SESSION['username'];
	}
}


if (isset($_POST['RetryWin'])) {
	$_SESSION['points']-= 100; 
}


if (isset($_POST['Winpoints'])){
	$_SESSION['level'] += 1;
}


$file = 'conf.txt';

$contents = file($file, FILE_IGNORE_NEW_LINES);

if ($contents[$_SESSION['level']]) {
    $codeline=explode(",",$contents[$_SESSION['level']]);
    $name=$codeline[0];
    $width=$codeline[1];
    $heigth=$codeline[2];
    $numberOfCeldasToIlluminate=$codeline[3];
    $secondsin=$codeline[4];
    $_SESSION['code']=$codeline[5];
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


echo "<div id='General'>";
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

<button id='ButtonStart' onclick="startGame(<?php echo "$secondsin"; ?>)">START</button>
<button id='ButtonCheck' onclick="failOrGrace(<?php echo "$numberOfCeldasToIlluminate"; ?>)">CHECK</button>

<script src="JS/to_play.js" type="text/javascript"></script>
<script src="JS/hotkey_to_play.js" type="text/javascript"></script>

<div class="Footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
