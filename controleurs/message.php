<?php
    $message = addslashes($_POST['message']);
    $id = $_POST['id'];
	$idroom = $_POST['roomid'];
    require_once("../modele/membre.php");
	require_once("../modele/bd.php");
	$bd=new Bd();
	$co=$bd->connexion();
    $sql = "INSERT INTO messages (membres_id, messages_contenu, chatroom_id) VALUES ({$id}, '{$message}', {$idroom})";
	if(mysqli_query($co, $sql)) {	
		header('Location: ../vues/chatt.php?roomid='.$idroom);
	}
	else {
		header('Location: ../index.php?err=2');
	}
?>