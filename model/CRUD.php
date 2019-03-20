<?php 
	class Modifiers 
	{	
		public function get_contacts(){
			$rows = null;
			$model = new Conection();
			$conection = $model->get_conection();
			$sql = "SELECT * FROM contact";
			$statement = $conection->prepare($sql);
			$statement->execute();
			while($result = $statement->fetch()){
				$rows[] = $result;
			}
			return $rows;
		}

		public function contact($id){
			$contact =
			$model = new Conection();
			$conection = $model->get_conection();
			$sql = "SELECT * FROM contact WHERE id = :id";
			$statement = $conection->prepare($sql);
			$statement -> bindParam(':id', $id);
			if(!$statement){
				return "Something went wrong wit the deletion";
			}else{
				$statement -> execute();
				$result = $statement->fetch();
				return $result;
	
			}
		}


		public function insert_contact($name,$email,$password,$phone_num,$company,$birthday){
			$model = new Conection();
			$conection = $model->get_conection();
			$sql = "insert into contact (name, email, password, phone_num,company,birthday) 
					values (:name, :email, :password, :phone_num, :company, :birthday )";
			$statement = $conection->prepare($sql);
			$statement -> bindParam(':name', $name );
			$statement -> bindParam(':email', $email );
			$statement -> bindParam(':password', $password );
			$statement -> bindParam(':phone_num', $phone_num );
			$statement -> bindParam(':company', $company );
			$statement -> bindParam(':birthday', $birthday );
			if(!$statement){
				return "Something went wrong wit the insertion";
			}else{
				$statement -> execute();
				return "Succefully register";
			}
		}

		public function update_contact($id,$name,$email,$password,$phone_num,$company,$birthday){
			$model = new Conection();
			$conection = $model->get_conection();
			  $sql = "UPDATE contact SET name = :name, email = :email, password = :password, phone_num = :phone_num, company = :company, birthday = :birthday WHERE id=:id";
			$statement = $conection->prepare($sql);
			$statement -> bindParam(':id', $id );
			$statement -> bindParam(':name', $name );
			$statement -> bindParam(':email', $email );
			$statement -> bindParam(':password', $password );
			$statement -> bindParam(':phone_num', $phone_num );
			$statement -> bindParam(':company', $company );
			$statement -> bindParam(':birthday', $birthday );
			if(!$statement){
				return "Something went wrong wit the update";
			}else{
				$statement -> execute();
				return "Succefully updated";
			}
		}

		public function delete_contact($id){
			$model = new Conection();
			$conection = $model->get_conection();
			$sql = "DELETE FROM contact WHERE id = :id";
			$statement = $conection->prepare($sql);
			$statement -> bindParam(':id', $id);
			if(!$statement){
				return "Something went wrong wit the deletion";
			}else{
				$statement -> execute();
				return "Succefully deleted";
			}
		}

	}
?> 