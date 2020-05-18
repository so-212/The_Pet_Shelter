<?php
include_once 'db_connect_inc.php';

// on vérifie que les champs ont été définit dans le formulaire
if(isset($_POST['mail'], $_POST['username'], $_POST['password'])){

	// variabilisation des $_POST
	$name = htmlspecialchars($_POST['name']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$tel = htmlspecialchars($_POST['tel']);

	$mail       = htmlspecialchars($_POST['mail']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$region = htmlspecialchars($_POST['region']);
	$status = htmlspecialchars($_POST['status']);
	$pass       = htmlspecialchars($_POST['pass']);
	$passRepeat = htmlspecialchars($_POST['passRepeat']);

	//on vérifie que les champs ne sont pas vide 

	if(empty($mail) && empty($pass) && empty($username) && empty($passRepeat)){

		header('location:LandingPage.php');
		exit();
	
	}

	//si mail ET username sont mal renseignés

	else if (!filter_var($mail, FILTER_VALIDATE_EMAIL ) && !preg_match("/^[a-zA-Z0-9]*$/", $username )) {

		header('location:LandingPage.php');
		exit();

	}

	//si mail invalide 

	else if (!filter_var($mail, FILTER_VALIDATE_EMAIL )) {

		header('location:LandingPage.php');
		exit();
	}
	//si username invalide 
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username )) {

		header('location:LandingPage.php');
		exit();
		
	}

	else if ($pass !== $passRepeat){

		header('location:LandingPage.php');
		exit();

	}

	//checker si le username && mail rentré n'existe pas deja en base 
	else{




	}

	//une fois que les $_POST ont eté validé on lance une requete d'insertion ds la bdd
	try {
		




		
	} catch (PDOException $err) {

		echo $err->getMessage();

	}





}

// <input type="text" name="nom" value="<?php echo $nom