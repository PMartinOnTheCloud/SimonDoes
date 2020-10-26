<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>To_play</title>
	<style rel="stylesheet" type="text/css" href="CSS/All.css"></style>
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">

</head>
<body>
<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="Home.php">Home</a>
	</div>
</div>


<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>