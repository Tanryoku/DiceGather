<?php

// Les fichiers requis au bon fonctionnement du code :
require_once("./PHP/functions.php");
require_once("./PHP/BdD_login.php");

    if (!isset($_SESSION["id"]) && (!isset($_SESSION["email"]))) {
        header("Location: connexion.php");
    }

    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // Requête SQL :
        $sql = "SELECT * FROM `user` WHERE email = :email";

        // Je prépare la requête
        $requete = $connexion->prepare($sql);

        // Je bind les valeurs

        $email = sanitize_email($_SESSION["email"]);
        $id = sanitize($_SESSION["id"]);

        $requete-> bindParam(":email", $email);
        // $requete-> bindParam(":hash", $hash);

        if ($requete->execute()) {
            $user_co = $requete->fetch(PDO::FETCH_ASSOC);
            if (!$id == $user_co["id_user"] && !$email == $user_co['email']) {
                header("Location: connexion.php");
            }
        }
    }catch(Exception $e){
            echo($e-> getMessage());
    }
?>

        <nav id="nav">
            <section id="nav_bar">
                <div id="logo_contain">
                    <a href="index.php">
                        <img src="./assets/img/logo/logo_dice-gather.jpg" alt="logo Dice Gather">
                    </a>
                </div>
                <h6 id="headerTitle">Dice Gather</h6>
                <ul>
                    <a href="profilJoueur.php">Profil</a>
                    <a href="messagerie.php"> Messagerie</a>
                    <a href="recherche.php"> Recherche</a>
                    <a href="mesTables.php">Mes Tables</a>
                    <a href="./include/log_out.php">Deconnexion</a>
                </ul>
            </section>
            <span id="nav_opener">&#8677;</span>
        </nav>
        <script src=".../js/app.js"></script>