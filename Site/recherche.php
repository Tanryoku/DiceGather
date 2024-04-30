
<?php
// Traitement
session_start();
// Les fichiers requis au bon fonctionnement du code :
require_once("./PHP/functions.php");
require_once("./PHP/BdD_login.php");

// Initialisation des variables
$liste = [];

// Je vérifie que les champs ne sont pas vides
if (!empty($_POST)) {
    // Je me connecte à la BdD
    $connexion = new PDO($dsn, DBUSER, DBPASS);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pseudo = isset($_POST['pseudoFilter']) ? sanitize($_POST['pseudoFilter']) : '%';
    $nomJeu = isset($_POST['nomJeuFilter']) ? sanitize($_POST['nomJeuFilter']) : '%';
    $city = isset($_POST['cityFilter']) ? sanitize($_POST['cityFilter']) : '%';
    $ageFilter = $_POST['ageFilter'];

    // Remplacer les champs vides par '%' pour obtenir par défaut tous les profils sans filtrer
    $pseudo = !empty($pseudo) ? $pseudo : '%';
    $nomJeu = !empty($nomJeu) ? $nomJeu : '%';
    $city = !empty($city) ? $city : '%';

    try {
        // Requête SQL :
        // Le WHERE 1=1 permet de faciliter l'utilisation des IFs suivants en n'écrivant que la concaténation + AND;
        $sql = "SELECT profil.*, utilisateur.*
                FROM profil_joueur AS profil
                INNER JOIN user AS utilisateur ON profil.id_user = utilisateur.id_user
                WHERE 1=1";

                // n'agrandir la requête que si le champ correspondant à été rempli.
        if (!empty($pseudo)) {
            // Permettre la recherche sans être trop exigeant sur l'orthographe des noms pour afficher un maximum de profils pertinent.
            $sql .= " AND pseudo LIKE CONCAT('%', :pseudo, '%') OR SOUNDEX(pseudo) = SOUNDEX(:pseudo)";
        }
        if (!empty($nomJeu)) {
            $sql .= " AND (
                profil.jeu1 LIKE CONCAT('%', :nomJeu, '%') AND SOUNDEX(profil.jeu1) = SOUNDEX(:nomJeu)
                OR profil.jeu2 LIKE CONCAT('%', :nomJeu, '%') AND SOUNDEX(profil.jeu2) = SOUNDEX(:nomJeu)
                OR profil.jeu3 LIKE CONCAT('%', :nomJeu, '%') AND SOUNDEX(profil.jeu3) = SOUNDEX(:nomJeu)
            )";
                    }
        if (!empty($city)) {
            $sql .= " AND ville_de_residence LIKE CONCAT('%', :city, '%') OR SOUNDEX(utilisateur.ville_de_residence) = SOUNDEX(:city)";
        }
        if ($ageFilter === 'adult') {
            $sql .= " AND age >= 18";
        }

        $requete = $connexion->prepare($sql);

        $requete->bindParam(":pseudo", $pseudo);
        $requete->bindParam(":nomJeu", $nomJeu);
        $requete->bindParam(":city", $city);

        if ($requete->execute()) {
            $liste = $requete->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profil_recherche_mesTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Dice Gather - trouver d'autres joueurs ou une table de jeu</title>
    <meta name="description" content="Trouvez et rencontrer d'autres joueurs dans la même ville que vous et créer une table de jeu de rôle ensemble !">
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>
    <main>
        <h1>Recherche de joueurs et de table</h1>
            <section id="filter-container">
                <h2>Filtres</h2>
                <label for="category">Que cherchez-vous ?</label>
                <select id="category">
                    <option value=""></option>
                    <option value="table">Table</option>
                    <option value="player">Joueurs</option>
                </select>

                <form id="table-filters" class="hidden">
                    <div class="table-filter">
                        <label for="tablename">Nom de la table:</label>
                        <input type="text" id="tablename" name="tablename" placeholder="Laissez vide pour chercher toutes les tables." >
                    </div>

                    <div class="table-filter">
                        <label for="tableGame">Nom du système de jeu:</label>
                        <input type="text" id="tableGame" name="tableGame" placeholder="Laissez vide pour chercher toutes les tables.">
                    </div>

                    <div class="nb-filter">
                        <label for="full">Nb de joueurs ayant rejoint la table</label>
                        <select id="full">
                            <option value="">All</option>
                            <option value="empty">Aucun joueur</option>
                            <option value="not-empty">La table n'est pas pleine.</option>
                            <option value="last-one">Il ne reste plus qu'une place</option>
                        </select>
                    </div>
                </form>

                    <!-- Player-filter and gm-filter sont exactement le même bloc, le php cependant sera différent car appelera des tables différentes à faire apparaître dans les résultats -->
                <form id="player-filters" class="hidden" action="" method="POST">
                    <div class="filter">
                        <label for="pseudo-filter" >Nom du joueur</label>
                        <input type="text" id="pseudo-filter" name="pseudoFilter" placeholder="Laissez vide pour chercher tous les joueurs." autocomplete="pseudo">
                    </div>

                    <div class="filter">
                        <label for="nomJeu-filter">Nom du jeu</label>
                        <input type="text" id="nomJeu-filter" name="nomJeuFilter"  placeholder="Laissez vide pour chercher tous les jeux.">
                    </div>

                    <div class="filter">
                        <label for="city-filter">Ville</label>
                        <input type="text" id="city-filter" name="cityFilter" placeholder="Laissez vide pour chercher dans toutes les villes.">
                    </div>

                    <div class="filter">
                        <label for="age-select">Age:</label>
                        <select id="age-select" name="ageFilter">
                        <option value="">All</option>
                        <option value="19">Uniquement les personnes majeurs</option>
                        </select>
                    </div>
                    <input type="submit" value="Rechercher">
                </form>
            </section>


            <!-- Bloc exemple pour l'appel des profils de la base de données -->

            <section id="profile-recherche">
                <h2>Résultats de recherche</h2>
                    <div class="profile-pic-container">
                        <!-- Récupérer l'URL de l'image déjà uploadé -->
                        <img src="./assets/img/profile1.jpg" alt="Profile picture" id="profile-picture">
                    </div>
                    <!-- Récupérer le nom utilisateur entré lors de l'inscription -->
                <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
                <div id="infos-profile">
                    <div id="profile-name">
                        <h1>*Je suis un exemple !*</h1>
                        <div id="bubble">
                            <img src="./assets/icons/bulle.svg" alt="icone bulle de dialogue">
                        </div>
                    </div>

                    <div id="age-container">
                        <label for="age">Age :</label>
                        <p id="age">99 ans</p>
                    </div>
    
                    <div id="city-container">
                        <label for="city">Ville :</label>
                        <p id="city">Avignon</p>
                    </div>
                    <div id="jeux-container">
                        <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                        <label for="jeux">Jeux / Système favoris: </label>
                        <div id="jeux">
                            <p id="jeux1">Donjons et dragons 5ème édition</p>
                            <p id="jeux2">Warhammer Fantaisie</p>
                            <p id="jeux3">Call of Cthulu</p>
                        </div>
                    </div>
                    <div id="bubble-desktop">
                        <img src="./assets/icons/bulle.svg" alt="icone bulle de dialogue">
                    </div>
                </div>
            </section>
        </div>

        <?php
        foreach($liste as $user){ ?>
            <section id="profile-recherche">
                <h2>Résultats de recherche</h2>
                    <div class="profile-pic-container">
                        <!-- Récupérer l'URL de l'image déjà uploadé -->
                        <img src="<?=$user['img_profil']?>" alt="Profile picture" id="profile-picture">
                    </div>
                    <!-- Récupérer le nom utilisateur entré lors de l'inscription -->
                <!-- Les informations des divs suivantes sont envoyés dans la table profil lié à l'utilisateur connecté -->
                <div id="infos-profile">
                    <div id="profile-name">
                        <h1><?= $user['pseudo'] ?></h1>
                        <div id="bubble">
                            <img src="./assets/icons/bulle.svg" alt="icone bulle de dialogue">
                        </div>
                    </div>

                    <div id="age-container">
                        <label for="age">Age :</label>
                        <p id="age">
                        <?php
                            $dateNaissance = new DateTime($user['date_de_naissance']);
                            $dateActuelle = new DateTime();
                            $age = $dateNaissance->diff($dateActuelle);
                            echo $age->format('%y');
                            ?>
                        </p>
                    </div>
    
                    <div id="city-container">
                        <label for="city">Ville :</label>
                        <p id="city"><?= $user['ville_de_residence'] ?></p>
                    </div>
                    <div id="jeux-container">
                        <!-- Après chaque input, une nouvelle option de choix doit apparaître -->
                        <label for="jeux">Jeux / Système favoris: </label>
                        <div id="jeux">
                            <p id="jeu1"><?= $user['jeu1'] ?></p>
                            <p id="jeu2"><?= $user['jeu2'] ?></p>
                            <p id="jeu3"><?= $user['jeu3'] ?></p>
                        </div>
                    </div>
                    <div id="bubble-desktop">
                        <img src="./assets/icons/bulle.svg" alt="icone bulle de dialogue">
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php } ?>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
    
</body>
<script src="./js/recherche.js"></script>
<script src="./js/header.js"></script>

</html>