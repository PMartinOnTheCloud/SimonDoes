<?php session_start();
   if (isset($_SESSION["username"])){
        $user = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Instructions</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/All.css">
	
</head>
<body>
	<div class="header">
		<h1 class="Logo">Welcome to SimonDone! </h1>
	</div>
	<div id="wrapper" class="clearfix">
		<div id="first">	
		<p id="text">To start the game just press the <mark class="important">START</mark> button.
		<p id="text">When the game starts a table box will appear, after that a few boxes will light up. </p>
		<p id="text"><mark class="correct">To win the game you need to press the correct boxes. </p>
		<h3 id="text">But <mark class="important">be carefull!</mark> If you fail a single one you will <mark class="incorrect">lose the game!</mark></h3>
		<p id="text">Win multiple games to increase the dificult of it by increasing the speed of the boxes to disapear and the number of it.</p>	
		<p id="text">If you understood the instructions, enter a username and press <mark class="important"><strong>"CONTINUE".</mark></strong></p><br>	
		</div>
		<div id="second">
			<form name='input' action='Home.php' method='post'>
          		<div class="imgcontainer">
          			<img src="Images/win.png" alt="Avatar" class="avatar">
          		</div>
          		<div class="container">
          			<label class="label" for="uname"><b>Username</b></label>
          			<?php  
          				if (isset($user)) {

          					echo "<input type=\"text\" value=\"$user\" placeholder=\"Enter Username\" name=\"username\" required><button type=\"submit\" id=\"button\">Continue</button>";
          				}
          				else{
          					echo "<input type=\"text\" placeholder=\"Enter Username\" name=\"username\" required><button type=\"submit\" id=\"button\">Continue</button>";
          				}
          			?>
          		 </div>
          	</form>
      </div>
      <a id="Rank" class="Rank" href="ranking.php" accesskey="r">Ranking</a>
	</div>
	<div class="footer">
		<p class="footer">Creator: Adrian Pradas - Carlos Jurado - Pablo Martin </p>
	</div>
<script src="JS/hotkey_index.js" type="text/javascript"></script>
</body>
</html>
