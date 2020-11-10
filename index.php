<?php session_start();
   if (isset($_SESSION["username"])){
        $user = $_SESSION['username'];
    }
if(!empty($_SESSION['visited_pages'])) {
  $_SESSION['visited_pages']['prev'] = $_SESSION['visited_pages']['current'];
}else {
  $_SESSION['visited_pages']['prev'] = 'No previous page';
}
$_SESSION['visited_pages']['current'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <LINK REL="stylesheet" TYPE="text/css" HREF="CSS/Index.css">
  <script src="JS/ColorSwith.js"></script>
  <audio autoplay id="myautoload">
    <source src="Song/ranking.mp3" type="audio/mpeg">
    </audio>
  <audio id="BtM" preload="auto" src="Song/beep3.wav"></audio>
</head>
 
<body>
    <!-- Start Header -->
    <div class="Header">
      <h1 class="Logo">Welcome to Simon Does</h1>
      <button id="colorblind" onclick="myFunction()" onmousedown="bleep.play()">S<u>w</u>itch</button>
    </div>
    <!-- End Header -->

    <!-- Start Explanation -->
    <section class="Main">
      <p id="text">To start the game you just need to input a USERNAME and then press the CONTINUE button.</p>
      <p id="text"><mark class="important">NOTE:</mark> You can introduce a level code to get to that level automatically.</p>
      <p id="text">When you enter a level a game board will appear, and a START button next to it.</p>
      <p id="text">After clicking it a few boxes will light up and then fade.</p>
      <p id="text">To complete the level you need to click the boxes that were lighted up and click the button check.</p>
      <p id="text">But <mark class="incorrect">BE CAREFULL.</mark> If you mark a single incorrect box, <mark class="incorrect">you will lose the game.</mark></p>
      <p id="text">If you <mark class="correct">PASS A LEVEL</mark> you will get to the next level that has increased difficulty.</p>
      <br>
      <form class="Form" name='input' action='to_play.php' method='post'>
        <input type="checkbox" id="liarbutton" name="liarmode" value="liarmode">
        <label class="checklabel" for="liarbutton">'<u>L</u>iar' Mode</label>
        <input type="checkbox" id="survivalbutton" name="survivalmode" value="survivalmode">
        <label class="checklabel" for="survivalbutton"><u>S</u>urvival Mode</label>
    </section>
    <!-- Ends Explanation -->

    <!-- Starts Form -->
    <aside>
      <div class="imgcontainer">
        <label class="label" for="uname" >Code Level</label> 
        <input type="text" id="inputlevel" placeholder="Enter Code" name="codelevel"> 
        <img src="Images/win.png" alt="Avatar" class="avatar">
      </div>
        <label class="label" for="uname">Username</label>
        <?php 
          if (isset($user)) {
            echo "<input type=\"text\" value=\"$user\" name=\"username\" required><button type=\"submit\" id=\"button\" onmousedown=\"bleep.play()\"><u>C</u>ontinue</button>";
          }
          else{
            echo "<input type=\"text\" placeholder=\"Enter Username\" name=\"username\" required><button type=\"submit\" id=\"button\" onmousedown=\"bleep.play()\">Continue</button>";
          }
        ?>  
    </form>
      <form action="ranking.php">
        <button class="ranking" id="ranking" type="submit" onmousedown="bleep.play()"><u>R</u>anking</button>
      </form>
    </aside>
    <!-- Ends Form -->
  <footer>
    <p>Carlos Jurado · Pablo Martin · Adrian Pradas</p>
  </footer>
<script src="Song/sound.js"></script>
<script src="JS/hotkey_index.js" type="text/javascript"></script>
</body>
</html>