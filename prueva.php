
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