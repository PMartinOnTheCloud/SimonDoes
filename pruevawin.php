<!DOCTYPE html>
<html>
<head>
	<title>PruevaWin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<LINK REL="stylesheet" TYPE="text/css" HREF="CSS/pruevaWin.css">
</head>
<body>
	<div class="container">

		<div id="header">
			<a class="Logo">SimonDoes</a>
			<div class="header-right">
				<a class="active" href="index.php">Home</a>
			</div>
		</div>

		<div id="win">
			<div class="win">
				<p> YOU'VE WON </p>
				<img src="Images/win.png">
			</div>
			
			<div class="user"> 
				<p>Username:</p>
			</div>

			<div class="relative">
				<div class="opcoes">
					<form method="post" action="to_play.php">
						<div class="item"><button class="TryAgain" name="RetryWin" id="TryAgain" type="Submit">Try Again</button></div>
					</form>
				</div>

				<div class="opcoes">
					<form method="post" action="ranking.php">
						<div class="item"><button class="SaveExit" id="SaveExit" name="saveandexit" type="Submit">Save/Exit</button></div>
					</form>
				</div>

				<div class="opcoes">
					<form method="post" action="to_play.php">
						<div class="item"><button class="NextLevel" id="NextLevel" name="Winpoints" type="Submit">Next Level</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>