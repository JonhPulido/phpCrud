<?php
	require_once('../model/mysql_connection.php');
	require_once('../model/CRUD.php');
		
		$id = $_POST['id'];
		$querys = new Modifiers();
		$mensaje = $querys->delete_contact($id);
		echo $mensaje;
?>