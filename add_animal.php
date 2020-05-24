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
	// verifier validité des inputs

	// liste déroulante 
	// prendre le name de selcet name = 

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