<?php 
	require_once("../modele/bd.php");

	$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
	$mdp = htmlspecialchars(addslashes($_POST['mdp']));

	$mdp = md5($mdp);

	
	$sql = "INSERT INTO membres(membres_pseudo, membres_mdp) VALUES ('$pseudo', '$mdp')";
	$result  = pg_query($co, $sql);
	header('Location: ../index.php?err=4');
	exit(1);
?>
