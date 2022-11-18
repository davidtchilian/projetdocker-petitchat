<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/a.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-3">Inscription</h1>
        <form action="../controleurs/inscription.php" method="POST">
            <div class="row mb-3">
                <input name="pseudo" type="text" class="form-control" placeholder="Pseudonyme" required>
            </div>
            <div class="row mb-3">
                <input name="mdp" type="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="text-center">
                <input type="submit" value="S'inscrire" class="btn btn-success">
            </div>
        </form>
        <div class="text-center mt-3">
            <form action="../index.php">
                <input type="submit" class="btn btn-danger" value="Annuler">
            </form>
        </div>
        <?php
            if(isset($_GET['err'])){
                switch ($_GET['err']) {
                    case '1':
                        echo '
                            <div class="alert alert-danger mt-3" role="alert">
                                Une utilisateur existe déjà avec ce nom !
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