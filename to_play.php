<?php session_start();
if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
    }?>
<?php
      if (isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"]; 
    }
if(!empty($_SESSION['visited_pages'])) {
  $_SESSION['visited_pages']['prev'] = $_SESSION['visited_pages']['current'];
}else {
  $_SESSION['visited_pages']['prev'] = 'No previous page';
}
$_SESSION['visited_pages']['current'] = $_SERVER['REQUEST_URI'];
      ?>
<!DOCTYPE html>
<html>
<head>
	<title>To_play</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/to_play.css">
    <script src="JS/ColorSwith.js"></script>
    <audio id="inicio" preload="auto" src="Song/inicio2.mp3"></audio>
    <audio id="BtM" preload="auto" src="Song/beep3.wav"></audio>
</head>
<body>
<div id="Header">
	<a class="Logo" href="index.php">SimonDoes</a>
	<button class="colorblind" id="colorblind" onclick="myFunction()">S<u>w</u>itch</button>
</div>
<?php

if (isset($_POST['liarmode'])) {
    $_SESSION['liar'] = true;
}

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

$_SESSION['time']=0;

if (isset($_POST['RetryWin'])) {
	$_SESSION['points']-= $_SESSION['prevpoints'];
    $_SESSION['level'] -=1;
	header("Location: to_play.php"); 
}

$file = 'conf.txt';

$contents = file($file, FILE_IGNORE_NEW_LINES);

$codelist = array();
for ($i = 0 ; $i < sizeof($contents) ; $i++) {
    $codeline=explode(",",$contents[$i]);
    array_push($codelist, end($codeline));
}

if (isset($_POST["codelevel"])){
    if (in_array($_POST["codelevel"],$codelist)) {
        $_SESSION['level'] = array_search($_POST['codelevel'],$codelist);
        header("Location: to_play.php"); 
    } 
    else if (empty($_POST['codelevel']) && isset($_SESSION['level'])) {
        $_SESSION['level'] = $_SESSION['level'];
        header("Location: to_play.php"); 
    } 
    else if (empty($_POST['codelevel'])) {
        $_SESSION['level'] = 0;
        header("Location: to_play.php");
    }
    else {
        header("Location: index.php");
    }
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
    if ($_SESSION['level']+1 != sizeof($contents)) {
        $codeline= explode(",",$contents[$_SESSION['level']+1]);
        $_SESSION['codenext'] = $codeline[5];
    } else {
        $_SESSION['codenext'] = $_SESSION['code'];
    }
}

if ($_SESSION['liar'] == true) {
    $numberOfCeldasLiars = floor($numberOfCeldasToIlluminate/2);
    $numberOfCeldasToIlluminate = $numberOfCeldasToIlluminate-$numberOfCeldasLiars;
}

$arrayOfCeldasToIlluminate = [];

while (sizeof($arrayOfCeldasToIlluminate) < $numberOfCeldasToIlluminate) {
	$pos = random_int(0,($width*$heigth)-1);
	if (in_array($pos , $arrayOfCeldasToIlluminate) !== true){
		array_push($arrayOfCeldasToIlluminate, $pos);
	}
}

if ($_SESSION['liar'] == true) {
    $arrayOfCeldasToLiars = [];
    while (sizeof($arrayOfCeldasToLiars) < $numberOfCeldasLiars) {
        $pos = random_int(0,($width*$heigth)-1);
        if (in_array($pos,$arrayOfCeldasToLiars) !== true && in_array($pos, $arrayOfCeldasToIlluminate) !== true){
            array_push($arrayOfCeldasToLiars, $pos);
        }
        
    }
}

$identification = 0;

$relativeheight = (100/$heigth)-(0.4);
$relativewidth= (100/$width)-(0.4);
$codename=$_SESSION['code'];

echo "<div id='general'>";
for ($h=0;$h<$heigth;$h++){
	for ($w=0;$w<$width;$w++){
		if (in_array($identification, $arrayOfCeldasToIlluminate)) {
			echo "<div id='$identification' class='correct' style='height: $relativeheight%; width: $relativewidth%;'></div>";
		} else {
            if ($_SESSION['liar'] == true) {
                if (in_array($identification,$arrayOfCeldasToLiars)) {
		          echo "<div id='$identification' class='liar' style='height: $relativeheight%; width: $relativewidth%;'></div>";
                } else {
                    echo "<div id='$identification' class='' style='height: $relativeheight%; width: $relativewidth%;'></div>";    
                }
            } 
            if ($_SESSION['liar'] != true) {
                echo "<div id='$identification' class='' style='height: $relativeheight%; width: $relativewidth%;'></div>";    
            }
		}
		$identification += 1;
	}
}



if ($_SESSION['liar']== true){
    $colors=['blue','green','orange','red','yellow'];
    $colorliar = 0;
    $colorcorrect = 0;
    if ($colorliar == 0) {
        $pos = random_int(0, (sizeof($colors)-1));
        $colorliar = $colors[$pos];
    }

    $colorcorrect = $colorliar;

    while ($colorliar == $colorcorrect) {
        $pos = random_int(0, (sizeof($colors)-1));
        $colorcorrect = $colors[$pos];
    }
        
    }

echo "</div>";

?>
<?php
if ($_SESSION['liar']==true) {
    echo "
<div id='tochoose'>
<p id='texttochoose'>Correct color:</p>
<div id='colortochoose' style='background-color: $colorcorrect;'></div>
</div>";
 } 
?>

<svg width="200" height="200" id="svg"><circle id="circle" cx="100" cy="100" r="80" /></svg>
<span id="timer"><?php echo $secondsin; ?></span>


<button class="buttonStart" id='buttonStart' onclick="startGame(<?php echo "$secondsin"; if($_SESSION['liar']==true){echo ",".$_SESSION['liar'].",'".$colorcorrect."','".$colorliar."'";} ?>)"><u>S</u>TART</button>
<button class="buttonCheck" id='buttonCheck' onclick="failOrGrace(<?php echo "$numberOfCeldasToIlluminate,'$codename'"; ?>)"><u>C</u>HECK</button>

<script src="Song/sound.js"></script>
<script src="JS/to_play.js" type="text/javascript"></script>
<script src="JS/hotkey_to_play.js" type="text/javascript"></script>


<footer>
    <p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?> - Level: <?php echo $_SESSION['level']+1;?> - <?php echo "$name";?></p>

  </footer>

</body>
</html>