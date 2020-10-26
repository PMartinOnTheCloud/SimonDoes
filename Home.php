<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="CSS/All.css">
</head>
<body>
	<div class="header">
		<h1 class="Logo">SimonDoes</h1>
	</div>


	<a href="to_play.php?name=username" class="button">START</a>


	<div class="footer">
        <p>Welcome, <?php echo $_SESSION["username"] = $_POST["username"];?></p>
	</div>
</body>
</html>