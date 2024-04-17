<?php 
    /*/ Partie traitement /*/

    // Ecriture de mon code SQL
    $sql = "SELECT * FROM manga;";

    // Connexion à la base de données
    // Data Source Name
    $bdd = new PDO("mysql:host=localhost;dbname=mangathequealex", "root", "");

    // Je crée une requête depuis la base de données
    $requete = $bdd->prepare($sql);
    $requete->setFetchMode(PDO::FETCH_ASSOC);

    // J'exécute la requête
    $requete->execute();

    //Récupérer les résultats dans une variable array
    $resultats = $requete->fetchAll();
    //var_dump($resultats[0]["nom");

    /*/ Partie vue /*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangathèque Jérémy</title>
</head>
<body>
        <!-- Commentaire HTML -->
        
    <?php
        //Ceci est un commentaire
        //echo $resultats[1]["nom"] . ":" . $resultats[1]["date_parution"];

        foreach($resultats as $ligne) {
            // Pour chaque ligne, code à exécuter
            echo "<p>" . $ligne["nom"] . "</p>";

        }
        
    ?>
</body>
</html>