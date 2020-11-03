<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Ranking</title>
	<link rel="stylesheet" type="text/css" href="CSS/SimonDoes.css">
	<link rel="stylesheet" type="text/css" href="CSS/ranking.css">
</head>
<body>
<div class="header">
	<a class="Logo">SimonDoes</a>
	<div class="header-right">
		<a class="active" href="index.php">Home</a>
	</div>
</div>
<h1>Ranking</h1>
    <?php

    if (isset($_POST['saveandexit'])) {
    $username = $_SESSION['username'];
    $points = $_SESSION['points'];
    $filename = 'ranking.cfg';
    $numlines = sizeof(file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
    $fp = fopen($filename, 'a');
    if ($numlines = 0) {
        fwrite ($fp, $username.";".$points);
    } else {
        fwrite ($fp, "\n".$username.";".$points);
    }
    fclose ($fp);
    $_SESSION['points'] = 0;
    $_SESSION['level'] = 0;
}







        $file = fopen("ranking.cfg", "r");
        $listaPlayers = [];
        while(!feof($file)) {
            $ConjuntoPlayers = fgets($file);
            $players = explode(';', $ConjuntoPlayers);
            array_push($listaPlayers, $players);
        }
        
    	// ordenar matriz por índice de matriz 1
        usort($listaPlayers, function ($prevplayer, $nextplayer) {
        if ($prevplayer[1] == $nextplayer[1]) {
            return 0;
        }
        return ($prevplayer[1] > $nextplayer[1]) ? -1 : 1;
    });
        fclose($file);
    ?>

    <table id="tabla">
            <th>UserName</th>
            <th>Points</th>
            <?php
            	foreach ($listaPlayers as $key => $players) {
                	echo "<tr>";
                	echo "<td>";
                	echo $players[0];
                	echo "</td>";
                	echo "<td>";
                	echo $players[1];
                	echo "</td>";
                	echo "</tr>";
            	}
            ?>
    </table>
<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
<script src="JS/hotkey_ranking.js" type="text/javascript"></script>
</body>
</html>
