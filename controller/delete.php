<?php
	require_once('../model/mysql_connection.php');
	require_once('../model/CRUD.php');
	header("Access-Control-Allow-Origin: https://php-crud-validations.herokuapp.com");
		
		$id = $_POST['id'];
		$querys = new Modifiers();
		$mensaje = $querys->delete_contact($id);
		echo $mensaje;
?>