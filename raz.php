<?php
	//un setcookie avec un seul paramètre entraine la destruction du cookie
	setcookie('highscore');
	setcookie('nom');
	header("Location: index.php");
?>