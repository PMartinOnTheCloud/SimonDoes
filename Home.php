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
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">

</head>
<body>

</div>
	<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php" >Home</a>
	</div>
</div>

	<div class="caja">
	<a id="start" href="to_play.php" class="start">START</a>


	<a id="ranking" href="ranking.php" class="ranking">Ranking</a>
	</div>

	<div class="footer">
        <p>Welcome, <?php echo $_SESSION["username"];?></p>
	</div>
<script src="JS/hotkey_home.js" type="text/javascript"></script>
</body>
</html>
