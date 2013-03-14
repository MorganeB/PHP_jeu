<?php
	session_start();
	
	//maj score
	if(isset($_COOKIE['highscore'])){
		if($_COOKIE['highscore'] < $_SESSION['scoregen'])
			setcookie('highscore', $_SESSION['scoregen'], time() + 3600 * 24 * 365 * 10);
	}else{
			setcookie('highscore', $_SESSION['scoregen'], time() + 3600*24*365*10);	
	}
		
	//maj nom user
	setcookie('nom', $_SESSION[nom], time() + 3600*24*365*10);
	
	//ménage
	unset($_SESSION['tour']);
    unset($_SESSION['nom']);
    unset($_SESSION['scoregen']);
	header("Location: index.php");
?>