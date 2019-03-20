<?php
	class Conection {
		public function get_conection(){
			$user = "root";
			$pass = "";
			$host = "localhost";
			$db = "test";
			$conection = new PDO ("mysql:host=$host;dbname=$db;",$user, $pass);
			return $conection;
		}
	}
?>