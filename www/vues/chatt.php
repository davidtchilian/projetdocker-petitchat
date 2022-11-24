<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$idchatroom = 0;
if (!isset($_SESSION['id'])) {
	header('Location: ../index.php');
} else {
	$id = $_SESSION['id'];
}

if (!isset($_GET['roomid'])) {
	header('Location: ./espace_membre.php?err=1');
} else {
	$idchatroom = $_GET['roomid'];
}

require("../modele/bd.php");
$sql = "SELECT DISTINCT membres_id FROM estdanschatroom WHERE chatroom_id = $idchatroom AND membres_id = $id";
$res  = pg_query($co, $sql);
$row = pg_fetch_row($res);
if (count($row) > 0) {
	$name = $_SESSION['pseudo'];
} else {
	header('Location: ./espace_membre.php?err=1');
}

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
	<script type="text/javascript">
		function toBottom() {
			window.scrollTo(0, document.body.scrollHeight);
		}
		window.onload = toBottom;
	</script>
	<div class="mt-4 container">
		<div class="container-fluid text-center">
			<h1>Bienvenue sur le chat
				<?php
				echo "$name, id : $id";
				?>
			</h1>
			</br>
			<form method="post" action="../controleurs/deconnexion.php" class="mb-2">
				<input class="btn btn-warning" type="submit" value="Se déconnecter">
			</form>

			<div class="chatbox" id="messages_area">
				<a href="" style="float: right;"></a>
				<?php

				$result  = pg_query($co, "SELECT membres_id, messages_contenu, messages_id 
											  FROM messages WHERE chatroom_id = $idchatroom ORDER BY messages_id");
				while ($row = pg_fetch_array($result)) {
					if ($row[0] == $_SESSION['id']) {
						echo "<button type='button' class='btn btn-success btnright'>";
						echo "$row[1]";
						echo "</button><br><br>";
					} else {
						echo "<button type='button' class='btn btn-secondary btnleft'>";
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
			<form class="form-inline mt-2 mb-2" action="../controleurs/message.php" method="POST" id="envoi" onsubmit="sendMsg()">
				<div class="row">
					<input name="id" type="hidden" value="<?php echo $_SESSION['id']; ?>" id="membres_id">
					<input type="hidden" name="roomid" value="<?php echo $idchatroom ?>" id="chatroom_id">
					<div class="col-9">
						<input class="form-control" type="text" placeholder="Saisir le message" name="message" id="message_contenu">
					</div>
					<div class="col-3">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script>
	var conn = new WebSocket('ws://localhost:8080');

	conn.onmessage = function(e) {
		console.log(e.data);
		const object = JSON.parse(e.data);
		const message = object.message;
		let btn = document.createElement("button");
		btn.innerHTML = message;
		btn.className += "btn btn-secondary btnleft";
		var chatbox = document.getElementById("messages_area");
		chatbox.appendChild(btn);
		let br = document.createElement("br");
		chatbox.appendChild(br);
		chatbox.appendChild(br);
		document.location.reload;
	};

	function sendMsg() {
		var data = {
			membres_id: document.getElementById("membres_id").value,
			message: document.getElementById("message_contenu").value,
			chatroom_id: document.getElementById("chatroom_id").value
		};
		console.log(data);
		conn.send(JSON.stringify(data));
	}
</script>

</html>