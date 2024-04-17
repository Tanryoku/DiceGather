<?php
    // Requête SQL
    $sql = "DELETE FROM manga WHERE nom = '{$_GET["manga"]}'";

    // Connexion à la base de données 
    include "config.php";
    $bdd = new PDO($dsn, DBUSER, DBPASS);

    // Préparation de la requête
    $query = $bdd->prepare($sql);

    // Exécution de la requête
    if ($query->execute()) {
        // Si réussite
        header("Location: ./");
    } else {
        //Si échec
    }
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangathèque Jérémy - Suppression de ...</title>
</head>
<body>
    <p>Manga à supprimer : <?= $_GET["manga"]; ?> </p>
</body>
</html>