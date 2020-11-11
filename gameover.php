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
<link href="CSS/gameover.css" rel="stylesheet" type="text/css" />
<script src="JS/ColorSwith.js"></script>	
<audio id="audio" preload="auto" src="Song/lose.wav"></audio>
<audio id="BtM" preload="auto" src="Song/beep3.wav"></audio>
<title>GameOver</title>

 </head>
<body>

<?php

$url = $_SESSION['visited_pages']['prev'];
$urlexplode = explode("/", $url);
if (end($urlexplode)== "to_play.php"){
	if ($_SESSION["points"] > 20){
		$_SESSION["points"] -= 20;
	}
}


?>
	<div id="Gameover">
	<div id="Header" class="Header">
		<a class="Logo" href="index.php">SimonDoes</a>
		<button id="colorblind" onclick="myFunction()" onmousedown="bleep.play()">S<u>w</u>itch</button>
	</div>
	<div class="Title">
		<div class="Gameover">Game Over</div>
		<div class="Img">
			<img src="Images/gameover4.png" class=".vert-move">
		</div>
	</div>

	<div class="User"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>

	<div class="Relative">
		<form method="post" action="to_play.php">
			<button class="TryAgain" name="TryAgain" id="TryAgain" type="Submit" onmousedown="bleep.play()"><u>T</u>ry Again</button>
		</form>
		<form method="post" action="ranking.php">
			<button class="SaveExit" id="SaveExit" name="SaveExit" type="Submit" onmousedown="bleep.play()"><u>S</u>ave/Exit</button>
		</form>
	</div>
	<div class="Code">
		<p>Code: <?php echo "$code";?></p>
	</div>
</div>
<script src="Song/SoundGameOver.js"></script>
<script src="JS/hotkey_gameover.js" type="text/javascript"></script>
</body>


</html>