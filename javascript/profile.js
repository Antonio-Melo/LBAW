var valid_edit_username = true, valid_edit_name = true, valid_edit_email = true, valid_edit_password = false;

$(document).ready(function(){
	var initial_username = $('#info-username').text();
	var initial_name = $('#info-name').text();
	var initial_email = $('#info-email').text();
	var initial_country = $('#info-country').text();
	
	/* ========================================================================*/
	/* Edit account info */
	$('#edit-info').click(function(e) {
		setInitialValues(initial_username, initial_name, initial_email, initial_country);
		toggleAccountInfo();
		e.preventDefault();
	});
	
	$('#save-info').click(function(e) {
		var url = base_url + "api/editinfo.php";
		var avatar = document.getElementById('edit-avatar');
		var file = avatar.files[0];
		var username = $('#edit-username').val();
		var name = $('#edit-name').val();
		var email = $('#edit-email').val();
		var country = $('#edit-country').val();
		
		var form_data = new FormData();
		form_data.append('avatar', file);
		form_data.append('username', username);
		form_data.append('name', name);
		form_data.append('email', email);
		form_data.append('country', country);
		
		
		if (!valid_edit_username || !valid_edit_name || !valid_edit_email) {
			$('#edit-error').text('Invalid credentials');
		}
		else {
			// Change user info
			$.ajax({
				type: "POST",
				url: url,
				data: form_data,
				processData: false,
				contentType: false,
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status == "true") {
						location.reload();
					}
					else {
						$('#edit-error').text('Wrong credentials');
					}
				},
				error: function(response) {
					$('#edit-error').text('Internal Error');
				}
			});
		}
		
		e.preventDefault();
	});
	
	$('#cancel-info').click(function(e) {
		setInitialValues(initial_username, initial_name, initial_name, initial_country);
		toggleAccountInfo();
		e.preventDefault();
	});
	
	$('#edit-username').blur(function(e) {
		if ($(this).val() != initial_username) {
			checkValidUsername(this, 'edit');
		}
		else {
			$(this).removeClass("authentication-input-error");
			valid_edit_username = true;
		}
		e.preventDefault();
	});
	
	$('#edit-name').blur(function(e) {
		checkValidName(this, 'edit');
		e.preventDefault();
	});
	
	$('#edit-email').blur(function(e) {
		if ($(this).val() != initial_email) {
			checkValidEmail(this, 'edit');
		}
		else {
			$(this).removeClass("authentication-input-error");
			valid_edit_email = true;
		}
		e.preventDefault();
	});
	
	/* ========================================================================*/
	/* Change password */
	$('#edit-password').click(function(e) {
		var url = base_url + "api/editpassword.php";
		var old_password = $('#oldpwd').val();
		var new_password = $('#pwd').val();
		
		console.log(old_password, new_password)
		
		if (valid_edit_password) {
			$.ajax({
				type: "POST",
				url: url,
				data: {
					old_password: old_password,
					new_password: new_password
				},
				success: function(response) {
					console.log(response);
					
					var json = $.parseJSON(response);
					if (json.status == "true") {
						$('#edit-password-error').css('color', '#43a047');
						$('#edit-password-error').text('Password changed');	
					}
				},
				error: function(response) {
					$('#edit-password-error').css('color', '#e53935');
					$('#edit-password-error').text('Wrong password');
				}
			});
		}
		else {
			$('#edit-password-error').css('color', '#e53935');
			$('#edit-password-error').text("Passwords don't match");
		}
		
		e.preventDefault();
	});
	
	$('#pwd, #newpwd').blur(function(e) {
		checkValidPassword('#pwd', '#newpwd', 'edit');
		e.preventDefault();
	});
	
});

function toggleAccountInfo() {
	$('#edit-info').toggleClass('hide');
	$('#save-info').toggleClass('hide');
	$('#cancel-info').toggleClass('hide');
	$('#edit-error').toggleClass('hide');
	$('#edit-avatar-label').toggleClass('hide');
	$('.avatar-image-container img').toggleClass('transparent');
	$('#accountInfo .param-content p').toggle('hide');
	$('#edit-username').toggleClass('hide');
	$('#edit-name').toggleClass('hide');
	$('#edit-email').toggleClass('hide');
	$('#edit-country').toggleClass('hide');
}

function setInitialValues(initial_username, initial_name, initial_email, initial_country) {
	$('#edit-username').val(initial_username);
	$('#edit-name').val(initial_name);
	$('#edit-email').val(initial_email);
	var id = $("#edit-country option:contains('"+initial_country+"')").attr('value');
	$('#edit-country').val(id);
}

