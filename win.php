<?php session_start();
 if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
    }?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link href="CSS/win.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>Win</title>

 </head>
 <?php

$_SESSION['points'] += 100;

?>
 <body>
 	<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php">Home</a>
	</div>
</div>
 	<div id="win">
	<div class="win">
	<p> YOU'VE WON </p>
	<p><img src="Images/win.png"></p>
	</div>
	<div class="user"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>
	<div class="opcoes">
<div class="opcoes">
<form method="post" action="to_play.php">
		<div class="yes"><button class="yes" id="yes" name="Winpoints" type="Submit">Next Level</button></div>
</form>
</div>
<div class="opcoes">
<form method="post" action="ranking.php">
		<div class="puntos"><button class="puntos" id="puntos" name="saveandexit" type="Submit">Save/Exit</button></div>
</form>
</div>
<div class="opcoes">
<form method="post" action="to_play.php">
		<div class="no"><button class="no" name="RetryWin" id="no" type="Submit">Try Again</button></div>
</form>
</div>
	</div>
	<div class="codi"> <p>Code:<?php echo "$code";?> </p></div>

</div>
<script src="JS/hotkey_win.js" type="text/javascript"></script>
</body>
</html>
