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
        }
    }catch(Exception $e){
        echo($e-> getMessage());
    };
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Gather - modifier ou effacer ses informations</title>
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css">
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>
    <main>
        <!-- Id utilisé pour l'algorithme, le visuel se fait à travers les classes pour le css -->
        <form id="profile-container" action="./actionModifProfile.php" method="POST">
            <h1>Informations du profil</h1>
            <div id="profile">
                <div class="profile-pic-container">
                        <!-- Récupérer l'URL de l'image déjà uploadé -->
                        <label for="imgProfil" class="sousTitre">L'URL de mon image de profil</label>
                        <input type="text" name="imgProfil" id="imgProfil" value="<?php echo isset($user['img_profil']) ? $user['img_profil'] : ''; ?>">
                </div>
                <div id="pseudo">
                    <label for="pseudo" class="sousTitre">Mon pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo isset($user['pseudo']) ? $user['pseudo'] : '';?>">
                </div>
            </div>
            <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
            <div id="infos-profile">

                <div id="jeux-container">
                    <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                    <label for="jeux" class="sousTitre">Jeux / Système favoris: </label>
                    <div id="input-container">
                        <input type="text" id="jeu1" name="jeu1" value ="<?php echo isset($user['jeu1']) ? $user['jeu1'] : '';?>">
                        <input type="text" id="jeu2" name="jeu2" value ="<?php echo isset($user['jeu2']) ? $user['jeu2'] : '';?>">
                        <input type="text" id="jeu3" name="jeu3" value ="<?php echo isset($user['jeu3']) ? $user['jeu3'] : '';?>">
                    </div>
                </div>
            </div>



            <div id="descriptions">
                <div class="descriptionContainer">
                    <label for="desc_joueur" class="sousTitre">Quel genre de joueur suis-je ?</label>
                    <textarea name="desc_joueur" id="desc_joueur"
                    placeholder="Débutez-vous dans le jeu de rôle ? A quoi avez-vous déjà joué ? Comment vous vous comportez comme joueur ? Êtes-vous plutôt discret ou prenez-vous facilement la parole ? Êtes-vous un min/maxer? ou la narration avant tout ? etc."><?php echo isset($user["description_joueur"]) ? $user["description_joueur"] : '';?></textarea>
                </div>

                <div class="descriptionContainer">
                    <label for="desc_MJ" class="sousTitre">Quel genre de MJ suis-je ?</label>
                    <textarea name="desc_MJ" id="desc_MJ"
                    placeholder="Êtes vous vétéran MJ ou débutant ? Quelle genre de table et avec quel système avec vous déjà MJ ? Comment vous vous comportez en tant que MJ, êtes-vous à cheval sur les règles, ou plutôt relaxe, êtes-vous très narration, ou très baston, Comment gérez-vous les conflits entre/avec les joueurs? etc."><?php echo isset($user['description_mj']) ? $user['description_mj'] : '';?></textarea>
                </div>
                
                <div class="descriptionContainer">
                    <label for="bonne_table" class="sousTitre">Ce qu'est une bonne table pour moi :</label>
                    <textarea name="bonne_table" id="bonne_table"
                    placeholder="Décrivez ce qu'est, pour vous, le déroulement idéal d'une partie, le comportement des joueurs, du MJ, comment-vous voulez que les questions sur le système de règlent, etc."><?php echo isset($user['bonne_table']) ? $user['bonne_table'] : '';?></textarea>
                </div>
            </div>

        <?php // EN prévision d'une update, je ne veux pas que cela apparaisse dans le contenu inspecter
        //<!-- <h2>Voulez-vous être MJ ?</h2>
        //<label for="oui">Oui</label>
        //<input type="checkbox" id="oui" name="choix" value="oui">

        //<label for="non">Non</label>
        //<input type="checkbox" id="non" name="choix" value="non"> -->
        ?>

        <button type="submit"class="lienForm" >J'envoie les modifications</button>
    </form>
    <a href="profilJoueur.php" class="lienForm" >Retour</a>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/header.js"></script>
</html>