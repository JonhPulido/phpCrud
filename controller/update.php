<?php
	require_once('../model/mysql_connection.php');
	require_once('../model/CRUD.php');

	$mensaje = null;
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone_num = $_POST['phone'];
	$company = $_POST['company'];
	$birthday = $_POST['birthday'];

	$querys = new Modifiers();
	$mensaje = $querys->update_contact($id,$name,$email,$password,$phone_num,$company,$birthday);
	return $mensaje;

?>