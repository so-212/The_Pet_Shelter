<?php
include_once 'common/db_connect_inc.php';



if (isset($_POST['submit'])) {

	$name = htmlspecialchars($_POST['name']);
	$espece = htmlspecialchars($_POST['espece']);
	$proprietaire = htmlspecialchars($_POST['proprietaire']);
	$photo = htmlspecialchars($_POST['MAX_FILE_SIZE']);


	if (empty($name)  ||  empty($espece) || empty($proprietaire) ){

		header('location:LandingPage.php?error=empty_field&nom='.$name.'&espece='.$espece);
		exit();

	}




}