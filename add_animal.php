<?php
session_start();
include_once 'common/db_connect_inc.php';


if (isset($_POST['submit'])) {

	$nom = htmlspecialchars($_POST['name']);
	$espece = htmlspecialchars($_POST['espece']);
	// $proprietaire = htmlspecialchars($_POST['proprietaire']);
	$photo = $_POST['MAX_FILE_SIZE'];
	$statut = htmlspecialchars($_POST['statut']);



	if (empty($nom) || empty($espece) || empty($photo) || empty($statut)) {


		header('location:LandingPage.php?error=empty_field&nom='.$nom.'&espece='.$espece.'&photo='.$photo.'&statut='.$statut);
		exit();


	}
	
	//Récuperation du fichier à téléverser 

	if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {

		//variables de $_FILE

		$file_name = $_FILES['photo']['name'];

		//extension du fichier par extraction de la string apres le . (apres nom du fichier)
		$file_ext = strtolower(substr($file_name, strrpos($file_name, '.') + 1));

		$file_size = $_FILES['photo']['size'];

		 // Type du fichier (Ex.: application/pdf OU text/css OU image/png)
		$file_type = $_FILES['photo']['type'];

			// Adresse du fichier temporaire avant upload
	    $file_temp = $_FILES['photo']['tmp_name'];

	    // Extensions autorisées
	    $allowed_ext = array('bmp', 'gif', 'jpg', 'jpeg', 'png');


	    //gestion des erreurs

	    $errors = array();

	    //si extension incorrectes

	    if (!in_array($file_ext, $allowed_ext)) {

	    	$errors[] = '<p>Extension ' . $file_ext . ' non autorisée : ' . implode(',', $allowed_ext);

	    }

	    //si taille trop grande
	    if ($file_size > $_POST['MAX_FILE_SIZE']){

	    	$errors = '<p>Fichier trop lourd : '.$_POST['MAX_FILE_SIZE'].'  octets maximum';

	    }

	    //le fichier est valide on peut le traiter 

	    if (empty($errors)) {
	    	//conversion image en base 64 ac reassignation valeur $photo
	    	$bin = file_get_contents($file_temp);
			$base64 = 'data:' . $file_type . ';base64,' . base64_encode($bin); 
			$photo = $base64;

			//versement du fichier uploadé dans les dossier upload
			if (!move_uploaded_file($file_temp, 'uploads/' . $file_name)) {
			    echo '<p>Erreur dans le téléversement du fichier : ' . $file_name;
			    echo '<p><a href="index.php">Retour page d\'accueil</a>';
			    exit(); 
			}

	    }else{

	    	foreach ($errors as $error) {
	    	    echo $error;
	    	    echo '<p><a href="index.php">Retour page d\'accueil</a>';
	    	    exit();
	    	}	
	    
	    }

	}else{

	    	$photo = null;
	    }



	try {
		$sql = 'INSERT INTO ANIMAUX (nom_animal, photo, statut_animal, esp_id, prop_id) VALUES (:name, :photo, :statut_animal, :esp_id, :prop_id)';
		$params = array(

			':name' => $nom,
			':photo' => $photo,
			':statut_animal' => $statut,
			':esp_id' => $espece,
			':prop_id' => $_SESSION['userId']

		);



		$data = $db->prepare($sql);
		$data->execute($params);

		header('location:LandingPage.php?addsuccess');

		
	} catch(PDOException $err){
		

		echo $err->getMessage();

	}
	
}