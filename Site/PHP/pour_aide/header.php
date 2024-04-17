<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Messagerie interne</title>
    </head>
    <body>
        <header class="container-fluid bg-dark text-white">
            <div class="brand">Messagerie</div>
            <nav>
                <ul class="navbar-nav bg-darks">

                    <li class="nav-item">
                        <a href="./" class="nav-link">Accueil</a>
                    </li>

                    <?php
                        if (isset($_SESSION["user"])) {

                    ?>

                    <li class="nav-item">
                        <a href="connexion.php" class="nav-link">Connexion</a>
                    </li>

                    <li class="nav-item">
                        <a href="inscription.php" class="nav-link">Créer un compte</a>
                    </li>

                    <?php 
                        } else {

                    ?>

                    <li class="nav-item">
                        <a href="deconnexion.php" class="nav-link">Se déconnecter</a>
                    </li>

                    <?php
                        }
                    ?>


                </ul>
            </nav>
        </header>