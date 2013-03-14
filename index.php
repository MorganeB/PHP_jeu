<!DOCTYPE HTML PUBLIC>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title> Jeu de dés </title>
	</head>
	
	<body>
	
	<form action="jeu.php" method="post">
		<h3>Entrer votre nom </h3><br>
	<?php
		if(isset($_COOKIE['nom']))
			echo '<input type="text" name="nom" value=" ' . $_COOKIE['nom'] . '"/>';
		else
			echo '<input type="text" name="nom"/>';
	?>
		
		<br><br>
			
	<?php
	if(isset($_COOKIE['highscore']))
		echo "Meilleur score : " . $_COOKIE['highscore'];
	else
		echo "Pas de meilleur score";
	?>	
	
	
	<h3>Cliquez pour lancer les d&eacute;s </h3>
		<form action = "jeu.php" method="post">
			<input type="submit" value="C'est parti !" name="lancers" />
		</form>
		
	<h3>Réinitialiser le meilleur score : </h3>
		<form action = "raz.php" method="post">
			<input type="submit" value = "Ok" name = "reset" />
		</form>
	
	
	</body>
	
</html>