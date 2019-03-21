const my_func = function(event) {
	event.preventDefault();
};

function submitData(){
	const form = document.getElementById("main_form");
	const phone = $('input[id="phoneInput"]').val();
	const re = /(?:\d{3}|\(\d{3}\))([-\/\.])\d{3}\1\d{4}/;
	form.addEventListener("submit", my_func, true);  
	const validPhone = (phone) => {  
		const format = re.exec (phone); 
		if (!format) {
			return false; 
		}else{
			return true;
		} 
	}
	let count = 0;
	let totalInput = 0;
	$('input[required=true]').each(function(){
		totalInput = totalInput + 1;
		if($(this).val()!=""){
   			count = count + 1;
		}
	 });
	//valida que todos los campos requeridos esten completos
	if(count == totalInput && validPhone(phone)){ 
		$.ajax({
			type: "POST",
			url: 'http://localhost/TestPhp/controller/insert.php',
			data: $(form).serialize(),
			dataType: 'text',
			success : function(res) {
				alert('form was submitted');
				window.location.href = "http://localhost/TestPhp/contact_list.php";
			}
		});
	}else{
		alert('favor de completar todos los campos requeridos!');
	}
};

function updateContact(event){
	const form = document.getElementById("update_form");
	const button = document.getElementById("submitBtn");
	form.addEventListener("submit", my_func, true);

	const validateForm = function(){
		let count = 0;
		const inputsArray = $('input[required=true]');
		inputsArray.each(function(){

			const inputName = $(this).context.name;
			const inputVal = $(this).val();

			if((inputVal != "")){
				if(inputName == 'phone'){
					const regex = /(?:\d{3}|\(\d{3}\))([-\/\.])\d{3}\1\d{4}/;  
					(function(inputVal){ 
						const format = regex.exec (inputVal); 
						if (!format) {
							alert('Invalid phone format');
						}else{
							count = count + 1;
						} 
					})(inputVal);
				}else{
					count = count + 1;
				}	
			}else{
				$(this).addClass("required");
				alert('The field '+inputName+' its required');
				return false;
			}
		});
		if(count == inputsArray.length){
			return true;
		}else{
			return false;
		}
	}
	if(validateForm()){	
		$.ajax({
					type: "POST",
					url: 'http://localhost/TestPhp/controller/update.php',
					data: $(form).serialize(),
					success: function(){
						alert('register updated succefully!')
						window.location.href = "http://localhost/TestPhp/contact_list.php";
					}
				});
	}
};

function deleteContact(id){	
	$.ajax({
	  type: "POST",
	  url: 'http://localhost/TestPhp/controller/delete.php',
	  data:'id=' + id, 
	  success: function (res){
	          		alert(res);
	          		window.location.href = "http://localhost/TestPhp/contact_list.php";
	            }

	});
};


