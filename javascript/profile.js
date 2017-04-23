$(document).ready(function(){
	$('#edit-info').click(function(e) {
		toggleAccountInfo();
		
	});
	
	$('#save-info').click(function(e) {
		toggleAccountInfo();
		
	});
	
	$('#cancel-info').click(function(e) {
		toggleAccountInfo();
		
	});
	
	
	var initial_username = $('#edit-username').val();
	$('#edit-username').blur(function(e) {
		if ($(this).val() != initial_username) {
			checkValidUsername(this);
		}
		else {
			$(this).removeClass("authentication-input-error");
		}
		e.preventDefault();
	});
	
	$('#edit-name').blur(function(e) {
		checkValidName(this);
		e.preventDefault();
	});
	
	var initial_email = $('#edit-username').val();
	$('#edit-email').blur(function(e) {
		if ($(this).val() != initial_email) {
			checkValidEmail(this);
		}
		else {
			$(this).removeClass("authentication-input-error");
		}
		e.preventDefault();
	});
	
	$('#pwd, #newpwd').blur(function(e) {
		checkValidPassword('#pwd', '#newpwd');
		e.preventDefault();
	});
});

function toggleAccountInfo() {
	$('#edit-info').toggleClass('hide');
	$('#save-info').toggleClass('hide');
	$('#cancel-info').toggleClass('hide');
	$('#edit-avatar-label').toggleClass('hide');
	$('.avatar-image-container img').toggleClass('transparent');
	$('#accountInfo .param-content p').toggle('hide');
	$('#edit-username').toggleClass('hide');
	$('#edit-name').toggleClass('hide');
	$('#edit-email').toggleClass('hide');
	$('#edit-country').toggleClass('hide');
}