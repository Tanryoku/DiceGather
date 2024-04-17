<?php 
    /*/ Partie traitement /*/

    // Ecriture de mon code SQL
    $sql = "SELECT * FROM manga;";

    // Connexion à la base de données
    // Data Source Name
    include("config.php");
    $bdd = new PDO($dsn, DBUSER, DBPASS);

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
        <link rel="stylesheet" href="css/main.css">
        <title>Mangathèque Jérémy</title>
    </head>
    <body>
        <a href="ajout-manga.php">Ajouter un manga</a>
        
    <table>

        <thead>

            <tr>   

                <th>Nom</th>
                <th>Auteur</th>
                <th>Date de parution</th>
                <th></th>
                <th></th>

            </tr>

        </thead>

        <tbody>
            <?php
                foreach($resultats as $manga) {
            ?>
                    
                    <tr>
                        <td><?= $manga["nom"];?></td>
                        <td><?= $manga["auteur"];?></td>
                        <td><?= $manga["date_parution"];?></td>
                        <td><a href="modif-manga.php?manga=<?= $manga["nom"];?>">Modifier</a></td>
                        <td><a href="suppression-manga.php?manga=<?= $manga["nom"];?>">Supprimer</a></td>
                    </tr>
            <?php
                }
            ?>
                         
        </tbody>

    </table>

    </body>
</html>