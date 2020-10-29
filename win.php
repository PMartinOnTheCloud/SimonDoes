<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link href="CSS/win.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>Win</title>

 </head>
 <?php
if (isset($level)) {
    $searchfor = $level;

}
else {
    $searchfor = 'S7781';

}
?>
 <body>
 	<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php" accesskey="h">Home</a>
	</div>
</div>
 	<div id="win">
	<div class="win">
	<p> YOU'VE WON </p>
	<p><img src="Images/win.png"></p>
	</div>
	<div class="user"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>
	<div class="opcoes">
		<div class="yes"> <a href="to_play.php" accesskey="y">Next Level <?php $_SESSION['level']+=1; ?></a> </div>
		<div class="no"> <a href="to_play.php" accesskey="n">Try again </a> </div>
	</div>
	<div class="codi"> <p>Code:<?php echo "$level";?> </p></div>
</div>
<script src="JS/to_play.js" type="text/javascript"></script>

</body>
</html>