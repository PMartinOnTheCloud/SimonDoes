<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">	
<link href="CSS/gameover.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>GameOver</title>

 </head>

<body>

<div id="gameover">

	<div class="gameover">
	<p> GAME </p>
	<p> OVER </p>
	</div>

	<div class="continue"> <p><?php
		$user = $_SESSION['username'];
		echo "$user";?> ,CONTINUE? </p> </div>

	<div class="opcoes">
		<div class="yes"> <a href="to_play.php? name=username"> YES </a> </div>
		<div class="no"> <a href="Home.php? name=username"> NO </a> </div>
	</div>

</div>
</body>


</html>