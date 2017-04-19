$(document).ready(function(){
	$("#register").submit(function(e) {
		var url = "/~lbaw1663/LBAW/actions/register.php";
						
		$.ajax({
			type: "POST",
			url: url,
			data: $("#register").serialize(),
			success: function(response) {
				console.log(response);
				var json = $.parseJSON(response);
				if (json.status == "true") {
					document.getElementById("register").reset();
					$('a[href="#login-tab"]').tab("show");				
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
