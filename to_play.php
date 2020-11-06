<?php session_start();?>
<?php
      if (isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"]; 
    }

      if (isset($_POST["codelevel"])){
        $_SESSION["codelevel"] = $_POST["codelevel"];
    }
    ?>
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
		<a class="active" href="index.php">Home</a>
	</div>
</div>
<?php
//codigo para coger lvl concreto
$file = 'conf.txt';

$contents = file($file, FILE_IGNORE_NEW_LINES);
//existe el codigo? y lo coge

$codelist = array();
for ($i = 0 ; $i < sizeof($contents) ; $i++) {
	$codeline=explode(",",$contents[$i]);
	array_push($codelist, end($codeline));
}

if (isset($_POST["codelevel"])){
	if (in_array($_POST["codelevel"],$codelist)) {
		$_SESSION['level'] = array_search($_POST['codelevel'],$codelist);
	} 
	else if (empty($_POST['codelevel']) && isset($_SESSION['level'])) {
		$_SESSION['level'] = $_SESSION['level'];
	} 
	else if (empty($_POST['codelevel'])) {
		$_SESSION['level'] = 0;
	}
	else {
		header("Location: index.php");
	}
}

//otra forma de buscar el codigo
/*if(isset($_POST["codelevel"])){
	if (!empty($_POST['codelevel'] && strlen($_POST['codelevel'])>4) ){
		for ($i=0; $i < sizeof($contents); $i++) { 
			if (strpos($contents[$i], $_SESSION["codelevel"])) {
				$line=$i;
				}	
			}
		if (!isset($line) && !isset($_SESSION['level']))
			header("Location: index.php");
		}
	elseif (!empty($_POST['codelevel'])) {
		header("Location: index.php");
	}
elseif (empty($_POST["codelevel"])) {
	$_POST['codelevel']='S3324';
}
	
}*/


//puntos
if (isset($_POST['RetryWin'])) {
	$_SESSION['points']-= 100; 
}


if (isset($_POST['Winpoints'])){
	$_SESSION['level'] += 1;
}
//definir nivel
if (isset($_POST['codelevel'])&& isset($line)) {
	if (!isset($_POST['Winpoints'])) {
		$_SESSION['level']=$line;
	}
    $codeline=explode(",",$contents[$_SESSION['level']]);
    $name=$codeline[0];
    $width=$codeline[1];
    $heigth=$codeline[2];
    $numberOfCeldasToIlluminate=$codeline[3];
    $secondsin=$codeline[4];
    $_SESSION['code']=$codeline[5];
    
    //usuario y niveles
    if (!isset($_SESSION['pastname'])){
		$_SESSION['points'] = 0;
		$_SESSION['pastname'] = $_SESSION['username'];}

	else{
		$_SESSION['pastname'] = $_SESSION['username'];

	}
}

else{
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

<button id='buttonStart' onclick="startGame(<?php echo "$secondsin"; ?>)">START</button>
<button id='buttonCheck' onclick="failOrGrace(<?php echo "$numberOfCeldasToIlluminate"; ?>)">CHECK</button>

<script src="JS/to_play.js" type="text/javascript"></script>
<script src="JS/hotkey_to_play.js" type="text/javascript"></script>

<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
