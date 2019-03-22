<?php 
	require_once('model/mysql_connection.php');
	require_once('model/CRUD.php');

	function load_contacts(){
		$rows = new Modifiers();
			$consulta = $rows->get_contacts();
			echo "<table class='table'>
				<thead class=' justify-content-between'>
						<tr>
							<th>Name</th>
							<th>e-mail</th>
							<th>Phone Number</th>
							<th>Company</th>
							<th>Birth Day</th>
						</tr>
				</thead>";		
			if(isset($consulta)){
				foreach ($consulta as $row) {
				echo "<tbody>";
					echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['email']."</td>";
						echo "<td>".$row['phone_num']."</td>";
						echo "<td>".$row['company']."</td>";
						echo "<td>".$row['birthday']."</td>";
						echo "<td id='deleteBtn'><button class='btn btn-danger' onclick='deleteContact(".$row['id'].")'>Eliminar</td>";
						echo "<td id='updateBtn'><a class='btn btn-primary' href='./update_contact.php?id=".$row['id']."'>Update</td>";
					echo "</tr>";
						}
					}
				echo "</tbody>";
			echo "</table>";

			echo "
				<script type='text/javascript' src='./scripts/script.js'></script>
				<script src='https://code.jquery.com/jquery-1.12.4.js'></script>
		 		<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
			";		
	}
?>
