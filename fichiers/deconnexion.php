<?php
    session_start();
    unset ($_SESSION['mail']);
    header('location: index.php');
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');
    exit;

?>
