<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Pet Shelter</title>
  </head>
  <body class="container">
 -->


<?php 
include_once 'db_connect_inc.php';


if(isset($_POST['name']) && !empty($_POST['name'])){

	$pet_name = htmlspecialchars($_POST['name']);

	try{
		$sql = 'SELECT 
				    a.id_ani AS "identifiant",
				    a.nom_animal AS "nom",
				    e.nom_espece AS "espece",
				    p.nom AS "propriétaire",
				    a.photo
			   FROM
		    		(animal AS a
		       INNER JOIN espece AS e USING(id_esp))
		       INNER JOIN proprietaire AS p USING(id_prop)
			   WHERE
					a.nom_animal = ?' ;

		$param = array($pet_name);

		$data = $db->prepare($sql);
		$query = $data->execute($param);
		$req = $data->fetchAll();


		if($req){

				$html = '<div id="myScrollspy" class="card mt-5" style="width: 18rem;">
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
		header('location:LandingPage.php');
	}

}//bloc if isset...




?>

