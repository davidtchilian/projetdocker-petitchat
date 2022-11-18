<?php 
class Bd {
	private $co;
	function getCo() {
		return $this->co;
	}
	function connexion() {
		$host = "localhost";
		$user = "root";
		$passwd = "";
		$bdd = "petitchat";

		$this->co = mysqli_connect($host , $user , $passwd, $bdd) or die("erreur de connexion");

		return $this->co;
	}
	function deconnexion($co) {
		mysqli_close($co);	
	}
}
?>