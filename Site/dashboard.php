<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/TbD.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Dice Gather - naviguer sur le site</title>
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>
    <main>
        <h1>D A S H B O A R D</h1>
        <section id="liens">
            <a href="profilJoueur.php">Mon profil</div>
            <a href="messagerie.php">Messagerie</a>
            <a href="recherche.php">Recherche de rôliste</a>
            <a href="mesTables.php">Mes tables de jeu</a>
        </section>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
<script src="./js/header.js"></script>
</html>