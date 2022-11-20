<?php 
class Bd {
	private $co;
	function getCo() {
		return $this->co;
	}
	function connexion() {
		$host = "localhost";
		$user = "postgres";
		$passwd = "";
		$bdd = "petitchat";

		$this->co = pg_connect("host=$host dbname=$bdd user=$user password=$passwd");

		return $this->co;
	}
	function deconnexion($co) {
		mysqli_close($co);	
	}
}
?>