<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/accueil.css">
    <title>Dice Gather - Pour joueurs de donjons et dragons et autres</title>
    <meta name="description" content="Venez rejoindre les rôlistes de DiceGather et trouver d'autres joueurs pour organiser des tables de donjon et dragon ou encore star wars près de chez vous !">
</head>
<body>
    <header>
        <?php include('./include/header.inc.php'); ?>
    </header>
    <main>
        <h1>Bienvenue sur Dice Gather</h1>

        <div>
            <h2>Le jeu de rôle :</h2>

            <p>Le jeu de rôle papier est une forme de divertissement interactif où les participants créent et interprètent des personnages fictifs au sein d'un univers imaginaire. Contrairement aux jeux vidéo traditionnels, le jeu de rôle papier se déroule généralement autour d'une table avec des dés, des feuilles de personnage et un maître du jeu (MJ) qui guide l'aventure. Les joueurs utilisent leur imagination pour prendre des décisions, résoudre des énigmes et interagir avec le monde fictif créé par le MJ. L'essence du jeu de rôle papier réside dans la narration collaborative, où les joueurs contribuent à l'histoire en fonction des actions et des choix de leur personnage. Les univers de jeu peuvent varier considérablement, allant de la fantasy médiévale à la science-fiction, en passant par l'horreur contemporaine et bien d'autres. Les règles du jeu sont généralement définies par un système de jeu spécifique, mais elles peuvent également être flexibles et adaptées en fonction des préférences du groupe de jeu. Les séances de jeu peuvent durer des heures, voire des jours, et offrent une expérience sociale immersive où les joueurs tissent des liens, explorent des mondes fantastiques et vivent des aventures épiques ensemble. Le jeu de rôle papier encourage la créativité, la collaboration et l'imagination, en faisant de chaque session une expérience unique et mémorable pour tous les participants.</p>
        </div>

        <div>
            <h2>La plate-forme :</h2>

            <p>Plongez dans un monde d'aventures infinies avec Dice Gather, votre compagnon ultime pour explorer le passionnant univers du jeu de rôle papier ! Rencontrez des aventuriers de tous horizons près de chez vous, partageant votre passion pour les jeux de rôle papier. Que vous soyez un fier guerrier elfique, un savant fou en quête de découvertes ou un mage habile dans l'art de la magie, Dice Gather vous met en contact avec des compagnons de jeu qui partagent vos intérêts et votre enthousiasme pour l'imaginaire. Avec notre fonction de recherche intuitive, découvrez facilement des joueurs de jeu de rôle papier près de chez vous, selon vos jeux préférés et vos disponibilités. Créez des groupes de jeu dynamiques et explorez des mondes fantastiques ensemble, tout en tissant des liens durables avec d'autres passionnés. Mais ce n'est pas tout ! Grâce à Dice Gather, vous pouvez également créer et gérer des tables de jeu, organisant des sessions épiques où l'imagination est la seule limite. Que vous soyez un MJ chevronné ou un novice curieux, notre plateforme conviviale vous permet de donner vie à vos histoires les plus épiques et de partager des moments inoubliables avec vos compagnons de jeu. Rejoignez la communauté vibrante de Dice Gather dès aujourd'hui et préparez-vous à vivre des aventures épiques, à forger des amitiés durables et à créer des souvenirs inoubliables dans le monde merveilleux du jeu de rôle papier !</p>
        </div>

        <a href="rejoindreRoliste.php">Rejoindre les Rôlistes de <br> Dice Gather</a>

        <a href="connexion.php">Je suis déjà un Rôliste</a>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
</body>
<script src="./js/header.js"></script>
</html>