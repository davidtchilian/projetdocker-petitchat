<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>
<?php
class Membre {
	public $id;
	public $pseudo;
	public $motdepasse;

	function __construct($pseudo,$motdepasse, $id) {
		$this->pseudo=$pseudo;
		$this->motdepasse=$motdepasse;
		$this->id=$id;
	}

	public function connexion() {
		session_start();
		$_SESSION['utilisateur']=$this;
		$_SESSION['pseudo'] = $this->pseudo;
		$_SESSION['id'] = $this->id;
	}
	public function modif_mdepasse($motdepasse) {
		mysqli_query($this->co,"UPDATE membres SET membres_mdp='".$motdepasse."' WHERE membres_pseudo='".$this->pseudo."' AND membres_mdp='".$this->motdepasse."'");
		$this->motdepasse=$motdepasse;
	}
}
?>
