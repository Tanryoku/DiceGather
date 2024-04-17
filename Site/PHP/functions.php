<?php

function sanitize($unsafe_value){
    $safe_value = trim(htmlspecialchars(trim(strip_tags($unsafe_value)))    );
    return $safe_value;
}

function sanitize_email($unsafe_email){
    $safe_email = filter_var($unsafe_email, FILTER_SANITIZE_EMAIL);
    return $safe_email;
}

?>