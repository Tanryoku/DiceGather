<?php
// Traitement
session_start();
// Les fichiers requis au bon fonctionnement du code :
include("./PHP/functions.php");
include("./PHP/BdD_login.php");

// Je vérifie que les champs ne sont pas vides

    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // Requête SQL :
        $sql = "DELETE FROM `user` WHERE email = :email";

        // Je prépare la requête
        $requete = $connexion->prepare($sql);

        $requete->bindParam(':email', $_SESSION["email"]);



        if ($requete->execute()) {
            header("Location: connexion.php");
        }
    }catch(Exception $e){
        echo($e-> getMessage());
    }