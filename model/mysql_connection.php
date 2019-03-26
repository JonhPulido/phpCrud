<?php
	class Conection {
		public function get_conection(){
			$user = "b7d25c8d9f22d2";
			$pass = "8eb30af5";
			$host = "us-cdbr-iron-east-03.cleardb.net";
			$db = "heroku_d17110f89ab0fc8";
			$conection = new PDO ("mysql:host=$host;dbname=$db;",$user, $pass);
			return $conection;
		}
	}
?>