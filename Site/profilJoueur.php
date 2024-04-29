<?php
    session_start();
include("./PHP/functions.php");
include("./PHP/BdD_login.php");

    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // Requête SQL :
        // $sql = "SELECT * FROM `user` WHERE email = :email; 
        $sql= "SELECT * FROM profil_joueur INNER JOIN user ON profil_joueur.id_user = user.id_user WHERE user.id_user = :id";
        // Je prépare la requête
        $requete = $connexion->prepare($sql);

        // Je bind les valeurs
        // $requete-> bindParam(":email", $_SESSION["email"]);
        $requete-> bindParam(":id", $_SESSION["id"]);

        if ($requete->execute()) {
            $user = $requete->fetch(PDO::FETCH_ASSOC);
            var_dump($user);
        }
    }catch(Exception $e){
        echo($e-> getMessage());
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Gather - mon profil de joueur - mes jeux - mes infos</title>
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css">
</head>
<body>
    <header>

    </header>
    <main>
        <h1 class="h1White">Mes informations</h1>
        <section id="profile-container">
            <h2 class="titre">Mon Profil Joueur</h1>
            <div id="profile">
                <div class="profile-pic-container">
                    <img src="<?php echo("$user[img_profil]");?>" alt="image de profil" id="profile-picture">
                </div>
                <p><?php echo("$user[pseudo]");?></p>
            </div>
            <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
            <div id="infos-profile">

                <div id="jeux-container">
                    <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                    <label for="jeux">Jeux / Système favoris: </label>
                    <div class="blocInfo">
                    <p><?php echo("$user[jeu1]");?></p>
                    <p><?php echo("$user[jeu2]");?></p>
                    <p><?php echo("$user[jeu3]");?></p>
                    </div>
                </div>
            </div>



            <div id="descriptions">
                <label for="desc_joueur">Quel genre de joueur suis-je ?</label>
                <p><?php echo("$user[description_joueur]");?></p>
                
                <label for="desc_MJ">Quel genre de MJ suis-je ?</label>
                <p><?php echo("$user[description_mj]");?></p>
                
                <label for="attentes">Ce qu'est une bonne table pour moi :</label>
                <p><?php echo("$user[pseudo]");?></p>
            </div>

            <a href="./profilModif.php" class="lienForm">Modifier mon profil</a>
        </section>

        <section id="infosCompte">
            <h2 class="titre">Mes données personnelles</h1>

            <div class="blocInfo">
                <label for="nom" class="sousTitre">Nom : </label>
                <p name="nom"><?php echo("$user[nom]");?></p>
            </div>
            <div class="blocInfo">
                <label for="prenom" class="sousTitre">Prenom : </label>
                <p name="prenom"><?php echo("$user[prenom]");?>Exemple speurhgpuirehgpuhqezf</p>
            </div>
            <div class="blocInfo">
                <label for="dateNaissance" class="sousTitre">Date de naissance : </label>
                <p name="dateNaissance"><?php echo("$user[date_de_naissance]");?></p>
            </div>
            <div class="blocInfo">
                <label for="ville" class="sousTitre">Ville de résidence : </label>
                <p name="ville"><?php echo("$user[ville_de_residence]");?></p>
            </div>
            <div class="blocInfo">
                <label for="email" class="sousTitre">email : </label>
                <p name="email"><?php echo("$user[email]");?></p>
            </div>
            <a href="EffacerUser.php" class="lienForm">Effacer mon compte</a>
        </section>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/header.js"></script>
</html>