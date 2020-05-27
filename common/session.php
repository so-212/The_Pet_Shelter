<?php
if(session_status() == PHP_SESSION_NONE){//on determine le statut d'une session

session_start(); // demarre ou restaurer une session
}

//test si une session est active ou non 

if (!(isset($_SESSION['connected']) && $_SESSION['connected'])) {

	  $connected = false;
	  header('location:LandingPage.php?access_denied');
	  exit();

}else{
	  $connected = true;
} 

?>