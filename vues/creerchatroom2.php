<?php
session_start();
// var_dump($_POST);
$nbparticipants = (int)$_POST['nbparticipants'];
$nomchatroom = $_POST['nomchatroom'];
// echo "<br>nbparticipants : $nbparticipants type : ".gettype($nbparticipants);


require("../modele/bd.php");
$bd = new Bd();
$co = $bd->connexion();

$sqlchatroom = "SELECT nom FROM chatroom WHERE nom = '$nomchatroom'";
$result  = mysqli_query($co, $sqlchatroom);
if (mysqli_num_rows($result) > 0) {
	header('Location: ./creerchatroom1.php?err=1');
}



$sql = "SELECT membres_id, membres_pseudo FROM membres";
$res  = mysqli_query($co, $sql);
$users = NULL;
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    $users[] = $row;
}
// $users[i][0] id membre
// $users[i][1] pseudo membre

// var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/a.css">
    <title>Creer chatroom</title>
</head>

<body>
    <script>
        $(document).ready(function() {
            $("select").select2();
        });
    </script>
    <div class="container mt-4">
        <h1 class="text-center mb-3">Création d'une chatroom</h1>
        <form action="../controleurs/chatroom.php" method="POST">
            <input name="nomchatroom" type="hidden" value="<?php
                                        echo $_POST['nomchatroom'];
                                        ?>">
            <?php
            for ($i = 0; $i < $nbparticipants; $i++) {
                echo "
                    <div class='row mb-3'>
                        <select style='width:100%;' class='operator' name='select$i'>";
                for ($j = 0; $j < count($users); $j++) {
                    $idparticipant = $users[$j][0];
                    $pseudoparticipant = $users[$j][1];
                    echo "<option value='$idparticipant'>$pseudoparticipant</option>";
                }
                echo "
                        </select>
                    </div>";
            }
            ?>
            <div class="text-center">
                <input type="submit" value="Continuer" class="btn btn-success">
            </div>
        </form>
        <div class="text-center mt-3">
            <form action="espace_membre.php">
                <input type="submit" class="btn btn-danger" value="Annuler">
            </form>
        </div>

    </div>
</body>

</html>