<?php
// include 'common/session.php';


 
include_once 'common/db_connect_inc.php';


if(isset($_POST['name']) && !empty($_POST['name'])){

	$pet_name = htmlspecialchars($_POST['name']);

	try{
		$sql = 'SELECT 
				    a.id AS "identifiant",
				    a.nom_animal AS "nom",
				    e.nom_espece AS "espece",
				    u.nom AS "propriétaire",
				    a.photo
			   FROM
		    		(ANIMAUX AS a
		       INNER JOIN ESPECES AS e ON a.esp_id = e.id)
		       INNER JOIN UTILISATEURS AS u ON a.prop_id = u.id
			   WHERE
					a.nom_animal = ?';

		$param = array($pet_name);

		$data = $db->prepare($sql);
		$query = $data->execute($param);
		$req = $data->fetchAll();


		if($req){

				$html = '<div id="myScrollspy" class="card mt-5 mb-5" style="width: 18rem;">
				  <img src="img/noir.png" class="card-img-top" alt="...">
				  <div class="card-body">';


				foreach($req as $row => $col){

				    	$html .= '<h5 class="card-title">Nom :'.$col['nom'].'</h5>
								 <p class="card-text">Espèce :'.$col['espece'].'<br>Propriétaire :'.$col['propriétaire'].'</p>
								    <a href="LandingPage.php" class="btn btn-primary">Retour à l\'accueil</a>
								  </div>
								</div>';

				    }

			echo $html;
		}

		}//bloc try

	catch(PDOException $err){
		$err->getMessage();
	}

}//bloc if isset...




?>

