<?php
	//un setcookie avec un seul param�tre entraine la destruction du cookie
	setcookie('highscore');
	setcookie('nom');
	header("Location: index.php");
?>