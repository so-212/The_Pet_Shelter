<?php 

try {
	

		$sql = 'SELECT 
				    e.nom_espece espece, COUNT(*) AS Nb
				FROM
				    animal AS a
				        INNER JOIN
				    espece AS e USING (id_esp)
				GROUP BY espece DESC
				ORDER BY Nb';




		// $params = array('espece', 'Nb');

		$data = $db->prepare($sql);
		$query = $data->execute();
		$req = $data->fetchAll();

		// var_dump($data);

		$html = '';

		foreach ($req as $row => $col) {

				 $html .= '<a href="liste_animaux.php?espece='.$col['espece'].'" class="btn btn-primary mr-2">'.
				  $col['espece'].' <span class="badge badge-light ml-3 mr-3">'.$col['Nb'].'</span>
				</a>';

		}

				echo $html;


			

} catch (PDOException $err) {


	$err->getMessage();

	
}
