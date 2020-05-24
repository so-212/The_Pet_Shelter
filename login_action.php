<?php 

if (isset($_POST['submit'])) {



// on verifie que utilisateur a bien rempli les champs sinon renvoie à page d accueil avec message d erreur 

	if (empty($_POST['mail'])) {

		header('location:LandingPage.php?error=mailisempty');
		exit();

	}else{

		if (empty($_POST['pass'])) {
			
			header('location:LandingPage.php?error=mailisempty');
			exit();

		}else{

			// les champs ont bien été rempli, on les securise

			$login = htmlspecialchars($_POST['mail']);
			$pass = htmlspecialchars($_POST['pass']);
			$pass = sha1(md5($pass) . sha1($login));

			// on verifie si les champs existent deja en base

			include_once 'common/db_connect_inc.php';

			$sql = 'SELECT id, COUNT(*) AS nb FROM UTILISATEURS WHERE mail = :mail AND pass = :pass GROUP BY id LIMIT 1';
			$params = array(

				//ne pas utiliser count mais id from utilisateur et limit 1 

				':mail' => $login,
				':pass' => $pass

			);

			$data = $db->prepare($sql);
			$data->execute($params);
			$row = $data->fetch();


			// si $row retourne une ligne c est que l utilisateur existe pr ce login et mdp

			if((int) $row['nb'] === 1){

				
				// var_dump($row['id']);

				session_start();
				$_SESSION['mail'] = $login;
				$_SESSION['connected'] = true;
				$_SESSION['userId'] = $row['id'];

				//rajouter session id utilisateur + nom + Prenom pour dire bonjour à l'utilisateur

				header('location:LandingPage.php?auth=true');


			}else{

				header('location:LandingPage.php?auth=false');
			}





		}
	}


}