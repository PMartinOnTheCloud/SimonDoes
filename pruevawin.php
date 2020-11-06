<?php session_start();
 if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
    }?>
<!DOCTYPE html>
<html>
<head>
	<title>PruevaWin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/pruevaWin.css">
	<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
</head>
  <?php

$_SESSION['points'] += 100;

?>
<body>
	<div class="Container">
		<div id="Header">
			<a class="Logo">SimonDoes</a>
			<div class="Header-right">
				<a class="Active" href="index.php">Home</a>
			</div>
		</div>

			<div class="Title">
				<div class="Win">YOU'VE WON.</div>
				<div class="Img">
					<img src="Images/win.png" class=".vert-move">
				</div>
			</div>
			
			<div class="User"> 
				<p>Username: Adrian</p>
			</div>

			<div class="Relative">
				<form method="post" action="to_play.php">
						<button class="NextLevel" id="NextLevel" name="NextLevel" type="Submit">Next Level</button>
					</form>
					<form method="post" action="to_play.php">
						<button class="TryAgain" name="TryAgain" id="TryAgain" type="Submit">Try Again</button>
					</form>
					<form method="post" action="ranking.php">
						<button class="SaveExit" id="SaveExit" name="SaveExit" type="Submit">Save/Exit</button>
					</form>
			</div>
			<div class="Code">
				<p>Code:R3323 </p>
			</div>
	</div>
	<script src="JS/hotkey_win.js" type="text/javascript"></script>
</body>
</html>