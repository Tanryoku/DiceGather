<?php

// Traitement

// Les fichiers requis au bon fonctionnement du code :
include("./PHP/functions.php");
include("./PHP/BdD_login.php");

// Je vérifie que les champs ne sont pas vides
if(!empty($_POST)){

    // Je vérifie que les mots de passes correspondent
    if ($_POST["password"] == $_POST["password-confirm"]){

    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Requête SQL :
    $sql = "INSERT INTO user (nom, prenom, date_de_naissance, ville_de_residence, email, hash) VALUES  (:nom, :prenom, :date_de_naissance, :ville_de_residence, :email, :hash)";

    // Je prépare la requête
    $requete = $connexion->prepare($sql);

    // Je bind les valeurs

    $nom = sanitize($_POST["nom"]);
    $prenom = sanitize($_POST["prenom"]);
    $date_de_naissance = sanitize($_POST["date_de_naissance"]);
    $ville_de_residence = sanitize($_POST["ville_de_residence"]);
    $email = sanitize_email($_POST["email"]);
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    


    $requete-> bindParam(":nom", $nom);
    $requete-> bindParam(":prenom", $prenom);
    $requete-> bindParam(":date_de_naissance", $date_de_naissance);
    $requete-> bindParam(":ville_de_residence", $ville_de_residence);
    $requete-> bindParam(":email", $email);
    $requete-> bindParam(":hash", $hash);

        if ($requete->execute()) {
            // Si la requête s'est bien passée, je redirige l'utilisateur vers la page de connexion
            // header("Location: inscription_ok.php");
            var_dump($_POST["password"]);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-in_sign-up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/sign-in_sign-up.css">
    <title>Dice Gather</title>
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <section id="sign-up">
            <div id="overlay_black"></div>
            <form action="inscription" id="sign-up_form" method="POST" enctype="multipart/form-data">
                <div id="nom_container">
                    <label for="nom">Nom de famille: </label>
                    <input type="text" name="nom" id="nom" required>
                </div>

                <div id="name_container">
                    <label for="prenom">Prénom: </label>
                    <input type="text" name="prenom" id="prenom" required>
                </div>

                <div id="date-of-birth_container">
                    <label for="date_de_naissance">Date de naissance: </label>
                    <input type="date" name="date_de_naissance" id="date_de_naissance" required>
                </div>

                <div id="city_container">
                    <label for="ville_de_residence">Ville de résidence: </label>
                    <input type="text" name="ville_de_residence" id="ville_de_residence" required>
                </div>

                <div id="email_container">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div id="password_container">
                    <label for="password">Mot de passe: </label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div id="password-confirm_container">
                    <label for="password-confirm">Confirmez votre mot de passe: </label>
                    <input type="password" name="password-confirm" id="password-confirm" required>
                </div>

                <button type="submit">Je m'inscris</button>
            </form>
    </section>

    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
<script src="./js/app.js"></script>
</html>