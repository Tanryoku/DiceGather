<?php




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Dice Gather</title>
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <form action="" method="POST" id="modifForm">

            <div id="profile-table">

                <div class="img-container">
                <label for="profile-pic" class="profile-pic">
                    <img src="placeholder-image.jpg" alt="Profile Picture">
                    <input type="file" id="profile-pic" accept="image/*">
                </label>

                    <label for="tableAvatar">Image de profil</label>
                </div>

                <div id="profile-table-droite">
                    <input type="text" name="titre" id="titre" aria-placeholder="Nom de la table" placeholder="Nom de la table">
                    <!-- Invisible en visualisation pour les joueurs, utilisé pour la recherche de table. -->
                    <input type="text" name="systemName" id="systemName" aria-placeholder="Nom du système de jeu utilisé." placeholder="Nom du système de jeu utilisé">
                    <h2>
                        <!-- Importation PHP du nom du MJ -->
                        MJ : *nom du MJ*
                    </h2>
                </div>

            </div>

            <div id="sumup-container">
                <input type="text" name="titreDescription" id="titreDescription" placeholder="Titre de votre résumé">
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Votre résumé"></textarea>
            </div>

            <div id="calendrier-container">
                <input type="date" name="calendrierDate" id="calendrierDate">
                <input type="calendrierHoraire" class="calendrierHoraire">
            </div>

            <!-- Uniquement visible pour la session MJ -->
            <button type="submit">Enregistrer</button>
        </form>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

    <script src="./js/app.js"></script>
</body>
</html>