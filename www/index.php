<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Connexion</title>
</head>

<body>
    <div class="mt-4 container">
        <div class="row justify-content-md-center mt-5">
            <h1 class="text-center mb-5">PetitChat</h1>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Se connecter</div>
                    <div class="card-body">
                        <form method="post" id="login_form" action="controleurs/connexion.php">
                            <div class="form-group">
                                <label>Entrez votre pseudo</label>
                                <input type="text" name="pseudo" id="user_email" class="form-control" data-parsley-type="email" required />
                            </div>
                            <div class="form-group mb-3">
                                <label>Entrez votre mot de passe</label>
                                <input type="password" name="mdp" id="user_password" class="form-control" required />
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="login" id="login" class="btn btn-primary" value="Login" style="width: 70px;"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="./vues/inscription.php" class="text-center mt-4">
            <input type="submit" value="Inscription" class="btn btn-success" style="width: 100px;">
        </form>
    </div>
    <div class="container mt-5">
        <?php
        if (isset($_GET['err'])) {
            switch ($_GET['err']) {
                case '1':
                    echo '<div class="alert alert-danger" role="alert">
                    Mauvais Identifiant !
                  </div>';
                    break;
                case '2':
                    echo '<div class="alert alert-danger" role="alert">
                    Probleme de requete sur la base de données !
                  </div>';
                    break;
                case '3':
                    echo '<div class="alert alert-danger" role="alert">
                    Vous n\'êtes pas connecté !
                  </div>';
                case '4':
                    echo '<div class="alert alert-success" role="alert">
                    Votre compte a été créé !
                  </div>';
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