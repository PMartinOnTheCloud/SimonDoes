<?php session_start();
 if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="CSS/win.css" rel="stylesheet" type="text/css" />
<script src="JS/ColorSwith.js"></script>
<audio id="audio" preload="auto" src="Song/win.wav"></audio>
<audio id="BtM" preload="auto" src="Song/beep3.wav"></audio>
<title>Win</title>

 </head>
 <?php
$url = $_SESSION['visited_pages']['prev'];
$urlexplode = explode("/", $url);
$url2 = $_SESSION['visited_pages']['current'];
$url2explode = explode("?",$url2);
$contents = file('conf.txt', FILE_IGNORE_NEW_LINES);

if (end($urlexplode)== "to_play.php"){
	if ((int)end($url2explode) <= 70){
	$calcTime = 100 - (floor((int)end($url2explode)/2));
	} else {
		$calcTime = 100 - 50;
	}
	$_SESSION['points'] += $calcTime;
	if ($_SESSION['level'] != sizeof($contents)-1) {
		$_SESSION['level'] +=1;
	}
	$_SESSION['prevpoints'] = $calcTime;
	header('Location: win.php');
}

?>
<body> 
	<div id="Win">
	<div id="Header">

		<a class="Logo" href="index.php" onmousedown="bleep.play()">SimonDoes</a>
		<button id="colorblind" onclick="myFunction()" onmousedown="bleep.play()">S<u>w</u>itch</button>	
		</div>
	</div>
	
	<div class="Title">
		<div class="Win">YOU'VE WON</div>
		<div class="Img">
			<img src="Images/win.png" class=".vert-move">
		</div>
	</div>

	<div class="User"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>
	<div class="Relative">
		<form method="post" action="to_play.php">
			<button class="NextLevel" id="NextLevel" name="NextLevel" type="Submit" onmousedown="bleep.play()"><u>N</u>ext Level</button>
		</form>
		<form method="post" action="to_play.php">
			<button class="TryAgain" name="RetryWin" id="TryAgain" type="Submit" onmousedown="bleep.play()"><u>T</u>ry Again</button>
		</form>
		<form method="post" action="ranking.php">
			<button class="SaveExit" id="SaveExit" name="SaveExit" type="Submit" onmousedown="bleep.play()"><u>S</u>ave/Exit</button>
		</form>
	</div>
	<div class="Code">
		<p>Code: <?php echo $_SESSION['codenext'];?> </p>
	</div>
</div>
<script src="Song/SoundWin.js"></script>
<script src="JS/hotkey_win.js" type="text/javascript"></script>
</body>
</html>