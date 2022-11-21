<?php 

	$host = "database";
	$user = "docker";
	$passwd = "docker";
	$bdd = "petitchat";
	$port = "5432";

	$co = pg_connect("host=$host dbname=$bdd user=$user password=$passwd port=$port");

?>