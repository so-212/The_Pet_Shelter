<?php  

require_once('db_connect_inc.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>Pet Shelter</title>
  </head>
  <body class="container">

  	<h1>Liste des animaux</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="LandingPage.php">Accueil</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Liste des animaux</li>
	  </ol>
	</nav>


	<?php 


		try {


			$sql = 'SELECT 
						a.id AS "identifiant",
						a.nom_animal AS "nom",
						e.nom_espece AS "espece",
						u.nom AS "propriétaire",
						a.photo
					FROM
					    (ANIMAUX AS a
					    INNER JOIN ESPECES AS e ON a.esp_id = e.id)
					        INNER JOIN
					    UTILISATEURS AS u ON a.prop_id = u.id';





				// ajout d'une clause where pour les bagdges de landingpage depuis on passe le nom de l'animal en param 




			if(isset($_GET['espece']) && !empty($_GET['espece'])){


				// $espece  = htmlspecialchars($_GET['espece']);
				$sql .= " WHERE e.nom_espece = '".$_GET['espece']."'"; 


			}
			
			$data = $db->prepare($sql);
			$query = $data->execute();
			$req = $data->fetchAll();

			// var_dump($req);


			$html = '<table class="table table-striped table-dark">
 					 <thead>
    					<tr>'; 

    		// recherche du nom de chaque colonne getColumnmeta() en fonction du 
    		// nombre de colonne ->columnCount  
    					
    		for($i = 0; $i < $data->columnCount(); $i++){


    			$meta = $data->getColumnMeta($i);
    			$html .= '<th>'.$meta['name'].'</th>';

    		}

    		$html .= '</tr></thead>
    					<tbody>';

    		foreach ($req as $row) {
				$html .= '<tr>';
				foreach ($row as $col) {
					$html .=  '<td scope="col">'.$col.'</td>';
				}
				$html .= '</tr>';
			}

			$html .= '</tbody></table>'; 

			echo $html;


			
		} catch (PDOException $err) {

			echo '<div class="alert alert-danger">'.$err->getMessage().'</div>';
		}

	?>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
