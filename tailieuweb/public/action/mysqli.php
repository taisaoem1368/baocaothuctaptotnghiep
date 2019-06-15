<?php 
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\db\mysqli.php";
$db = new mysqli_db;

if(isset($_GET['moto_create']))
{
	$db->insertMoto($_GET['moto_create']);

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    		exit(json_encode($db->getDataMotos()));
	}
}

if(isset($_GET['moto_update']))
{
	$db->updateMoto($_GET['moto_update']);
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    		exit(json_encode($db->getDataMotos()));
	}
}

if(isset($_GET['id_delete']))
{

	$db->deleteMoto($_GET['id_delete']);
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    		exit(json_encode($db->getDataMotos()));
	}
}