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
	
	/* ========================================================================*/
	/* My addresses */
	$(".delete-address").click(function(e) {
		var id = $(this).parents('.adressCard').attr('id');
		var url = base_url + "api/removeaddress.php";
		var element = this;
		
		$.ajax({
			type: "POST",
			url: url,
			data: {address: id},
			success: function(response) {
				var json = $.parseJSON(response);
				if (json.status == "true") {
					$(element).parents('li').remove();
				}
			}
		});
		
		e.preventDefault();
	});
	
	var street, door, zip, city, region, country, phone;
	$('.edit-address').click(function(e) {
		toggleAddress(this);		
	});
	
	$('.save-address').click(function(e) {
		var id = $(this).parents('.adressCard').attr('id');
		var url = base_url + "api/editaddress.php";
		setAddressVars(this);
		
		if (street!="" && door!="" && zip !="" && city!="" && region!="" && country!="" && phone!="") {
			$.ajax({
				type: "POST",
				url: url,
				data: {id: id, street: street, door: door, zip: zip, city: city, region: region, country: country, phone: phone},
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status == "true") {
						location.reload();
					}
				}
			});
		}
	});
	
	$('.cancel-address').click(function(e) {
		toggleAddress(this);
		$(this).siblings('.addressEdit').children('.address-edit-street').val(street);
		$(this).siblings('.addressEdit').children('.address-edit-door-number').val(door);
		$(this).siblings('.addressEdit').children('.address-edit-postal-zip').val(zip);
		$(this).siblings('.addressEdit').children('.address-edit-city').val(city);
		$(this).siblings('.addressEdit').children('.address-edit-region').val(region);
		$(this).siblings('.addressEdit').children('.address-edit-country').val(country);
		$(this).siblings('.addressEdit').children('.address-edit-telephone').val(phone);
	});
	
	$('#add-address-button').click(function(e) {
		$('#add-address-input').toggleClass('hide');
	});
	
	$('#save-add-address').click(function(e) {
		var street = $('#address-add-street').val();
		var door = $('#address-add-door-number').val();
		var zip = $('#address-add-postal-zip').val();
		var city = $('#address-add-city').val();
		var region = $('#address-add-region').val();
		var country = $('#address-add-country').val();
		var phone = $('#address-add-telephone').val();
		
		var url = base_url + "api/addaddress.php";		
		if (street!="" && door!="" && zip !="" && city!="" && region!="" && country!="" && phone!="") {
			$.ajax({
				type: "POST",
				url: url,
				data: {street: street, door: door, zip: zip, city: city, region: region, country: country, phone: phone},
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status == "true") {
						location.reload();
					}
				}
			});
		}
	});
	
	$('#cancel-add-address').click(function(e) {
		$('#add-address-input').toggleClass('hide');
		$('#address-add-street').val("");
		$('#address-add-door-number').val("");
		$('#address-add-postal-zip').val("");
		$('#address-add-city').val("");
		$('#address-add-region').val("");
		$('#address-add-telephone').val("");
	});
	
	function setAddressVars(element) {
		street = $(element).siblings('.addressEdit').children('.address-edit-street').val();
		door = $(element).siblings('.addressEdit').children('.address-edit-door-number').val();
		zip = $(element).siblings('.addressEdit').children('.address-edit-postal-zip').val();
		city = $(element).siblings('.addressEdit').children('.address-edit-city').val();
		region = $(element).siblings('.addressEdit').children('.address-edit-region').val();
		country = $(element).siblings('.addressEdit').children('.address-edit-country').val();
		phone = $(element).siblings('.addressEdit').children('.address-edit-telephone').val();
	}
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

function toggleAddress(element) {
	$(element).toggleClass('hide');
	$(element).siblings('.edit-address').toggleClass('hide');
	$(element).siblings('.delete-address').toggleClass('hide');
	$(element).siblings('.save-address').toggleClass('hide');
	$(element).siblings('.cancel-address').toggleClass('hide');
	$(element).siblings('.addressEdit').toggleClass('hide');
	$(element).siblings('.addressInfo').toggleClass('hide');	
}

