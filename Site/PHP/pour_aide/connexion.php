<?php
    session_name("messagerie");
    session_start();

    require "includes/Alert.php";

    /***************
     * TRAITEMENTS *
     **************/
    
    if (!empty($_POST)) {
        // Données postées depuis un formulaire
        $pseudo = $_POST["username"];
        // $email = $_POST["username"];
        // $password = $_POST["password"];
        
        //$sql = "SELECT * FROM users WHERE username = '$pseudo' OR email = '$email';";
        $sql = "CALL login(:identifiant);";

        // Connexion à la base de données
        $connexion = new PDO("mysql:host=localhost;dbname=messagerie_dwwm5", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête
        $requete = $connexion-> prepare($sql);
        // $requete->bindParam(":username", $pseudo);
        // $requete->bindParam(":email", $email);

        if ($requete-> execute()) {
            $resultat = $requete->fetch(PDO::FETCH_OBJ);
            //var_dump($resultat);

            // On vérifie le mot de passe en PHP
            // $resultat["hash"] : mot de passe haché
            // $_POST["password"] : mot de passe saisi dans le formulaire de connexion
            if (password_verify($_POST["password"], $resultat->hash)) {
                // Le mot de passe est bien celui qui correspond au hash

                $_SESSION["user"] = $resultat->id;
                $_SESSION["user"] = $resultat->username;

                // rediriger vers une page (tableau de bord, compte, accueil, etc...)
                header("Location: rejoindreRoliste.php");

            }
        }
    }

    /*******
     * VUE
     ******/

    include "includes/header.php";
?>

<main class="container my-3">

    <?php 
        if (isset($_SESSION["msg"])) {
            $msg = unserialize($_SESSION["msg"]);
            unset($_SESSION["msg"]);
    ?>
        <div class="alert alert-<?= $msg->type; ?>">
            <h4><?= $msg-> titre; ?></h4>
            <p><?= $msg-> message; ?></p>
        </div>
    <?php
        }
    ?>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Pseudo ou email *" class="form-control my-3" autocomplete="username" aria-label="Entrez votre pseudo ou email" required>

        <input type="password" name="password" placeholder="Mot de passe *" class="form-control my-3" autocomplete="current-password" aria-label="Entrez votre mot de passe" required>

        <button class="btn btn-dark mt-3 w-100">Se connecter !</button>
    </form>


</main>

<?php
    include "includes/footer.php";
?>