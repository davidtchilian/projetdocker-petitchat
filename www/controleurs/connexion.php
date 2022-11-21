<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("../modele/membre.php");
	require_once("../modele/bd.php");
	$pseudo = $_POST['pseudo'];
	$mdp = md5($_POST['mdp']);
	$sql = "SELECT membres_id FROM membres WHERE membres_pseudo = '$pseudo' AND membres_mdp = '$mdp'";
	$result = pg_query($co, $sql);
	$row = pg_fetch_row($result);

	if (count($row) == 1) {
		$user=new Membre($_POST['pseudo'],$_POST['mdp'], $row[0]);
		$user->connexion();
		header('Location: ../vues/espace_membre.php');
		exit(1);

	} else {
		header("Location: ../index.php?err=1");
		exit(1);
	}
?>
