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
        <h1>Mes informations</h1>
        <section id="profile-container">
            <h2 class="titre">Mon Profil Joueur</h1>
            <div id="profile">
                <div class="profile-pic-container">
                    <!-- Récupérer l'URL de l'image déjà uploadé -->
                    <img src="../assets/Img/profile1.jpg" alt="image de profil" id="profile-picture">
                </div>
                <!-- Récupérer le nom utilisateur entré lors de l'inscription -->
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
            <div id="infos-profile">
                <div>
                    <label for="age">Age: </label>
                    <input type="number" id="age" maxlength="3">
                </div>

                <div>
                    <label for="city">Ville: </label>
                    <input type="text" id="city">
                </div>
                <div id="jeux-container">
                    <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                    <label for="jeux">Jeux / Système favoris: </label>
                    <div id="input-container">
                        <input type="text" id="jeux1">
                        <input type="text" id="jeux2">
                        <input type="text" id="jeux3">
                    </div>
                </div>
            </div>



            <div id="descriptions">
                <label for="desc_joueur">Quel genre de joueur suis-je ?</label>
                <textarea name="desc_joueur" id="desc_joueur" cols="5" rows="7" placeholder="Débutez-vous dans le jeu de rôle ? A quoi avez-vous déjà joué ? Comment vous vous comportez comme joueur ? Êtes-vous plutôt discret ou prenez-vous facilement la parole ? Êtes-vous un min/maxer? ou la narration avant tout ? etc."></textarea>
                
                <label for="desc_MJ">Quel genre de MJ suis-je ?</label>
                <textarea name="desc_MJ" id="desc_MJ" cols="5" rows="7" placeholder="Êtes vous vétéran MJ ou débutant ? Quelle genre de table et avec quel système avec vous déjà MJ ? Comment vous vous comportez en tant que MJ, êtes-vous à cheval sur les règles, ou plutôt relaxe, êtes-vous très narration, ou très baston, Comment gérez-vous les conflits entre/avec les joueurs? etc."></textarea>
                
                <label for="attentes">Ce qu'est une bonne table pour moi :</label>
                <textarea name="attentes" id="attentes" cols="5" rows="7" placeholder="décrivez ce qu'est, pour vous, le déroulement idéal d'une partie, le comportement des joueurs, du MJ, comment-vous voulez que les questions sur le système de règlent, etc."></textarea>
            </div>

            <a href="./profilModif.php" class="lienForm">Modifier mon profil</a>
        </section>

        <section id="infosCompte">
            <h2 class="titre">Mes données personnelles</h1>

            <div class="blocInfo">
                <label for="nom" class="sousTitre">Nom : </label>
                <p name="nom"><?php echo("");?></p>
            </div>
            <div class="blocInfo">
                <label for="prenom" class="sousTitre">Prenom : </label>
                <p name="prenom"><?php echo("");?>Exemple speurhgpuirehgpuhqezf</p>
            </div>
            <div class="blocInfo">
                <label for="dateNaissance" class="sousTitre">Date de naissance : </label>
                <p name="dateNaissance"><?php echo("");?></p>
            </div>
            <div class="blocInfo">
                <label for="ville" class="sousTitre">Ville de résidence : </label>
                <p name="ville"><?php echo("");?></p>
            </div>
            <div class="blocInfo">
                <label for="email" class="sousTitre">email : </label>
                <p name="email"><?php echo("");?></p>
            </div>
        </section>

        <a href="EffacerprofilJoueur.php">Effacer mon compte</a>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/app.js"></script>
</html>