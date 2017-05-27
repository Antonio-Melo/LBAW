var valid_reset_password = false;

$(document).ready(function(){
	$('#confirm, #password').blur(function(e) {
		checkValidPassword('#confirm', '#password', 'reset');
		e.preventDefault();
	});
	
	$('#reset').submit(function(e) {		
		if (!valid_reset_password) {
			$('#edit-password-error').css('color', '#e53935');
			$('#edit-password-error').text("Invalid passwords");
			e.preventDefault();
		}
	});
});