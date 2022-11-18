<?php
    session_start();
    var_dump($_POST);
    $nomchatroom = $_POST['nomchatroom'];
    echo $nomchatroom."<br>";
    unset($_POST['nomchatroom']);
    var_dump($_POST);


    require("../modele/bd.php");
    $bd = new Bd();
    $co = $bd->connexion();

    $sql = "INSERT INTO chatroom(nom) VALUES('$nomchatroom')";
    $result  = mysqli_query($co, $sql);
    
    foreach ($_POST as $mid){
        $sql = "INSERT INTO estdanschatroom(membres_id, chatroom_id)
        SELECT $mid, chatroom_id FROM chatroom WHERE nom = '$nomchatroom'";
        // echo $sql."<br>";
        $result  = mysqli_query($co, $sql);
    }
    header("Location: ../vues/espace_membre.php");
?>
