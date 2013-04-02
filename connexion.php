<!DOCTYPE html public>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title> Test de connexion </title>
	</head>
	
	<body>
	
	<h1> connexion </h1>
	
<?php
$p = new PDO('mysql:host=localhost; dbname=bardet1u', "bardet1u", "rowling54");

?>
<?php
	$res = $p->query("SELECT nom from test;");
	$res->setFetchMode(PDO::FETCH_OBJ);
	
	foreach ($res as $f){
		echo $f->nom . "<br>";
	}
	
	$p = null;
?>

	</body>
	
</html>


