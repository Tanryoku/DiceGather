<?php

    // Traitement

    // Les fichiers requis au bon fonctionnement du code :
    include("./PHP/functions.php");
    include("./PHP/BdD_login.php");

    // Je vérifie que les champs ne sont pas vides
    if(!empty($_POST)){


        // Je vérifie que la session soit lié à un rôle MJ et que l'utilisateur soit bien MJ et j'enregistre son id_user dans la session (besoin pour requête SQL)
        // if (){

        
            // Je me connecte à la BdD
            $connexion = new PDO($dsn, DBUSER, DBPASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Requête SQL :
            //  Si la table existe, on met à jour, si elle n'existe pas, on la crée.
            // Créer une table et modifier une table se font donc tous les deux dans la même page. 
            
            // code à vérifier après leçon session
            // $id_mj = $_SESSION->$id_user;

            // Vérifier si une entrée avec cet ID de maître de jeu existe déjà
            $sql_check = "SELECT COUNT(*) FROM table_de_jeu ";
            $result = $connexion->query($sql_check);
            $colonnes = $result->fetch(PDO::FETCH_ASSOC);

            // je transforme le résultat en int en comptant les colonnes
            $count = $colonnes['COUNT(*)'];

            // Condition pour choisir la bonne requête à effectuer
            if ($count > 0) {
                die("je suis dans l'update");
                // Si les colonnes existent, je met à jour la table.
                $sql = "UPDATE table_de_jeu SET titre = :titre, systeme = :systeme, titreDescription = :titreDescription, description = :description, dateSeance = :dateSeance, lieuSeance = :lieuSeance";

            } else {

            // Si les colonnes n'existent pas, je crée la table.
                $sql = "INSERT INTO table_de_jeu (titre, systeme, titreDescription, description, dateSeance, lieuSeance, id_mj) VALUES (:titre, :systeme, :titreDescription, :description, :dateSeance, :lieuSeance)";

            }


            // Je prépare la requête
            $requete = $connexion->prepare($sql);

            // Je bind les valeurs

            $titre = sanitize($_POST["titre"]);
            $systeme = sanitize($_POST["systemName"]);
            $titreDescription = sanitize($_POST["titreDescription"]);
            $description = sanitize($_POST["description"]);
            $dateSeance = sanitize($_POST["dateSeance"]);
            $dateSeance = str_replace('T', ' ', $dateSeance) . ':00';
            $lieuSeance = sanitize($_POST["lieuSeance"]);
            var_dump($result, $titre, $systeme, $titreDescription, $description, $dateSeance, $lieuSeance);

            $requete-> bindParam(":titre", $titre);
            $requete-> bindParam(":systeme", $systeme);
            $requete-> bindParam(":titreDescription", $titreDescription);
            $requete-> bindParam(":description", $description);
            $requete-> bindParam(":dateSeance", $dateSeance);
            $requete-> bindParam(":lieuSeance", $lieuSeance);


            if ($requete->execute()) {
                // Affichage d'un message de confirmation
                echo "<p>L'opération a été effectuée avec succès.</p>";
            
                // Redirection après 10 secondes
                header("refresh:10; url=./table.php?id=" . $_SESSION["id_table"]);
                exit;

            } else {

                // Gestion des erreurs si la requête n'a pas été exécutée avec succès
                echo "<p>Une erreur s'est produite lors de l'exécution de la requête.</p>";
            }
        }
    // }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Dice Gather</title>
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>
    <main>
        <form action="" method="POST" id="modifForm" aria-labelledby="formTitle">
            <h1 id="formTitle" class="visually-hidden">Modifier le profil de la table</h1>

            <div id="profilTable" role="group" aria-labelledby="profileGroupTitle">
                <h2 id="profileGroupTitle" class="visually-hidden">Informations de la table</h2>

                <div class="imgContainer" role="group" aria-label="Image de profil">

                    <label for="profilePic" class="profilePic">
                        <h3>Merci d'upload votre image via un site tiers et de récupérer le lien à coller ci-dessous.</h3>
                        <input type="text" name="img" id="img" placeholder="Veuillez rentrez l'URL de votre image" aria-placeholder="URL de l'image">
                    </label>

                    <label for="profilePic">Image de profil</label>

                </div>

                <div id="profileTableDroite" role="group" aria-label="Détails de la table">
                    <input type="text" name="titre" id="titre" placeholder="Nom de la table" aria-label="Nom de la table">

                    <!-- Invisible en visualisation pour les joueurs, utilisé pour la recherche de table. -->
                    <input type="text" name="systemName" id="systemName" placeholder="Nom du système de jeu" aria-label="Nom du système de jeu">

                    <!-- Importation PHP du nom du MJ -->
                    <h2>MJ : *nom du MJ*</h2>
                </div>
            </div>

            <div id="sumupContainer" role="group" aria-labelledby="sumupTitle">
                <h2 id="sumupTitle" class="visually-hidden">Résumé de la table</h2>

                <input type="text" name="titreDescription" id="titreDescription" placeholder="Titre de votre résumé" aria-label="Titre de votre résumé">

                <textarea name="description" id="description" cols="30" rows="10" placeholder="Votre résumé" aria-label="Description de votre résumé"></textarea>
            </div>

            <div id="calendrierContainer" role="group" aria-labelledby="calendrierTitre">

                <h2 id="calendrierTitre">Prochaine séance</h2>

                <label for="dateSeance">Sélectionner une date et une heure et un lieu pour la séance:</label>

                <input type="datetime-local" id="dateSeance" name="dateSeance">

                <input type="text" name="lieuSeance" id="lieuSeance" placeholder="Ville" aria-label="Ville où se tiendra la séance">
            </div>

            <button type="submit" aria-label="Enregistrer les modifications">Enregistrer</button>

        </form>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

    <script src="./js/app.js"></script>
</body>
</html>
