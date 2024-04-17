<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Gather</title>
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css">
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <section id="profile-container">
            <div id="profile">
                <div class="profile-pic-container">
                    <!-- Récupérer l'URL de l'image déjà uploadé -->
                    <img src="../assets/Img/profile1.jpg" alt="Profile picture" id="profile-picture">
                </div>
                <!-- Récupérer le nom utilisateur entré lors de l'inscription -->
                <h3>*php nom user db*</h3> 
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
        </section>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

</body>
<script src="./js/app.js"></script>
</html>