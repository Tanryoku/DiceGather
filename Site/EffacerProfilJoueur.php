<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css">
    <title>DiceGather - Effacer son compte</title>
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>

    <main>
    <h1 class="h1White">Êtes-vous sûr de vouloir effacer votre compte ?</h1>
    <button id="EffacerOui" class="lienForm">Oui</button>
    <a href="profilJoueur.php" class="lienForm">Non</a>
    </main>

    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
</html>