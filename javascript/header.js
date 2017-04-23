var base_url = "/~lbaw1663/LBAW/";

$(document).ready(function(){
		
	// Login
	$("#login").submit(function(e) {
		var url = base_url + "api/login.php";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#login").serialize(),
			success: function(response) {
		        var json = $.parseJSON(response);
		        if (json.status == "true") {
		                document.getElementById("login").reset();
		                $("#authentication-modal").modal("hide");
						location.reload();
		        }
		        else {
		                $('#login-error').text('Wrong credentials');
		        }
		},
		error: function(response) {
		        $('#login-error').text('Internal Error');
		}

		});
		
		e.preventDefault();
	});
	
	// Register
	var valid_username = true, valid_name = true, valid_email = true, valid_password = true;
	$("#register").submit(function(e) {
		var url = base_url + "api/register.php";
		
		if (!valid_username || !valid_name || !valid_email || !valid_password) {
			$('#register-error').text('Invalid credentials');
		}
		else {
			$.ajax({
				type: "POST",
				url: url,
				data: $("#register").serialize(),
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status == "true") {
						document.getElementById("register").reset();
						$('a[href="#login-tab"]').tab("show");				
					}
					else if (json.status == "false"){
						$('#register-error').text('Credentials already in use');
					}
				},
				error: function(response) {
					$('#register-error').text('Internal Error');
				}
			});
		}
		
		e.preventDefault();
	});
	
	// Check register fields
	$("#register-username").blur(function(e) {
		checkValidUsername(this);
		e.preventDefault();
	});
	
	$("#register-email").blur(function(e) {
		checkValidEmail(this);
		e.preventDefault();
	});
	
	$("#register-name").blur(function(e) {
		checkValidName(this);
		e.preventDefault();
	});
	
	$("#register-password, #register-confirm-password").blur(function(e) {
		checkValidPassword('#register-password', '#register-confirm-password');
		e.preventDefault();
	});	
});

function checkValidUsername(element) {
	var url = base_url + "api/check_register.php";
	var username = $(element).val();
	
	valid_username = usernameRestrictions(username);

	if (valid_username) {			
		$.ajax({
			type: "POST",
			url: url,
			data: {
				username: username
			},
			success: function(response) {
				var json = $.parseJSON(response);
				if (json.status == "true") {
					$(element).removeClass("authentication-input-error");
				}
				else {
					// if already in db heighlight
					$(element).addClass("authentication-input-error");
				}
			}
		});
	}
	else if (username != "") {
		$(element).addClass("authentication-input-error");
	}
}

function checkValidName(element) {
	var name = $(element).val();
	valid_name = nameRestrictions(name);
	
	if (valid_name) {		
		$(element).removeClass("authentication-input-error");
	}
	else if (name != ""){
		$(element).addClass("authentication-input-error");
	}
}

function checkValidEmail(element) {
	var url = base_url + "api/check_register.php";
	var email = $(element).val();
	
	valid_email = emailRestrictions(email);
	
	if (valid_email) {		
		$.ajax({
			type: "POST",
			url: url,
			data: {
				email: email
			},
			success: function(response) {
				var json = $.parseJSON(response);
				if (json.status == "true") {
					$(element).removeClass("authentication-input-error");
				}
				else {
					// if already in db heighlight
					$(element).addClass("authentication-input-error");
				}
			}
		});
	}
	else if (email != "") {
		$(element).addClass("authentication-input-error");
	}
}

function checkValidPassword(selector1, selector2) {
	var password = $(selector1).val();
	var c_password = $(selector2).val();
	valid_password = passwordRestrictions(password, c_password);
	
	if (valid_password) {		
		$(selector1).removeClass("authentication-input-error");
		$(selector2).removeClass("authentication-input-error");
	}
	else if (password != "" && c_password != "") {
		$(selector1).addClass("authentication-input-error");
		$(selector2).addClass("authentication-input-error");
	}
}
	
function usernameRestrictions(username) {
	var regex = /^[a-zA-Z0-9]+$/;
	return (regex.test(username) && username.length>=4 && username.length<=24);
}

function emailRestrictions(email) {
	// from http://emailregex.com/
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return (regex.test(email) && email.length<=50);
}

function nameRestrictions(name) {
	return (name.length>=1 && name.length<=50);
}

function passwordRestrictions(password, c_password) {
	return (password==c_password && password.length>=6 && password.length<=128);
}




