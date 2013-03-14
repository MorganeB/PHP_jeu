<?php
session_start();

include("tools.php");

if (!empty($_POST['nom']) || isset($_SESSION['tour'])) {

  if (!isset($_SESSION['tour'])) {
    $_SESSION['tour'] = 1;
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['scoregen'] = 0;
  }
  else
    $_SESSION['tour']++;

  enteteTitreHTML("Jeu de dés !");

  echo "Partie de : " . $_SESSION['nom'] . "<br />";
  echo "Score partie actuelle : " . $_SESSION['scoregen'] . "<br />";
  echo "Tour actuel : " . $_SESSION['tour'] . "<br /><br />";
  
  $de1 = rand(1, 6);
  $de2 = rand(1, 6);
    
  echo "Valeur du dé 1 : $de1<br />";
  echo "Valeur du dé 2 : $de2<br />";

  $total = $de1 + $de2;

  if ($total == 7)
    $scoretour = 10;
  else
    $scoretour = 0;

  $_SESSION['scoregen'] = $_SESSION['scoregen']+ $scoretour;
  echo "Total des deux dés : $total<br /><br />";
  echo "Score du tour courant : $scoretour<br />";
  echo "Nouveau score de la partie : " . $_SESSION['scoregen'] . "<br /> <br />";
	?>
	
		<form action = "jeu.php" method="post">
			<input type="submit" value="Continuer" name="lancers" />
		</form>
	<br>	
<?php		
echo "tour " . $_SESSION['tour'] ;

  if ($_SESSION['tour'] = 10) {
    echo "<br />Score final :" . $_SESSION['scoregen'] . "<br /> <br />";
    echo "<a href=\"fin.php\">Finir la partie</a>";
  }
  else
    echo "<a href=\"jeu.php\">Tour suivant</a>";
}
else {

  // Je ne viens pas de la page d'accueil
  header("Location: index.php");
}

finHTML();
?>
