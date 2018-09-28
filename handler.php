<?php
	session_start();

	if(isset($_GET['user']) && $_GET['user']==1)
	{
		if($_SESSION['winner']=='none')
		{
			echo "Current Player: " . $_SESSION['currentPlayer'];
		}
		else if($_SESSION['winner']=='D')
		{
			echo "MATCH DRAW!";
		}
		else
		{
			echo "Player: " . $_SESSION['currentPlayer'] . " WINS";
		}
	}
	else if(isset($_GET['location']) && is_numeric($_GET['location']) && intval($_GET['location'])>=1 && intval($_GET['location'])<=9)
	{
		$x = $_SESSION['currentPlayer'];
		$_SESSION['pos' . $_GET['location']] = $x;
		$_SESSION['count'] = $_SESSION['count']+1;

		if((isset($_SESSION['winner']) && $_SESSION['winner']=='none'))
		{	
			if($x=='X')
			{
				echo "<span style='color: red'>" . $x . "</span>";				
			}
			else
			{
				echo "<span style='color: green'>" . $x . "</span>";	
			}


			$ws = "123456789147258369159357";

			$xWin = 0;
			$oWin = 0;

			for($i=0;$i<24;$i+=3)
			{
				if($_SESSION['pos' . $ws[$i]]=='X' && $_SESSION['pos' . $ws[$i+1]]=='X' && $_SESSION['pos' . $ws[$i+2]]=='X')
				{
					$xWin=1;
					break;
				}
				if($_SESSION['pos' . $ws[$i]]=='O' && $_SESSION['pos' . $ws[$i+1]]=='O' && $_SESSION['pos' . $ws[$i+2]]=='O')
				{
					$oWin=1;
					break;
				}
			}

			if($xWin==1)
			{
				$_SESSION['winner']='X';
				goto LOOTME;
			}
			else if($oWin==1)
			{
				$_SESSION['winner']='O';
				goto LOOTME;
			}
			else
			{
				if($_SESSION['count']==9)
				{
					$_SESSION['winner']='D';
				}
			}

			if($x=='X')
			{
				$_SESSION['currentPlayer']='O';
			}
			else
			{
				$_SESSION['currentPlayer']='X';
			}

		}
	}
	else
	{
		echo "Trying to be oversmart?";
		session_destroy();
		header('Location: index.php');
	}
	LOOTME:
?>