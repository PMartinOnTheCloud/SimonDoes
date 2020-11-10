<?php session_start();

if(!empty($_SESSION['visited_pages'])) {
  $_SESSION['visited_pages']['prev'] = $_SESSION['visited_pages']['current'];
}else {
  $_SESSION['visited_pages']['prev'] = 'No previous page';
}
$_SESSION['visited_pages']['current'] = $_SERVER['REQUEST_URI'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>Ranking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/ranking.css">
    <audio id="BtM" preload="auto" src="Song/beep3.wav"></audio>

</head>
<body>
<div id="Header">
    <a class="Logo" href="index.php">SimonDoes</a>
    <button class="colorblind"  id="colorblind" onmouseover="myPlay()" onclick="">S<u>w</u>itch</button>
</div>
<h1 class="Ranking">TOP SCORERS</h1>
    <?php

    if (isset($_POST['SaveExit'])) {
    $username = $_SESSION['username'];
    $points = $_SESSION['points'];
    $filename = 'ranking.cfg';
    $numlines = sizeof(file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
    $fp = fopen($filename, 'a');
    if ($numlines == 0) {
        fwrite ($fp, $username.";".$points);
    } else {
        fwrite ($fp, "\n".$username.";".$points);
    }
    fclose ($fp);
    $_SESSION['points'] = 0;
    $_SESSION['level'] = 0;
    header("Location: ranking.php");
    }


        $file = "ranking.cfg";
        $listaPlayers = [];
        $playerandscore = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        for ($i= 0; sizeof($playerandscore)> $i; $i++) {
            $players = explode(';', $playerandscore[$i]);
            array_push($listaPlayers, $players);
        }
        
        usort($listaPlayers, function($a, $b) {
            return $b[1] <=> $a[1];
        });
 
    ?>

    <table id="tabla">
            <tr>
            <th></th>
            <th>Username</th>
            <th>Points</th>
            </tr>
            <?php
            $filename = 'ranking.cfg';
            $x = 0;
            $numlines = sizeof(file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
            if ($numlines != 0) {
                foreach ($listaPlayers as $key => $players) {
                    $x += 1;
                    echo "<tr>";
                    echo "<td>";
                    echo $x."º";
                    echo "</td>";
                    echo "<td>";
                    echo $players[0];
                    echo "</td>";
                    echo "<td>";
                    echo $players[1];
                    echo "</td>";
                    echo "</tr>";

                }
            }
            ?>
    </table>
<div class="footer">
    <p><?php if (isset($_SESSION['username'])) {
        echo "Welcome, ";
        $user = $_SESSION['username'];
        echo "$user";}?></p>
</div>
<script src="Song/sound.js"></script>
<script src="JS/hotkey_ranking.js" type="text/javascript"></script>
</body>
</html>