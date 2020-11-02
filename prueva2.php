<?php
    $fileRanking = fopen("ranking.cfg", "rb");
    $dataRanking = [];
    while (!feof($fileRanking) ) {
    	// leer la fila del archivo
        $row = fgets($fileRanking);
        $index = count($dataRanking);

        // explotar matriz por (;)
        $dataRanking[$index] = explode(';', $row);

        // Desglosar datos [$ index] [0] por ';', luego insertarlos en la matriz en los índices 0 y 1
        array_splice($dataRanking[$index], 0, 1, explode(';', $dataRanking[$index][0]));
    }

    // ordenar matriz por índice de matriz 1
    usort($dataRanking, function ($prev, $next) {
        if ($prev[1] == $next[1]) {
            return 0;
        }
        return ($prev[1] > $next[1]) ? -1 : 1;
    });

    // cerrar fichero
    fclose($fileRanking);
?>
<h1>Ranking</h1>
<table id="tabla">
    <thead>
        <tr>
            <th>Username</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataRanking as $item): ?>
            <tr>
                <td><?= $item[0] ?></td>
                <td><?= $item[1] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
?> 