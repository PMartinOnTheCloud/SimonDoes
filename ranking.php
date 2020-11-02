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
		<a class="active" href="index.php" accesskey="h">Home</a>
	</div>
</div>
<h1>Ranking</h1>
    <?php
        $file = fopen("ranking.cfg", "r");
        $listaPlayers = [];
        while(!feof($file)) {
            $ConjuntoPlayers = fgets($file);
            $players = explode(';', $ConjuntoPlayers);
            array_push($listaPlayers, $players);
        }

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
</body>
</html>
