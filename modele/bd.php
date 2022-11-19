<?php 
class Bd {
	private $co;
	function getCo() {
		return $this->co;
	}
	function connexion() {
		$host = "localhost";
		$user = "david";
		$passwd = "david";
		$bdd = "petitchat";

		$this->co = pg_connect("host=$host dbname=$bdd user=$user password=$passwd");

		return $this->co;
	}
	function deconnexion($co) {
		mysqli_close($co);	
	}
}
?>