$(document).ready(function(){
	$("#register").submit(function(e) {
		var url = "{$BASE_URL}actions/register.php";
		
		$.ajax({
			type: "POST",
			url: url,
			data: $("#register").serialize(),
			success: function(response) {
				if (response.status == "true") {
					$('#login-tab').toggleClass('active');
					$('#register-tab').toggleClass('active');
				}
				else {
					$('#register-confirm-password').after('<p style="color:#e53935;text-align:center;margin-top:5px;">Could not register</p>');
				}
			},
			error: function(response) {
				$('#register-confirm-password').after('<p style="color:#e53935;text-align:center;margin-top:5px;">Error</p>');
			}
		});		
		
		e.preventDefault();
	});
	
	
	
});
