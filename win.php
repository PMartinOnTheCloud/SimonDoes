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
if (isset($level)) {
    $searchfor = $level;

}
//en caso de que llegue al ultimo nivel.
//elseif (isset($level) && $_SESSION['level']==) {

//}
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
<div class="opcoes">
<form method="post" action="to_play.php">
		<div class="yes"><button class="yes" name="Winpoints" type="Submit">Next Level</button></div>
</form>
</div>
<div class="opcoes">
<form method="post" action="to_play.php">
		<div class="no"><button class="no" name="Retry" type="Submit">Try Again</button></div>
</form>
</div>
	</div>
	<div class="codi"> <p>Code:<?php echo "$code";?> </p></div>

</div>
<script src="JS/to_play.js" type="text/javascript"></script>

</body>
</html>