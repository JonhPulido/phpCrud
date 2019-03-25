<?php 
	require_once('model/mysql_connection.php');
	require_once('model/CRUD.php');
	$CRUD = new Modifiers();
	$id = $_GET['id'];
	$contact = $CRUD -> contact($id);
?>

<!DOCTYPE html>
<html>
	<head>
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		  <link rel="stylesheet" type="text/css" href="main.css">
		  <script>
			  $(function() {
			    $( "#datepicker" ).datepicker({ 
					format: 'yyyy-mm-dd'
				});
			  } );
		  </script>
		<title>Update Contact</title>
	</head>
	<body>
		<div class="d-flex justify-content-center">
			<h1 >Update Contact</h1>
		</div>
		
		<div class="conteiner">
			<form id="update_form"  onchange="validateForm()">
				<div class="form-group">
					<input name="id" type="hidden" value="<?php echo $id;?>"/>
					<label for="nameInput">Name</label>
					<input 
						type="text"
						name="name" 
						class="form-control" 
						id="nameInput" 
						aria-describedby="emailHelp" 															
						value="<?php echo $contact[1]; ?>" 
				        required='true'
					>
				</div>

				<div>
					<label for="dateInput">Birthday</label>
						<input 
							type="text" 
							id="datepicker"
							class="form-control"
							id="dateInput"
							name="birthday"
							value="<?php echo $contact[6]; ?>"
							required='true'   
						/>
				</div>

			

				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input 
						type="email"
						name="email" 
						class="form-control" 
						id="emailInput" 
						aria-describedby="emailHelp" 														
						placeholder="Enter email"
						value="<?php echo $contact[2]; ?>" 
						required='true'
					/>
				</div>	

				<div class="form-group">
					<label for="passwordInput">Password</label>
					<input 
						type="password"
						name="password" 
						class="form-control" 
						id="passwordInput" 
						aria-describedby="emailHelp" 															
						value="<?php echo $contact[3]; ?>" 
						required='true'
					/>
				</div>		

				<div class="form-group">
					<label for="phoneInput">Phone Number</label>
					<input 
						type="tel" 
						name="phone"
						class="form-control"  
						id="phoneInput"
				        value="<?php echo $contact[4]; ?>"  
				        required='true'
				    />
				</div>
				
				<div class="form-group">
					<label for="exampleInputPassword1">Company</label>
					<input 
						name="company" 
						type="text" 
						class="form-control" 
						id="exampleInputPassword1" 
						placeholder="Company name"
						value="<?php echo $contact[5]; ?>" 
					/>
				</div>
				<div class="form-group">
					<button onclick="updateContact()" type="submit" class="btn btn-primary" disabled='true' id="submitBtn">Submit</button>
					<a class="btn btn-primary" href="contact_list.php">List of contacts</a>
				</div>				

			</form>
		</div>	
	</body>
	 <script src="scripts/script.js"></script>
</html>