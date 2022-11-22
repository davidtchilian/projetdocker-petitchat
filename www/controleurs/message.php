<?php
    $message = addslashes($_POST['message']);
    $id = $_POST['id'];
	$idroom = $_POST['roomid'];
    require_once("../modele/membre.php");
	require_once("../modele/bd.php");
    $sql = "INSERT INTO messages (membres_id, messages_contenu, chatroom_id) VALUES ({$id}, '{$message}', {$idroom})";
	if(pg_query($co, $sql)) {	
		header('Location: ../vues/chatt.php?roomid='.$idroom);
		exit(1);
	}
	else {
		header('Location: ../index.php?err=2');
		exit(1);
	}
?>