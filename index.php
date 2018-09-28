<?php 
	session_start();
	$i = random_int(1, 2);
	if($i==1)
	{
		$_SESSION['currentPlayer'] = 'X';
	}
	else
	{
		$_SESSION['currentPlayer'] = 'O';
	}

	for($j=0;$j<9;$j++)
	{
		$_SESSION['pos' . ($j+1)]='_';
	}

	$_SESSION['count'] = 0;
	$_SESSION['winner'] = 'none';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tic-Tac-Toe</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Yatra One' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
<body>

	<div id="main">
		<div id="ticTacToeContainer">
			<table class="table">
				<tbody>
					<?php
						$counter = 1;
						for($i=0;$i<3;$i++)
						{
							echo '<tr style="height: 100px;">';
							for($j=0;$j<3;$j++)
							{
								echo '<td data-id=' . ($counter++) . ' class="cell"></td>';
							}
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
		<div id="bottomBar">
			<div style="position: absolute; bottom: 0; left: 0; margin-left: 15px; margin-bottom: 5px;">
				<span id='info'>Current Player: <?php echo $_SESSION['currentPlayer'] ?><span>
			</div>
			<div>
				<button class="btn btn-link" onclick="window.location.href='./index.php'" style="justify-content: center; width: 36px; height: 36px; position: absolute; bottom: 0; right: 0; margin-right: 15px; margin-bottom: 5px; border-radius: 50%;"><i class="material-icons">refresh</i></button>
			</div>
		</div>
	</div>


	<div id="particles-js"></div>
	<script type="text/javascript" src="./js/particles-bundle.js"></script>
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
</body>
</html>