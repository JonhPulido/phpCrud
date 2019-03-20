function submitData(){
	const form = document.getElementById("main_form");
	const phone = $('input[id="phoneInput"]').val();
	var re = /(?:\d{3}|\(\d{3}\))([-\/\.])\d{3}\1\d{4}/;  
	const validPhone = (phone) => {  
		var format = re.exec (phone); 
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
				console.log(res)
				alert('form was submitted');
				window.location.href = "http://localhost/TestPhp/contact_list.php";
			}
		});
	}else{
		alert('favor de completar todos los campos requeridos!');
	}
};

function updateContact(){
	const form = document.getElementById("update_form");
	const phone = $('input[id="phoneInput"]').val();
	var re = /(?:\d{3}|\(\d{3}\))([-\/\.])\d{3}\1\d{4}/;  
	const validPhone = (phone) => {  
		var format = re.exec (phone); 
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
	if(count == totalInput && validPhone(phone)){	
		alert('campos bien!')
		$.ajax({
		    type: "POST",
		    url: 'http://localhost/TestPhp/controller/update.php',
		    data: $(form).serialize(),
		    success: function(){
		    	alert('register updated succefully!')
	    		window.location.href = "http://localhost/TestPhp/contact_list.php";
		    }
		});
	}else if (count == totalInput && !validPhone(phone)){
		alert('Pon bien puto numero!')

	}else{
		alert('favor de completar todos los campos requeridos!');
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


