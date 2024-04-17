<?php
    if (!empty($_POST)) {
    //Des données ont été postées depuis un formulaire          
    
    //Je construit ma requete SQL 
    $sql ="INSERT INTO manga (nom, auteur) VALUES ('{$_POST["nom"]}' , '{$_POST["auteur"]}');"; 
    //Je me connecte à la base de données
    include("config.php");
    $bdd = new PDO($dsn, DBUSER, DBPASS);
    //Je crées une requête à partir de la connexion à la base de données
    $requete = $bdd->prepare($sql);
    //j'exécute la requête
    $requete->execute();
    }
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
    <main>
        <a href="./">Retour à l'accueil</a>

    <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom du manga">
            <input type="text" name="auteur" placeholder="Auteur">

            <select name="genre">
                <option value=""></option>
                <option value="shōnen">Shōnen</option>
                <option value="kodomo">Kodomo</option>
            </select>

            <input type="date" name="date-parution">

            <textarea name="synopsys" placeholder="Synopsys"></textarea>

            <button>Envoyer</button>

        </form>

    </main>
    
</body>

</html>