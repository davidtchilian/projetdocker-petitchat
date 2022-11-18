<?php
	require "../modele/membre.php";
	session_start(); 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$name = $_SESSION['pseudo'];
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/bootstrap.css">
	<link rel="stylesheet" href="../style/a.css">
	<title>Chat</title>

</head>

<body>
	<div class="mt-4 container">
		<div class="container-fluid text-center">
			<h1>Bienvenue sur le chat
				<?php
					echo "$name, id : $id";
				?>
			</h1>
			</br>
			<form method="post" action="../controleurs/deconnexion.php" class="mb-2">
				<input class="btn btn-warning" type="submit" value="Vous déconnecter">
			</form>
			<form method="post" action="./chat.php" class="mb-5">
				<input class="btn btn-primary" type="submit" value="Rafraichir">
			</form>

			<div class="chatbox ">
				<a href="" style="float: right;"></a>
				<?php
				require_once("../modele/membre.php");
				require_once("../modele/bd.php");
				$bd = new Bd();
				$co = $bd->connexion();
				$result  = mysqli_query($co, "SELECT membres_id, messages_contenu, messages_id FROM messages ORDER BY messages_id");
				while ($row = mysqli_fetch_array($result)) {
					if ($row[0] == $_SESSION['id']) {
						echo "<button type='button' class='btn btn-success' style='float: right;'>";
						// echo "<p class='moi'>";
						echo "$row[1]";
						// echo "</p><br>";
						echo "</button><br><br>";
					}else{
						echo "<button type='button' class='btn btn-secondary' style='float: left;'>";
						echo "$row[1]";
						echo "</button><br><br>";
					}
				}
				?>
			</div>
		</div>
	</div>
<!-- Sauts de lignes pour que le bas du chat soit visible au dessus de la navbar -->
	<br><br><br><br>
	<div class="navbarsticky">
		<div class="container">
			<form class="form-inline mt-2 mb-2" action="../controleurs/message.php" method="POST">
				<div class="row">
					<input name="id" type="hidden" value="<?php echo $_SESSION['id'];?>">
					<div class="col-9">
						<input class="form-control" type="text" placeholder="Saisir le message" name="message">
					</div>
					<div class="col-3">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>
