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
        <!-- if session -> connecté -->
        <?php include('./include/header_signedIn.inc.php'); ?>
        <!-- else session -> pas connecté -->

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

                <div id="table-filters" class="hidden">
                    <div class="table-filter">
                        <label for="tablename">Nom de la table:</label>
                        <input type="text" id="tablename" placeholder="Laissez vide pour chercher toutes les tables.">
                    </div>

                    <div class="table-filter">
                        <label for="tableGame">Nom du système de jeu:</label>
                        <input type="text" id="tableGame" placeholder="Laissez vide pour chercher toutes les tables.">
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

                </div>
                    <!-- Player-filter and gm-filter sont exactement le même bloc, le php cependant sera différent car appelera des tables différentes à faire apparaître dans les résultats -->
                <div id="player-filters" class="hidden">
                    <div class="filter">
                        <label for="username-filter" >Nom du joueur</label>
                        <input type="text" id="username-filter" placeholder="Laissez vide pour chercher tous les joueurs." autocomplete="username">
                    </div>

                    <div class="filter">
                        <label for="gamename-filter">Nom du jeu</label>
                        <input type="text" id="gamename-filter"  placeholder="Laissez vide pour chercher tous les jeux.">
                    </div>

                    <div class="filter">
                        <label for="city-filter">Ville</label>
                        <input type="text" id="city-filter"  placeholder="Laissez vide pour chercher dans toutes les villes.">
                    </div>

                    <div class="filter">
                        <label for="age-select">Age:</label>
                        <select id="age-select">
                        <option value="">All</option>
                        <option value="adult">Uniquement les personnes majeurs</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Rechercher">
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
                        <h1>*php nom user db*</h1>
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
    </main>

    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>
    
</body>
<script src="./js/app.js"></script>
</html>