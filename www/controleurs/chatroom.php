<?php
    session_start();
    $nomchatroom = $_POST['nomchatroom'];
    unset($_POST['nomchatroom']);

    require("../modele/bd.php");

    $sql = "INSERT INTO chatroom(nom) VALUES('$nomchatroom')";
    $result  = pg_query($co, $sql);
    $memberids = array();
    foreach ($_POST as $mid){
        if (in_array($mid, $memberids)) continue;
        $sql = "INSERT INTO estdanschatroom(membres_id, chatroom_id)
        SELECT $mid, chatroom_id FROM chatroom WHERE nom = '$nomchatroom'";
        $result  = pg_query($co, $sql);
        $memberids[] = $mid;
    }
    header("Location: ../vues/espace_membre.php");
    exit(1);
?>
