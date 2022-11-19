<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/a.css">
    <title>Creer chatroom</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-3">Création d'une chatroom</h1>
        <form action="creerchatroom2.php" method="POST">
            <div class="row mb-3">
                <div class="col">
                    <input name="nomchatroom" type="text" class="form-control" placeholder="Nom de la chatroom" required>
                </div>
                <div class="col">
                    <input name="nbparticipants" type="number" class="form-control" placeholder="Nombre de participants au total" required>
                </div>
            </div>
            <div class="text-center">
            <input type="submit" value="Continuer" class="btn btn-success">
            </div>
        </form>
        <div class="text-center mt-3">
            <form action="espace_membre.php">
                <input type="submit" class="btn btn-danger" value="Annuler">
            </form>
        </div>
        <?php
            if(isset($_GET['err'])){
                switch ($_GET['err']) {
                    case '1':
                        echo '
                            <div class="alert alert-danger mt-3" role="alert">
                                Une chatroom existe déjà avec ce nom !
                            </div>';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
        ?>
    </div>
</body>
</html>