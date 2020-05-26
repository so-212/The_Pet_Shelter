<?php 

//ne pas tomber sur "ce document a expiré" au click page precedente navigateur
ini_set('session.cache_limiter','public');
session_cache_limiter(false);


include 'common/session.php';


require_once('common/db_connect_inc.php');

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

  	<h1>administration des animaux</h1>

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

				$espece = htmlspecialchars($_GET['espece']);
				// $espece  = htmlspecialchars($_GET['espece']);
				$sql .= " WHERE e.nom_espece = '".$espece."'"; 


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
    			$types[$meta['name']] = $meta['native_type'];


    		}

    		$html .= '</tr></thead>
    					<tbody>';

    		foreach ($req as $row) {
				$html .= '<tr>';
				foreach ($row as $col => $val) {
					if ($types[$col] === 'BLOB' && $val !== null) {

					    $html .= '<td><img src="'.$val.'" style="width:8em;height:4.5em"></td>';

					}else if($types[$col] === 'BLOB' && $val === null){

                	$html .= '<td><img src="uploads/noir.png" style="width:8em;height:4.5em"></td>';

                }else{

					$html .=  '<td scope="col">'.$val.'</td>';
				}
				}
				$html .= '<td scope="col"><a href="update_animal.php?row='.$row['identifiant'].'" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Modifier</a></td>';

				?>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
				          <div class="modal-dialog modal-lg">
				            <div class="modal-content">
				              <div class="modal-header">
				                <h5 class="modal-title">Modifier animal</h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                  <span aria-hidden="true">&times;</span>
				                </button>
				              </div>
				              <div class="modal-body">

				                <form method="post" action="update_animal.php?row=<?php echo $row['identifiant'] ?>" enctype="multipart/form-data" class="subscription-form">
				                  
				                  <!-- nom -->
				                  <div class="form-group col-xs-3">
				                    <label for="nom">Nom</label>
				                    <input type="text" name="name"  class="form-control" id="nom" required>
				                  </div>

				                <!-- espece -->
				                <div class="form-group">
				                    <label for="exampleFormControlSelect1">Espèces</label>
				                    <select name="espece" class="form-control" id="exampleFormControlSelect1" required>
				                      <!-- gestion dynamique de la liste déroulante via la table REGIONS ac un foreach -->
				                      <?php 
				                    

				                      $sql = 'SELECT nom_espece, id FROM ESPECES';
				                      $data = $db->query($sql);
				                      $row1 = $data->fetchAll();

				                      

				                      foreach ($row1 as $col1) {
				                        $html1 =   '<option value="'.$col1['id'].'">'.$col1['nom_espece'].'</option>';
				                        echo $html1;
				                      }


				                     ?>


				                    </select>
				                  </div>

				                  <!-- propriétaire -->
				                  <div class="form-group">
				                      <label for="exampleFormControlSelect1">propriétaire</label>
				                      <select name="proprietaire" class="form-control" id="exampleFormControlSelect1" required>
				                        <!-- gestion dynamique de la liste déroulante via la table REGIONS ac un foreach -->
				                        <?php 
				                      

				                        $sql = 'SELECT nom, prenom, id FROM UTILISATEURS';
				                        $data = $db->query($sql);
				                        $row2 = $data->fetchAll();

				                        

				                        foreach ($row2 as $col2) {
				                          $html2 =   '<option value="'.$col2['id'].'">'.$col2['nom'].' '.$col2['prenom'].'</option>';
				                          echo $html2;
				                        }


				                       ?>


				                      </select>
				                    </div>




				               

				                  <div class="form-group">

				                         <label for="photo">photos :</label>
				                         <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
				                         <!-- correspond à un Mo -->
				                         <!-- rajouter un input cacher securisant la taille du fichier a inserer, c est une securité pr pas faire sauter le serveur -->
				                         <!-- attention c l input hidden qui va remonter ds le post il faut le corriger -->
				                         <input type="file" class="form-control" name="photo" id="photo">

				                  </div>         


				                 
				                  <button type="submit" name="submit" class="btn btn-primary align-items-center">enregistrer</button>
				                </form>

				              </div>
				              <div class="modal-footer">
				                
				              </div>
				            </div>
				          </div>
				        </div>


				    </div>

			<?php
				// $html .= '<input name="id" value="'.$col1['id'].'" type="hidden">';
				$html .= '<td scope="col"><a href="delete_animal.php?row='.$row['identifiant'].'" type="button" class="btn btn-danger">Supprimer</a></td>';

				$html .= '</tr>';
			}

			$html .= '</tbody></table>'; 

			echo $html;


			
		} catch (PDOException $err) {

			echo '<div class="alert alert-danger">'.$err->getMessage().'</div>';
		}

	?>


	<script>
	        // Branche écouteur sur l'événement WINDOW->ONLOAD
	        window.addEventListener(
	            'load',
	            function() {
	                // Branche écouteur sur les A.BTN-DANGER->ONCLICK
	                let buttons = document.querySelectorAll('a.btn-danger');
	                for (let i = 0; i < buttons.length; i++) {
	                    buttons[i].addEventListener(
	                        'click',
	                        function(evt){
	                            evt.preventDefault(); 
	                            let answer = confirm('Voulez-vous vraiment supprimer cet animal ?');
	                            if (answer) {
	                                location.href = evt.target.href;
	                            }
	                        },
	                        false
	                    );
	                }
	            },
	            false
	        );
	    </script>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
