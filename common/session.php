<?php
session_start(); // demarre ou restaurer une session

//test si une session est active ou non 

if (empty($_SESSION['connected']) && empty($_SESSION['connected'])) {

  header('location:LandingPage.php');
  exit();

}else{

  //afficher le nom de l'utilisateur qqpart

}