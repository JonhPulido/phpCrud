let ban = false;

function prevDef(event) {
	ban = true;
	event.preventDefault();
};

function validateForm(){
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
						$(this).addClass("required");
						alert('Invalid phone format');
					}else{
						count = count + 1;
					} 
				})(inputVal);
			}else{
				count = count + 1;
			}	
		}else{
			if (ban){
				$(this).addClass("required");
				alert('The field '+inputName+' its required')
			};
			return false;
		}
	});
	if(count == inputsArray.length){
		document.getElementById("submitBtn").disabled = false;
		return true;
	}else{
		return false;
	}
}


function submitData(){
	const form = document.getElementById("main_form");
	form.addEventListener("submit", prevDef, true);  
	if(validateForm()){ 
		$.ajax({
			type: "POST",
			url: 'https://php-crud-validations.herokuapp.com/controller/insert.php',
			data: $(form).serialize(),
			dataType: 'text',
			success : function(res) {
				alert('form was submitted');
				window.location.href = "https://php-crud-validations.herokuapp.com/contact_list.php";
			}
		});
	}else{
		alert('favor de completar todos los campos requeridos!');
	}
};

function updateContact(){
	const form = document.getElementById("update_form");
	form.addEventListener("submit", prevDef, true);
	if(validateForm()){	
		$.ajax({
					type: "POST",
					url: 'https://php-crud-validations.herokuapp.com/controller/update.php',
					data: $(form).serialize(),
					success: function(){
						alert('register updated succefully!')
						window.location.href = "https://php-crud-validations.herokuapp.com/contact_list.php";
					}
				});
	}
};

function deleteContact(id){	
	$.ajax({
	  type: "POST",
	  url: 'https://php-crud-validations.herokuapp.com/controller/delete.php',
	  data:'id=' + id, 
	  success: function (res){
	          		alert(res);
	          		window.location.href = "https://php-crud-validations.herokuapp.com/contact_list.php";
	            }

	});
};


