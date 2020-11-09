<?php session_start();
 if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
    }?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="CSS/win.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>Win</title>

 </head>
 <?php

$_SESSION['points'] += 100;

?>
<body onload="autoNotify()"> 
	<audio id="notifypop"> <!--Source the audio file. -->
            <source src="win.wav" type="audio/wav">
  </audio>
	<div id="Win">
	<div id="Header">
		<a class="Logo">SimonDoes</a>
		<div class="Header-right">
			<a class="Active" href="index.php" onclick="play1();">Home</a>
		</div>
	</div>
	<div class="Title">
		<div class="Win">YOU'VE WON</div>
		<div class="Img">
			<img src="Images/win.png" class=".vert-move">
		</div>
	</div>

	<div class="User"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>

	<div id="sound" class="Relative">
		<form method="post" action="to_play.php">
			<button class="NextLevel" id="NextLevel" name="NextLevel" type="Submit" onmousedown="bleep.play()">Next Level</button>
			<audio id="audio" src="Sound/win.wav"></audio>
		</form>
		<form method="post" action="to_play.php">
			<button class="TryAgain" name="TryAgain" id="TryAgain" type="Submit" onmousedown="bleep.play()" >Try Again</button>
		</form>
		<form method="post" action="ranking.php">
			<button class="SaveExit" id="SaveExit" name="SaveExit" type="Submit" onclick="playsound()">Save/Exit</button>
			<audio id="audiosound" src="https://s3.amazonaws.com/freecodecamp/drums/Heater-1.mp3"></audio>
		</form>
	</div>
	<div class="Code">
		<p>Code:<?php echo "$code";?> </p>
	</div>
</div>
<script src="JS/hotkey_gameover.js" type="text/javascript"></script>
</body>
</html>
