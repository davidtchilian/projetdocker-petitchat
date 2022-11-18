<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("../modele/bd.php");
	$bd=new Bd();
	$co = $bd->connexion();


	$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
	$mdp = htmlspecialchars(addslashes($_POST['mdp']));

	$mdp = md5($mdp);

	
	$sql = "INSERT INTO membres(membres_pseudo, membres_mdp) VALUES ('$pseudo', '$mdp')";
	// echo $sql;
	$result  = mysqli_query($co, $sql);
	header('Location: ../index.php?err=4');
?>
