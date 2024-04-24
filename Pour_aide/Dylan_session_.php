<?php
    // Inclure le fichier d'en-tête
    include 'header.php';


    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Importer les fonctions
    require_once "functions.php"; 

    // Nettoyer les saisies utilisateur
    $mail = sanitize($_POST["mail"]);
    $hash = sanitize($_POST["hash"]);

    try {
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=localhost;port=3306;dbname=test1", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête pour récupérer l'utilisateur correspondant à l'adresse e-mail
        $sql = "SELECT * FROM utilisateur WHERE mail = :mail && hash = :hash;";
        $query = $connexion->prepare($sql);

        // Lier les paramètres à la requête
        $query->bindParam(":mail", $mail);
        $query->bindParam(":hash", $hash);

        // Exécuter la requête
        $query->execute();


        // Vérifier si l'utilisateur existe
        // Vérifier si l'utilisateur existe
        if ($query->rowCount() > 0) {
            // L'utilisateur existe, démarrer une session
            session_start();

            // Stocker les informations de l'utilisateur dans la session
            $_SESSION["user"] = $query->fetch(PDO::FETCH_ASSOC);

            // Définir $prenom et $nom_famille
            $prenom = $_SESSION["user"]["prenom"];
            $nom_famille = $_SESSION["user"]["nom_famille"];

            // Créer le lien vers le tableau de bord de l'utilisateur
            $lien_dashboard = "dashboard.php?prenom=" . urlencode($prenom) . "&nom_famille=" . urlencode($nom_famille);

            // Vérifier si l'utilisateur est un administrateur
            if ($_SESSION["user"]["id_role"] == 766667) {
            // Rediriger l'utilisateur vers le tableau de bord de l'administrateur
            header("Location: dashboardAdmin.php");
            } elseif ($_SESSION["user"]["id_role"] == 5){
            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: $lien_dashboard");
            } else {
            session_destroy();
            }
            exit;
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo "Erreur : " . $e->getMessage();
    }
    }


?>
