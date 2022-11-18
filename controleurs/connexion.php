<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once("../modele/membre.php");
	require_once("../modele/bd.php");
	$bd=new Bd();
	$co=$bd->connexion();
	$pseudo = $_POST['pseudo'];
	$mdp = md5($_POST['mdp']);
	echo $mdp;
	$result  = mysqli_query($co,"SELECT membres_id FROM membres WHERE membres_pseudo = '$pseudo' AND membres_mdp = '$mdp'"); 
	if($row = mysqli_fetch_row($result)) {	
		$user=new Membre($co,$_POST['pseudo'],$_POST['mdp'], $row[0]);
		$user->connexion();
		header('Location: ../vues/espace_membre.php');
	}
	else {
		header('Location: ../index.php?err=1');
	}
?>
