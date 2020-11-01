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
        $DatosRanking = fopen("ranking.cfg", "r");
        $listaPlayers = [];
        while(!feof($DatosRanking)) {
            $SetPlayers = fgets($DatosRanking);
            $players = explode(';', $SetPlayers);
            array_push($listaPlayers, $players);
        }
        fclose($DatosRanking);
    ?>
    <div class ="ranking">
    	<table id="tabla">
            <th>Username</th>
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
	</div>
<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
