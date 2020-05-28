<?php 

//connexion a la bdd + requete sql 

include 'common/db_connect_inc.php';

$sql = 'SELECT * FROM ANIMAUX WHERE id = ? ';

$params = array($_GET['id']);

$data = $db->prepare($sql);
$data->execute($params);

$row = $data->fetch();

echo json_encode($row);




?>
