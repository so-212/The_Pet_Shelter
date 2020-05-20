<?php

include_once 'db_connect_inc.php';

// l'utilisateur a bien cliqué sur inscription du formulaire
if(isset($_POST['submit'])){

	// variabilisation des $_POST
	$name 		= $_POST['name'];
	$firstname  = $_POST['firstname'];
	$tel		= $_POST['tel'];
	$mail   	= $_POST['mail'];
	$username 	= $_POST['username'];
	$region 	= $_POST['region'];
	$status 	= $_POST['status'];
	$pass   	= $_POST['pass'];
	$passRepeat = $_POST['passRepeat'];



//on vérifie que les champs ne sont pas vide, si vide renvoie vers LandingPage.php avec passage de parametre en URL pr etre utiliser via $_GET ds la landingPage

if(empty($name) || empty($firstname) || empty($tel) || empty($mail) || empty($username) || empty($region) || empty($status) || empty($pass) || empty($passRepeat)){

	header('location:LandingPage.php?error=empty_field&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&mail='.$mail.'&username='.$username.'&region='.$region.'&status='.$status.'&pass='.$pass.'&passRepeat='.$passRepeat);

//on stoppe l'execution du script
	exit();

	}

//verification validité format email, name, firstname, pseudo 

	//si mail et username non valide
	else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*/", $username )){

		header('location:LandingPage.php?error=invalidmail_username&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&region='.$region.'&status='.$status.'&pass='.$pass.'&passRepeat='.$passRepeat);
		exit();


	}


	//si mail invalide

	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){

		header('location:LandingPage.php?error=invalidmail&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&username='.$username.'&region='.$region.'&status='.$status.'&pass='.$pass.'&passRepeat='.$passRepeat);
		exit();
	}

	//si username invalide <=> contient d'autres caractere que ceux autorisé ds le pattern en 1er parametre de preg_match

	else if (!preg_match("/^[a-zA-Z0-9]*/", $username)){

		header('location:LandingPage.php?error=invalid_username&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&region='.$region.'&status='.$status.'&pass='.$pass.'&passRepeat='.$passRepeat);
		exit();

	}

	//si pass et passRepeat ne match pas

	else if ($pass !== $passRepeat){

		header('location:LandingPage.php?error=passwords_dont_match&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&mail='.$mail.'&username='.$username.'&region='.$region.'&status='.$status);

	exit();
 	}
//verifier que telephone est bien un nombre de 10 chiffre

 	else if (strlen($tel) != 10 || ctype_digit($tel) == false) {

 		header('location:LandingPage.php?error=invalid_tel&name='.$name.'&firstname='.$firstname.'&tel='.$tel.'&mail='.$mail.'&username='.$username.'&region='.$region.'&status='.$status);

 		exit();
 	}


//vérifier si username déja existant, necessaire de faire un appel ds la bdd via une requete sql

	
		try{


			$sql = "SELECT COUNT(*) AS Nb FROM UTILISATEURS WHERE username = ?";
			$params = array($username);
			$data = $db->prepare($sql);
			$data->execute($params);
			$row = $data->fetch();

			if((int) $row['Nb'] === 1){

				//si retourne 1 c'est qu'un enregistrement avec le username rentré par l'utilisateur existe déjà en base => on redirige vers landing page

				header('location:LandingPage.php?error=username_already_existing&name='.$name.'&firstname='.$firstname.'&mail='.$mail.'&tel='.$tel.'&region='.$region.'&status='.$status.'&pass='.$pass.'&passRepeat='.$passRepeat);
				exit();


			}else{

				//nous avons (securisé() $_POST et vérifié la validité des principaux inputs, nous lançons donc la requete d'insertion dans UTILISATEURS de ANIDOM


			

			$sql = 'INSERT INTO UTILISATEURS (nom, prenom, tel, mail, username, regions, statut_utilisateur, pass) VALUES (:nom, :prenom, :tel, :mail, :username, :region, :statut_utilisateur, :pass)';
			$pass = sha1(md5($pass).sha1($mail));
			$params = array(
				':nom'   => htmlspecialchars($name),
				':prenom' => htmlspecialchars($firstname),
				':tel'    => htmlspecialchars($tel),
				':mail'   => htmlspecialchars($mail),
				':username' => htmlspecialchars($username),
				':region'  => htmlspecialchars($region),
				':statut_utilisateur' => htmlspecialchars($status),
				':pass'   => $pass
			);
			$data = $db->prepare($sql);
			$data->execute($params);


			//envoi mail confirmation d'inscription + revoie vers page d'accueil ac message vous pouvez desormais vous connecter en tant que...

			header('location:LandingPage.php?subscribed');

				
			}


		}catch(PDOException $err){

			$err->getMessage();

		}
			
		

		

}
	



