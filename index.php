<!DOCTYPE HTML PUBLIC>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Jeu de dés </title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
		<?php //connexion à la base 
		 $p = new PDO('mysql:host=localhost; dbname=jeu', "root", "");

		?>
	<div id="header">	
		<h1>Jeu de dés </h1><br>
	</div>
	<div id="global">
		<form action="jeu.php" method="post">
			<h3>Entrer votre nom </h3>
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
			</form><br>
			
		<h3>Réinitialiser le meilleur score : </h3>
			<form action = "raz.php" method="post">
				<input type="submit" value = "Ok" name = "reset" />
			</form>
		
		
		<h3>Meilleurs scores </h3>
		<table border="2">
			<tr>
				<td>Joueur</td>
				<td>Score</td>
				<td>Date</td>
			</tr><br>
		<?php
		$offset = $_GET['offset'];
		
		$req_total = $p->query("SELECT COUNT(*) as total from jeu;");
		$n = $req_total->fetch(PDO::FETCH_OBJ)->total;
		
		$scores = $p->query("SELECT * from jeu order by score desc;");
		$scores->setFetchMode(PDO::FETCH_OBJ);
		
		//$i = $offset +1;
		foreach($scores as $s){
			echo"<tr>
				<td>$s->user_name</td>
				<td>$s->score</td>
				<td>$s->date</td>
				</tr>";
				$i ++;
		}
		?>
		</table>

	</div>
	</body>
	
</html>












