<?php session_start();
 if (isset($_SESSION["code"])){
        $code = $_SESSION['code'];
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<link href="CSS/gameover.css" rel="stylesheet" type="text/css" />	
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<title>GameOver</title>

 </head>

<body>
	<?php

?>
<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php" accesskey="h">Home</a>
	</div>
</div>
<div id="gameover">

	<div class="gameover">
	<p> GAME </p>
	<p> OVER </p>
	</div>

	<div class="user"> <p>Username: <?php $user = $_SESSION['username']; echo "$user";?></p> </div>

	<div class="opcoes">
		<form method="post" action="to_play.php">
			<div class="yes"><button class="yes" name="Winpoints" type="Submit">Save/Exit</button></div>
		</form>
	</div>

	<div class="opcoes">
		<form method="post" action="to_play.php">
			<div class="no"><button class="no" name="Retry" type="Submit">Try Again</button></div>
		</form>
	</div>

	<div class="codi"> <p>Code:<?php echo "$code";?> </p></div>
</div>
</body>


</html>
