<?php

    // Traitement

    // Les fichiers requis au bon fonctionnement du code :  

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
            $sql_check = "SELECT COUNT(*) FROM table_de_jeu WHERE id_mj = $id_mj";
            $result = $connexion->query($sql_check);
            $colonnes = $result->fetchAll();

            // je transforme le résultat en int en comptant les colonnes
            $count = $colonnes['COUNT(*)'];

            // Condition pour choisir la bonne requête à effectuer
            if ($count > 0) {

                // Mettre à jour la table
                $sql = "UPDATE profil_joueur SET img_profil = 'imgProfil', pseudo = 'pseudo', ville = 'ville', jeu1= `jeu1`, jeu2= `jeu2`, jeu3= `jeu3` WHERE id_user = 'id_user' ";

            } else {

                // Insérer une nouvelle entrée dans la table
                $sql = "INSERT INTO profil_joueur (imgProfil, pseudo, age, ville, jeu1, jeu2) VALUES ('$imgProfil', '$pseudo', '$age', '$ville', '$jeu1', '$jeu2', `$jeu3`)";
            }


            // Je prépare la requête
            $requete = $connexion->prepare($sql);

            // Je bind les valeurs

            $image = sanitize_url($_POST["imgProfil"]);
            $pseudo = sanitize($_POST["pseudo"]);
            $age = sanitize($_POST["age"]);
            $ville = sanitize($_POST["ville"]);
            $jeu1 = sanitize($_POST["jeu1"]);
            $jeu2 = sanitize($_POST["jeu2"]);
            $jeu3 = sanitize($_POST["jeu3"]);
            $id_user = $_SESSION["id"];


            $requete-> bindParam(":imgProfil", $imgProfil);
            $requete-> bindParam(":pseudo", $pseudo);
            $requete-> bindParam(":age", $age);
            $requete-> bindParam(":ville", $ville);
            $requete-> bindParam(":jeu1", $jeu1);
            $requete-> bindParam(":jeu2", $jeu2);
            $requete-> bindParam(":jeu3", $jeu3);


            if ($requete->execute()) {
            
                header("url=./profil.php?id=" . $_SESSION["id"]);
                exit;

            } else {

                // Gestion des erreurs si la requête n'a pas été exécutée avec succès
                echo "<p>Une erreur s'est produite lors de l'exécution de la requête.</p>";
            }
        }
    // }