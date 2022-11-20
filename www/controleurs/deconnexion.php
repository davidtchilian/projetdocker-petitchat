<?php
    require_once("../modele/membre.php");
    require_once("../modele/bd.php");
    session_start();
    // $_SESSION['utilisateur']->deconnexion();
    session_destroy();
    header('Location: ../index.php');
?>
