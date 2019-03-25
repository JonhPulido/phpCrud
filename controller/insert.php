<?php
	require_once('../model/mysql_connection.php');
	require_once('../model/CRUD.php');
	header("Access-Control-Allow-Origin: https://php-crud-validations.herokuapp.com");

	$mensaje = null;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone_num = $_POST['phone'];
	$company = $_POST['company'];
	$birthday = $_POST['birthday'];

	$querys = new Modifiers();
	$mensaje = $querys->insert_contact($name,$email,$password,$phone_num,$company,$birthday);
	echo'asgasgasgas';
	echo $mensaje;
?>