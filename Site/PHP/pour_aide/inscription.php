<?php
    session_name("messagerie");
    session_start();

    require "includes/Alert.php";

    //$token = uniqid();
    
    if (!empty($_POST)) {

        // Vérifier le token CSRF

        if ($_POST["token"] == $_SESSION["token"]) {
            $_SESSION["token"] = md5(uniqid(rand(), true));


            if ($_POST["password"] == $_POST["password-confirmation"]) {

                // Les mots de passes sont identiques

                 // Ecrire la requête SQL

                 $sql = "INSERT INTO users (username, email, hash) VALUES (:username, :email, :hash);";

                 // Connexion à la base de données
 
                 $connexion = new PDO("mysql:host=localhost;dbname=messagerie_dwwm5", "root", "");
                 $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
                 // Préparation de la requête
 
                 $requete = $connexion-> prepare($sql);
 
                 // Lier les paramètres à la requete

                 $username = htmlspecialchars(strip_tags(trim($_POST["username"])));
                 $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
                 $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 
                 $requete-> bindParam(":username", $username);
                 $requete-> bindParam(":email", $email);
                 $requete-> bindParam(":hash", $hash);
 
                 // Execution de la requête
 
                 if ($requete-> execute()) {
                    $msg = new Alert();
                    $msg-> type = "success";
                    $msg-> titre = "Bienvenue";
                    $msg-> message = "Vous pouvez maintenant vous connectez ! ";

                    $_SESSION["msg"] = serialize($msg);

                    header("Location: connexion.php");
                 }

            } else {
                // Les mots de passes sont différents

                $err_msg = new Alert();
                $err_msg-> type = "danger";
                $err_msg-> titre = "Erreur";
                $err_msg-> message = "Les mots de passes ne correspondent pas ! ";
                //var_dump($err_msg);
            }    

        } else {
            $_SESSION["token"] = md5(uniqid(rand(), true));
        }


    } else {
        $_SESSION["token"] = md5(uniqid(rand(), true));
    }

    /******** 
    ** VUE **
     ********/

    include "includes/header.php"
?>

<main class=" container my-3">

    <?php 
        if (isset($err_msg)) {
    ?>
        <div class="alert alert-danger">
            <h4><?= $err_msg-> titre; ?></h4>
            <p><?= $err_msg-> message; ?></p>
        </div>
    <?php
        }
    ?>

    <form action="" method="post">

        <input type="text" name="username" placeholder="Pseudonyme *" aria-label="Pseudonyme" autocomplete="username" class="form-control my-3" required>

        <input type="email" name="email" placeholder="Email *" aria-label="Email" autocomplete="email" class="form-control my-3" required>

        <input type="password" name="password" placeholder="Mot de passe *" aria-label="Mot de passe" autocomplete="new-password" class="form-control my-3" required>

        <input type="password" name="password-confirmation" placeholder="Confirmation du mot de passe *" aria-label="Confirmation du mot de passe" autocomplete="new-password" class="form-control my-3" required>

        <input type="hidden" name="token" value="<?= $_SESSION["token"]; ?>">

        <button class="btn btn-dark my-3 w-100">Créer mon compte</button>

    </form>

</main>

<?php
    include "includes/footer.php"
?>