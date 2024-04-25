<?php
// Traitement
session_start();
// Les fichiers requis au bon fonctionnement du code :
include("./PHP/functions.php");
include("./PHP/BdD_login.php");

// Je vérifie que les champs ne sont pas vides
if(!empty($_POST)){
    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // Requête SQL :
        $sql = "SELECT * FROM `user` WHERE email = :email";

        // Je prépare la requête
        $requete = $connexion->prepare($sql);

        // Je bind les valeurs

        $email = sanitize_email($_POST["email"]);

        $requete-> bindParam(":email", $email);
        // $requete-> bindParam(":hash", $hash);

        if ($requete->execute()) {
            $user = $requete->fetch(PDO::FETCH_ASSOC);
            var_dump($user);
            var_dump($user['hash']);
        // Vérification du mot de passe
            if (password_verify($_POST["password"], $user['hash'] )) {
            // Le mot de passe correspond
            echo "Connexion réussie!";
            // Enregistrer le token connecté dans la session et rediriger vers TdB
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id_user'];
            header('Location: ./dashboard.php');
            } else {
            // Le mot de passe ne correspond pas
            echo "Mot de passe incorrect.";
            }
        }
    }catch(Exception $e){
        echo($e-> getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/sign-in_sign-up.css">
    <title>Dice Gather - connexion</title>
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <section>
            <h1>Connexion</h1>
            <form action="" method="POST">
                <div id="username-container">
                    <label for="email">Votre adresse e-mail</label>
                    <input type="text" placeholder="email" id="email" name="email" autocomplete="email" required>
                </div>

                <div id="password-container">
                    <label for="password">Votre mot de passe</label>
                    <input type="password" placeholder="mot de passe" id="password" name="password" required>
                </div>

                <button type="submit">Se connecter</button>

                <a href="#" id="mdpOublie">Mot de passe oublié ?</a>
            </form>
        </section>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
<script src="./js/app.js"></script>
</html>