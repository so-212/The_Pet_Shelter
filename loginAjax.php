<?php 

include_once 'common/db_connect_inc.php';

$username = isset($_GET['username']) ? $_GET['username'] : '';

$mdp = isset($_GET['password']) ? $_GET['password'] : '';

$ok = true;
$message = array();



if(!isset($username) || empty($username)){

	$ok = false;
	$message[] = "renseignez un login";
	echo json_encode(
		array("ok" => $ok, "message" => $message)
	);

}
if(!isset($mdp) || empty($mdp)){

	$ok = false;
	$message[] = "renseignez un mot de passe";
	echo json_encode(

		array("ok" => $ok, "message" => $message)
	);
}

//remettre si mdp & login non rempli
if(!isset($username, $mdp) || (empty($mdp) && empty($username))){

	$ok = false;
	$message[] = "mot de passes et username vides";
	echo json_encode(

		array("ok" => $ok, "message" => $message)
	);

}


if($ok){

	$sql = 'SELECT id, nom, prenom, COUNT(*) AS nb FROM UTILISATEURS WHERE mail = :mail AND pass = :pass GROUP BY id, nom, prenom';

	$params = array(
		//ne pas utiliser count mais id from utilisateur et limit 1 
		':mail' => $username,
		':pass' => sha1(md5($mdp) . sha1($username))
	);

	
	$data = $db->prepare($sql);
	$data->execute($params);
	$row = $data->fetch();
	

	if((int) $row['nb'] === 1){

		echo json_encode(

			array('ok' => $ok, 'message' => $message)
		);
	}else{


		$ok = false;
		$message[] = 'login et mot de passe incorrectes'; 
		echo json_encode(

			array('ok' => $ok, 'message' => $message)
		);
	}

}

