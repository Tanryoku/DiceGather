<?php
// Détruire toutes les données de session
session_destroy();
session_unset();

// Définir la date d'expiration du cookie de session dans le passé pour forcer son expiration côté client
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 1, '/');
}

// Rediriger l'utilisateur vers l'index après la déconnexion
header("Location: ../index.php");
exit();