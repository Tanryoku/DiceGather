<?php
session_start();
    // Traitement
    require_once("./PHP/functions.php");
    require_once("./PHP/BdD_login.php");
    // Les fichiers requis au bon fonctionnement du code :  

    // Je vérifie que les champs ne sont pas vides
    if(!empty($_POST)){
        
            // Je me connecte à la BdD
            $connexion = new PDO($dsn, DBUSER, DBPASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Requête SQL :
            //  Si la table exis&²te, on met à jour, si elle n'existe pas, on la crée.
            // Créer une table et modifier une table se font donc tous les deux dans la même page. 
            
            // code à vérifier après leçon session
            // $id_mj = $_SESSION->$id_user;

            // Vérifier si une entrée avec cet ID de maître de jeu existe déjà
            $sql_check = "SELECT COUNT(*) FROM profil_joueur WHERE id_user = $_SESSION[id]";
            $result = $connexion->query($sql_check);
            $colonnes = $result->fetch(PDO::FETCH_ASSOC);

            // je transforme le résultat en int en comptant les colonnes
            $count = $colonnes['COUNT(*)'];

            // S'il existe au moins une entrée dans la table, on met à jour
            if ($count > 0) {
                if($count > 1) {
                    // Si il y a plus d'une entrée = Problème, donc je supprime tout.
                    $sql = "DELETE FROM profil_joueur WHERE id_user =$_SESSION[id]";
                } else {
                //Inutile de bind ce paramètre si l'on crée l'entrée. Donc dans le IF

                // Il est fort probable que les id_user et les id_profil soient similaires, mais les deux créations n'étant pas automatiques, il existe la possibilité pour qu'un utilisateur crée son compte, récupère par exemple l'id 5, mais ne crée pas son profil avant qu'un sixième utilisateur crée son compte et son profil, le sixième aura donc l'id_user 6 et l'id_profil 5.


                // Mettre à jour la table
                $sql = "UPDATE profil_joueur SET img_profil = :imgProfil, pseudo = :pseudo, jeu1 = :jeu1, jeu2 = :jeu2, jeu3 = :jeu3, description_joueur = :desc_joueur, description_MJ = :desc_MJ, bonne_table = :bonne_table WHERE id_user = :id_user";
                }
            }else{
                // pas d'entrée: on crée l'entrée
                $sql = "INSERT INTO profil_joueur (img_Profil, pseudo, jeu1, jeu2, jeu3, description_joueur, description_MJ, bonne_table, id_user) VALUES (:imgProfil, :pseudo, :jeu1, :jeu2, :jeu3, :desc_joueur, :desc_MJ, :bonne_table, :id_user)";
            }
            
            // Je prépare la requête
            $requete = $connexion->prepare($sql);
            
            // Je bind les valeurs
            $imgProfil = sanitize_url($_POST["imgProfil"]);
            $pseudo = sanitize($_POST["pseudo"]);
            $jeu1 = sanitize($_POST["jeu1"]);
            $jeu2 = sanitize($_POST["jeu2"]);
            $jeu3 = sanitize($_POST["jeu3"]);
            $desc_joueur = sanitize($_POST["desc_joueur"]);
            $desc_MJ = sanitize($_POST["desc_MJ"]);
            $bonne_table = sanitize($_POST["bonne_table"]);
            $id_user = sanitize($_SESSION["id"]);

            
            $requete->bindParam(":imgProfil", $imgProfil);
            $requete->bindParam(":pseudo", $pseudo);
            $requete->bindParam(":jeu1", $jeu1);
            $requete->bindParam(":jeu2", $jeu2);
            $requete->bindParam(":jeu3", $jeu3);
            $requete->bindParam(":desc_joueur", $desc_joueur);
            $requete->bindParam(":desc_MJ", $desc_MJ);
            $requete->bindParam(":bonne_table", $bonne_table);
            $requete->bindParam(":id_user", $id_user);



            if ($requete->execute()) {
                // die("Session ID = " . $_SESSION["id"]);
            header('Location: ./profilJoueur.php');

            } else {

                // Gestion des erreurs si la requête n'a pas été exécutée avec succès
                echo "<p>Une erreur s'est produite lors de l'exécution de la requête.</p>";
            }
        }
    // }