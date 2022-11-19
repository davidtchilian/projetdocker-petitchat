<?php

$DBuser = 'docker';
$DBpass = $_ENV['POSTGRES_ROOT_PASSWORD'];
$pdo = null;

try{
    $database = 'postgres:host=database:5432';
    $pdo = new PDO($database, $DBuser, $DBpass);
    echo "Success: A proper connection to postgres was made! The docker database is great.";    
} catch(PDOException $e) {
    echo "Error: Unable to connect to postgres. Error:\n $e";
}

$pdo = null;