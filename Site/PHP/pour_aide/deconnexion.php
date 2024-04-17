<?php 
    session_name("messagerie");
    session_start();

    session_destroy();

    header("Location: connexion.php");