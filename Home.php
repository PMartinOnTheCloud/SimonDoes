<?php session_start();?>
<?php
      if (isset($_POST["username"])){
        $_SESSION["username"] = $_POST["username"]; 
    }
      ?>
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

	<div class="caja">
	<a href="to_play.php" class="start" accesskey="s">START</a>


	<a href="ranking.cfg" class="ranking" accesskey="r">Ranking</a>
	</div>

	<div class="footer">
        <p>Welcome, <?php echo $_SESSION["username"];?></p>
	</div>
</body>
</html>