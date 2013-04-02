<?php
	session_start();
	
		//connexion à la base 
		 $p = new PDO('mysql:host=localhost; dbname=jeu', "root", ""); 
		 $p->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		 
		 
	//maj score
	if(isset($_COOKIE['highscore'])){
		if($_COOKIE['highscore'] < $_SESSION['scoregen'])
			setcookie('highscore', $_SESSION['scoregen'], time() + 3600 * 24 * 365 * 10);
	}else{
			setcookie('highscore', $_SESSION['scoregen'], time() + 3600*24*365*10);
		
	}
	
	//maj du score dans la base
		//preparation requete 
		
		$req = "INSERT INTO jeu (user_name, score) VALUES " . "(\"{$_SESSION['nom']}\", {$_SESSION['scoregen']});";
		$maj = $p->exec($req);

		
		
	//maj nom user
	setcookie('nom', $_SESSION[nom], time() + 3600*24*365*10);
	
	//ménage
	unset($_SESSION['tour']);
    unset($_SESSION['nom']);
    unset($_SESSION['scoregen']);
	header("Location: index.php");

?>