<?php

function sanitize($unsafe_value){
    $safe_value = trim(htmlspecialchars(trim(strip_tags($unsafe_value)))    );
    return $safe_value;
}

function sanitize_email($unsafe_email){
    $safe_email = filter_var($unsafe_email, FILTER_SANITIZE_EMAIL);
    return $safe_email;
}

// Function to sanitize a URL input
function sanitize_url($url) {
    // on enlève les espaces en trop
    $url = trim($url);

    // On supprime les caractères indésirables
    $url = filter_var($url, FILTER_SANITIZE_URL);

    // On valide le format URL
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    // On ne renvoie rien si l'URL n'est pas validé.
        return false;
    }
    return $url;
}