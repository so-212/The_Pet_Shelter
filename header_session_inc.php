<?php
// Restaurer une session si elle existe

// Teste si connected existe et est vrai
if (!isset($_SESSION['connected']) && !$_SESSION['connected']) {
    header('location:LandingPage.php');
    exit();
}
?>