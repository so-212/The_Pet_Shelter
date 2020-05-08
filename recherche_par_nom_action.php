<!-- <!DOCTYPE html>
<html lang="en">
  <head> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
   <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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


// 		$html = '<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
//   <div class="modal-dialog" role="document">
//     <div class="modal-content">
//       <div class="modal-header">
//         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//         <h4 class="modal-title">Modal title</h4>
//       </div>
//       <div class="modal-body">
//         <p>One fine body&hellip;</p>
//       </div>
//       <div class="modal-footer">
//         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
//         <button type="button" class="btn btn-primary">Save changes</button>
//       </div>
//     </div><!-- /.modal-content -->
//   </div><!-- /.modal-dialog -->
// </div><!-- /.modal -->';

// 		echo $html;



		// $html = '<table class="table table-striped table-dark">
	 // 					 <thead>
	 //    					'; 

		//    foreach ($req as $row) {
		// 	$html .= '<tr>';
		// 	foreach ($row as $col) {
		// 		$html .=  '<td scope="col">'.$col.'</td>';
		// 	}
		// 	$html .= '</tr>';
		// }

		// $html .= '</tr></thead>';




		$html = '<div class="card" style="width: 18rem;">
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

catch(PDOException $err){
	header('location:LandingPage.php');
}



}else{

	// header('location:LandingPage.php');

}


?>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
   


  </body>
</html> -->