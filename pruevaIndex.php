<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <LINK REL="stylesheet" TYPE="text/css" HREF="CSS/pruevaindex.css">
</head>
 
<body>
 
<div class="container">
 
 <!-- Empieza Header -->
	<header>
		<h1 class="Logo">Welcome to SimonDone! </h1>
	</header>
<!-- Finaliza Header -->

<!-- Empieza Seccion de contenido -->
	<section>
		<p id="text">To start the game just press the <mark class="important">START</mark> button.
		<p id="text">When the game starts a table box will appear, after that a few boxes will light up. </p>
		<p id="text"><mark class="correct">To win the game you need to press the correct boxes. </p>
		<h3 id="text">But <mark class="important">be carefull!</mark> If you fail a single one you will <mark class="incorrect">lose the game!</mark></h3>
		<p id="text">Win multiple games to increase the dificult of it by increasing the speed of the boxes to disapear and the number of it.</p>	
		<p id="text">If you understood the instructions, enter a username and press <mark class="important"><strong>"CONTINUE".</mark></strong></p><br>
	</section>
<!-- Finaliza Seccion de contenido -->
 
<!-- Empieza barra lateral -->
	<aside>
   <div class="imgcontainer">
        <img src="Images/win.png" alt="Avatar" class="avatar">
      </div>
      <form name='input' action='to_play.php' method='post'>
        <label class="label" for="uname"><b>Username</b></label>
        <?php 
          if (isset($user)) {
            echo "<input type=\"text\" value=\"$user\" placeholder=\"Enter Username\" name=\"username\" required><button type=\"submit\" id=\"button\">Continue</button>";
          }
          else{
            echo "<input type=\"text\" placeholder=\"Enter Username\" name=\"username\" required><button type=\"submit\" id=\"button\">Continue</button>";
          }
        ?>  
      </form>
      <form action="ranking.php">
        <button id="ranking" type="submit">Ranking</button>
      </form>
  	</aside>
<!-- Finaliza barra lateral -->
 
<!-- Empieza pie de pagina -->
	<footer>
		<p class="foot">Creator: Adrian Pradas - Carlos Jurado - Pablo Martin </p>
	</footer>
<!-- Empieza pie de pagina -->
 
</div>
</body>
</html>