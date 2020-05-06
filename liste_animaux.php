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

    <!-- jumbotron's stylesheet -->

    <link rel="stylesheet" href="css/landingPage.css">

    <title>Pet Shelter</title>
  </head>
  <body class="container">

  	<h1>Liste des animaux</h1>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Liste des animaux</li>
	  </ol>
	</nav>

	<?php 


		try {


			$sql = 'SELECT a.id_ani AS "identifiant", a.nom_animal AS "nom", e.nom_espece AS "espece", p.nom AS "propriétaire", a.photo
				FROM (animal AS a INNER JOIN espece AS e ON a.id_esp = e.id_esp) INNER JOIN proprietaire AS p ON a.id_prop = p.id_prop';
			
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
