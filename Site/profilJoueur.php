<?php
    session_start();
require_once("./PHP/functions.php");
require_once("./PHP/BdD_login.php");

    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION['id'];
    try{
    
        // Préparez une requête pour vérifier l'existence de l'ID
        $requete = $connexion->prepare("SELECT COUNT(*) FROM profil_joueur WHERE id_user = :id");
        $requete->execute([':id' => $id]);
        $count = $requete->fetchColumn();
    
        // Je trouve un profil avec l'id correspondant
        if ($count > 0) {

            $sql= "SELECT * FROM profil_joueur INNER JOIN user ON profil_joueur.id_user = user.id_user WHERE user.id_user = :id";

            $requete = $connexion->prepare($sql);

            // $requete-> bindParam(":email", $_SESSION["email"]);
            $requete-> bindParam(":id", $_SESSION["id"]);

            if ($requete->execute()) {
                $user = $requete->fetch(PDO::FETCH_ASSOC);
            }
        }else{
            // Je ne trouve pas de profil avec id correspondant
            $sql= "SELECT * FROM user WHERE user.id_user = :id";

            $requete = $connexion->prepare($sql);

            $requete-> bindParam(":id", $_SESSION["id"]);
        }

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


        <!-- div pour placement différent phone/tablette vs pc -->
        <div class="profile-container">
            <!-- Affichage de l'image de profil -->
            <div class="profile-pic-container">
                <img src="<?php echo isset($user['img_profil']) ? $user['img_profil'] : ''; ?>" alt="image de profil" id="profile-picture">
            </div>
            <h2 class="titre">Mon Profil Joueur</h1>
        </div>

            <!-- Informations du profil_joueur (apparaissant dans la recherche) Données vides tant que "modifier son profil" n'a pas été fait par l'utilisateur, donc on vérifie pour éviter les erreurs -->


            <div id="profile">
                <p class="pseudo"><?php echo isset($user['pseudo']) ? $user['pseudo'] : '';?></p>
                <h3 class="sousTitre" for="jeux">Jeux / Système favoris: </h3>
                <div class="blocInfo">
                <p class="jeu"><?php echo isset($user['jeu1']) ? $user['jeu1'] : '';?></p>
                <p class="jeu"><?php echo isset($user['jeu2']) ? $user['jeu2'] : '';?></p>
                <p class="jeu"><?php echo isset($user['jeu3']) ? $user['jeu3'] : '';?></p>
                </div>
            </div>

                <h3 class="sousTitre" for="desc_joueur">Quel genre de joueur suis-je ?</h3>
                <div class="blocDescription">
                    <p><?php echo isset($user["description_joueur"]) ? $user["description_joueur"] : '';?></p>
                </div>

                <h3 class="sousTitre" for="desc_MJ">Quel genre de MJ suis-je ?</h3>
                <div class="blocDescription">
                    <p><?php echo isset($user['description_mj']) ? $user['description_mj'] : '';?></p>
                </div>

                <h3 class="sousTitre" for="attentes">Ce qu'est une bonne table pour moi :</h3>
                <div class="blocDescription">
                    <p><?php echo isset($user['bonne_table']) ? $user['bonne_table'] : '';?></p>
                </div>

            <a href="./profilModif.php" class="lienForm">Modifier mon profil</a>
        </section>

        <!-- Informations entrées lors de l'inscription (pas besoin de vérifier leur existence) -->
        <section id="infosCompte">
            <h2 class="titre">Mes données personnelles</h1>

            <h3 class="sousTitre" for="nom" class="sousTitre">Nom : </h3>
            <div class="blocInfo">
                <p name="nom"><?php echo("$user[nom]");?></p>
            </div>

            <h3 class="sousTitre" for="prenom" class="sousTitre">Prenom : </h3>
            <div class="blocInfo">
                <p name="prenom"><?php echo("$user[prenom]");?></p>
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
        <a href="dashboard.php" class="lienForm">Retour</a>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/header.js"></script>
</html>