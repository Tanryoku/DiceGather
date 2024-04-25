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
        <form id="profile-container" action="./actionModifProfile.php" method="POST">
            <h1>Informations du profil</h1>
            <div id="profile">
                <div class="profile-pic-container">
                        <!-- Récupérer l'URL de l'image déjà uploadé -->
                        <label for="imgProfil">L'URL de mon image de profil</label>
                        <input type="text" name="imgProfil" id="imgProfil">
                </div>
                <div id="pseudo">
                    <label for="pseudo">Mon pseudo</label>
                    <input type="text" name="pseudo" id="pseudo">
                </div>
            </div>
            <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
            <div id="infos-profile">

                <div id="jeux-container">
                    <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                    <label for="jeux">Jeux / Système favoris: </label>
                    <div id="input-container">
                        <input type="text" id="jeu1" name="jeu1">
                        <input type="text" id="jeu2" name="jeu2">
                        <input type="text" id="jeu3" name="jeu3">
                    </div>
                </div>
            </div>



            <div id="descriptions">
                <label for="desc_joueur">Quel genre de joueur suis-je ?</label>
                <textarea name="desc_joueur" id="desc_joueur" cols="5" rows="7" placeholder="Débutez-vous dans le jeu de rôle ? A quoi avez-vous déjà joué ? Comment vous vous comportez comme joueur ? Êtes-vous plutôt discret ou prenez-vous facilement la parole ? Êtes-vous un min/maxer? ou la narration avant tout ? etc."></textarea>
                
                <label for="desc_MJ">Quel genre de MJ suis-je ?</label>
                <textarea name="desc_MJ" id="desc_MJ" cols="5" rows="7" placeholder="Êtes vous vétéran MJ ou débutant ? Quelle genre de table et avec quel système avec vous déjà MJ ? Comment vous vous comportez en tant que MJ, êtes-vous à cheval sur les règles, ou plutôt relaxe, êtes-vous très narration, ou très baston, Comment gérez-vous les conflits entre/avec les joueurs? etc."></textarea>
                
                <label for="bonne_table">Ce qu'est une bonne table pour moi :</label>
                <textarea name="bonne_table" id="bonne_table" cols="5" rows="7" placeholder="Décrivez ce qu'est, pour vous, le déroulement idéal d'une partie, le comportement des joueurs, du MJ, comment-vous voulez que les questions sur le système de règlent, etc."></textarea>
            </div>

        <?php // EN prévision d'une update, je ne veux pas que cela apparaisse dans le contenu inspecter
        //<!-- <h2>Voulez-vous être MJ ?</h2>
        //<label for="oui">Oui</label>
        //<input type="checkbox" id="oui" name="choix" value="oui">

        //<label for="non">Non</label>
        //<input type="checkbox" id="non" name="choix" value="non"> -->
        ?>

        <button type="submit" id="boutonEnvoi" >J'envoie les modifications</button>
        <a href="profilJoueur.php" id="lienRetour" >Retour</a>
    </form>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/app.js"></script>
</html>