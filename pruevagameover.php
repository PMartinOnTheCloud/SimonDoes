<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link href="CSS/pruevagameover.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>GameOver</title>

 </head>
<body>
	<div id="Gameover">
	<div id="Header">
		<a class="Logo">SimonDoes</a>
		<div class="Header-right">
			<a class="Active" href="index.php">Home</a>
		</div>
	</div>
	<div class="Title">
		<div class="Gameover">YOU'VE WON.</div>
		<div class="Img">
			<img src="Images/gameover.png" class=".vert-move">
		</div>
	</div>
	<div class="User"> <p>Username: Adrian</p> </div>

	<div class="Relative">
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
<script src="JS/hotkey_gameover.js" type="text/javascript"></script>
</body>


</html>
