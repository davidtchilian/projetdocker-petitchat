<?php
session_start();
if (!isset($_SESSION['id'])) {
	header('Location: ../index.php?err=3');
}else {
	$id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/bootstrap.css">
	<title>Espace membre</title>

</head>

<body>


	<div class="mt-4 container">
		<div class="container-fluid text-center">
			<h1>Bienvenue dans votre espace membre !</h1>
		Vous pouvez : </br>
		<!-- <input class="btn" type="button" value="Modifier votre mot-de-passe"> -->
		
		<?php
			require("../modele/bd.php");
			$bd = new Bd();
			$co = $bd->connexion();
			$result  = mysqli_query($co, "SELECT membres_id, chatroom_id, nom FROM estdanschatroom NATURAL JOIN chatroom WHERE membres_id = $id");
			while ($row = mysqli_fetch_array($result)) {
				$nom = $row[2];
				$roomid = $row[1];
				echo "
				<form action=\"./chatt.php\" method=\"get\">
					<input type='hidden' name='roomid' value='$roomid'>
					<input type='submit' value='Chatroom $nom' class='btn btn-warning'>
				</form>
				";
			}
		?>
		<!-- <form action="chat.php" class="mt-2">
			<input type="submit" value="Accéder au chat" class="btn btn-primary">
		</form> -->
		<form action="creerchatroom1.php" method="get" class="mt-2">
			<input type="submit" value="Créer une salle de discussion" class="btn btn-success">
		</form>
		<form method="post" action="../controleurs/deconnexion.php" class="mt-2">
			<input class="btn btn-danger" type="submit" value="Vous déconnecter">
		</form>
	</div>
</div>
<div class="container mt-5">
        <?php
        if (isset($_GET['err'])) {
            switch ($_GET['err']) {
                case '1':
                    echo '<div class="alert alert-danger" role="alert">
                    Vous n\'êtes pas autorisé a accéder a cette room !
                  </div>';
                    break;
                case '2':
                    echo '<div class="alert alert-danger" role="alert">
                    Probleme de requete sur la base de données !
                  </div>';
                    break;
                default:
                    // code...
                    // au cas ou on veut mettre un autre message d'erreur ou quoi
                    break;
            }
        }
        ?>
    </div>
</body>
</html>