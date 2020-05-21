<?php

//restaure la session en cours
session_start();

//efface les variables de session

unset($_SESSION);

//detruit la session

session_destroy();

//Rediriger vers INDEX

header('location:LandingPage.php'); 