<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css recupéré de la page profil et recherche pour gagner du. Certains Id ont des noms étranges pour cette raison -->
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css"> 
    <title>DiceGather</title>
</head>
<body>

<header>
        <?php include('./include/header_signedIn.inc.php'); ?>
</header>

<main>
        <!-- Squelette des blocs créés lorsque la BdD détecte une table de jeu lié à l'utilisateur -->
        <section id="profile-recherche">
            <h1>Recherche</h1>
            <div class="profile-pic-container">
                <!-- Récupérer l'URL de l'image déjà uploadé dans la BdD -->
                <img src="./assets/img/profile2.jpg" alt="Profile picture" id="profile-picture">
            </div>
    
        <div id="infos-profile">
            <div class="container">
                <h1>*Nom De la table*</h1>
                <div id="nomMJ">
                    <label for="mj">MJ :</label>
                    <p id="mj">Nom du MJ</p>
                </div>
            </div>
    
            <div class="container">
                <label for="system">Système de jeu :</label>
                <p id="system">Warhammger Age of Sigmar</p>
            </div>
    
            <div class="container">
                <label for="city">Ville :</label>
                <p id="city">Avignon</p>
            </div>
    
            <div id="Joueurs-container">
                <label for="Joueurs"> Les joueurs :</label>
                <div id="Joueurs">
                    <p class="joueur">Nom du J1</p>
                    <p class="joueur">Nom du J2</p>
                    <p class="joueur">Nom du J3</p>
                    <p class="joueur">Nom du J4</p>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <?php include('./include/footer.inc.php'); ?>
</footer>

</body>
</html>