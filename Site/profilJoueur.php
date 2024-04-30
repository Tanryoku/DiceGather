<?php
    session_start();
require_once("./PHP/functions.php");
require_once("./PHP/BdD_login.php");

    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // Requête SQL :
        $sql= "SELECT * FROM profil_joueur INNER JOIN user ON profil_joueur.id_user = user.id_user WHERE user.id_user = :id";
        // Je prépare la requête
        $requete = $connexion->prepare($sql);

        // Je bind les valeurs
        // $requete-> bindParam(":email", $_SESSION["email"]);
        $requete-> bindParam(":id", $_SESSION["id"]);

        if ($requete->execute()) {
            $user = $requete->fetch(PDO::FETCH_ASSOC);
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
    <?php include('./include/header_signedIn.inc.php'); ?>
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
                    <h3 class="sousTitre" for="jeux">Jeux / Système favoris: </h3>
                    <div class="blocInfo">
                    <p><?php echo("$user[jeu1]");?></p>
                    <p><?php echo("$user[jeu2]");?></p>
                    <p><?php echo("$user[jeu3]");?></p>
                    </div>
                </div>
            </div>



            <div id="descriptions">
                <h3 class="sousTitre" for="desc_joueur">Quel genre de joueur suis-je ?</h3>
                <div class="blocInfo">
                    <p><?php echo("$user[description_joueur]");?></p>
                </div>

                <h3 class="sousTitre" for="desc_MJ">Quel genre de MJ suis-je ?</h3>
                <div class="blocInfo">
                    <p><?php echo("$user[description_mj]");?></p>
                </div>

                <h3 class="sousTitre" for="attentes">Ce qu'est une bonne table pour moi :</h3>
                <div class="blocInfo">
                    <p><?php echo("$user[pseudo]");?></p>
                </div>
            </div>  

            <a href="./profilModif.php" class="lienForm">Modifier mon profil</a>
        </section>

        <section id="infosCompte">
            <h2 class="titre">Mes données personnelles</h1>

            <h3 class="sousTitre" for="nom" class="sousTitre">Nom : </h3>
            <div class="blocInfo">
                <p name="nom"><?php echo("$user[nom]");?></p>
            </div>

            <h3 class="sousTitre" for="prenom" class="sousTitre">Prenom : </h3>
            <div class="blocInfo">
                <p name="prenom"><?php echo("$user[prenom]");?>Exemple speurhgpuirehgpuhqezf</p>
            </div>

            <h3 class="sousTitre" for="dateNaissance" class="sousTitre">Date de naissance : </h3>
            <div class="blocInfo">
                <p name="dateNaissance"><?php echo("$user[date_de_naissance]");?></p>
            </div>

            <h3 class="sousTitre" for="ville" class="sousTitre">Ville de résidence : </h3>
            <div class="blocInfo">
                <p name="ville"><?php echo("$user[ville_de_residence]");?></p>
            </div>
            
            <h3 class="sousTitre" for="email" class="sousTitre">email : </h3>
            <div class="blocInfo">
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