<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">	
<link href="CSS/win.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>Win</title>

 </head>

 <body>
 	<div id="win">
	<div class="win">
	<p> YOU'VE WON </p>
	<p><img src="Images/win.png"></p>
	</div>
	<div class="continue"> <p><?php
		$user = $_SESSION['username'];
		echo "$user";?> ,CONTINUE? </p> </div>
	<div class="opcoes">
		<div class="yes"> <a href="to_play.php?name=username"> YES </a> </div>
		<div class="no"> <a href="Home.php?name=username"> NO </a> </div>
	</div>
</div>
</body>


</html>