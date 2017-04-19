$(document).ready(function(){
	$("#register").submit(function(e) {
		var url = "{$BASE_URL}actions/users/register.php";
		
		$.ajax({
			type: "POST",
			url: url,
			data: $("#register").serialize(),
			sucess: $('#authentication-modal').modal('hide')
		});		
		
		e.preventDefault();
	});
	
	
	
});