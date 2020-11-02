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
<?php
    $fileRanking = fopen("ranking.cfg", "rb");
    $dataRanking = [];
    while (!feof($fileRanking) ) {
        $row = fgets($fileRanking);
        $index = count($dataRanking);
        $dataRanking[$index] = explode(';', $row);
        array_splice($dataRanking[$index], 0, 1, explode(';', $dataRanking[$index][0]));
    }
    usort($dataRanking, function ($prev, $next) {
        if ($prev[1] == $next[1]) {
            return 0;
        }
        return ($prev[1] > $next[1]) ? -1 : 1;
    });
    fclose($fileRanking);
?>
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
	</div>
<div class="footer">
	<p>Welcome, <?php
		$user = $_SESSION['username'];
		echo "$user";?></p>
</div>
</body>
</html>
