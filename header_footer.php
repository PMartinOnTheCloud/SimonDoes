<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cabecera fija</title>
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">
</head>
<body>
	<div class="header">
		<a class="Logo">SimonDoes</a>
		<div class="header-right">
			<a class="active" href="Home.php?name=username">Home</a>
		</div>
	</div>

	<div class="footer">
		<p>
		<?php
		$user = $_SESSION['username'];
		echo "$user";?>
			
		</p>
	</div>
</body>
</html>