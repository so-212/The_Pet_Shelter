<?php 
include 'common/session.php';

include 'common/db_connect_inc.php';

$delete = htmlspecialchars($_GET['row']);

try {

	$sql = 'DELETE FROM ANIMAUX WHERE id = :id';

	$param = array(':id' => $delete);
	$data = $db->prepare($sql);
	$data->execute($param);

	header('location:ajout_suppr_modif_animaux.php');
	
} catch (PDOException $err){
	
	echo $err->getMessage();

}