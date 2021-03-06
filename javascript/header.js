var base_url = "/~lbaw1663/LBAW/";

var valid_register_username = false, valid_register_name = false, valid_register_email = false, valid_register_password = false;

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
		        if (json.status && !json.banned) {
					location.reload();
		        }
				else if (json.banned && json.date_unban) {
					$('#login-error').text('Account banned until '+json.date_unban);
				}
				else if (json.banned) {
					$('#login-error').text('Account banned indefinitely');
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
	$("#register").submit(function(e) {
		var url = base_url + "api/register.php";
		
		checkValidUsername('#register-username', 'register');
		checkValidEmail('#register-email', 'register');
		checkValidName('#register-name', 'register');
		checkValidPassword('#register-password', '#register-confirm-password', 'register');
		
		if (!valid_register_username || !valid_register_name || !valid_register_email || !valid_register_password) {
			$('#register-error').text('Invalid credentials');
		}
		else {
			$.ajax({
				type: "POST",
				url: url,
				data: $("#register").serialize(),
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status) {
						document.getElementById("register").reset();
						$('a[href="#login-tab"]').tab("show");
					}
					else {
						$('#register-error').text('Fill in everything');
					}
				},
				error: function(response) {
					$('#register-error').text('Credentials already in use');
				}
			});
		}
		
		e.preventDefault();
	});
	
	// Check register fields
	$("#register-username").blur(function(e) {
		checkValidUsername(this, 'register');
		e.preventDefault();
	});
	
	$("#register-email").blur(function(e) {
		checkValidEmail(this, 'register');
		e.preventDefault();
	});
	
	$("#register-name").blur(function(e) {
		checkValidName(this, 'register');
		e.preventDefault();
	});
	
	$("#register-password, #register-confirm-password").blur(function(e) {
		checkValidPassword('#register-password', '#register-confirm-password', 'register');
		e.preventDefault();
	});
	
	// Display errors
	$('.error-sign').hover(
	function() {
		$(this).siblings('.error-message').removeClass('hide');
    },
	function() {
		$(this).siblings('.error-message').addClass('hide');
    });
	
	// Footer newsletter
	$('#newsletter-bttn').click(function (e) {
		if ($('#newsletter-input').val() != "") {
			$('#newsletter-input').val("Thanks for subscribing!");
			$('#newsletter-input').attr('readonly', true);
			$('#newsletter-input').css({'background-color': '#fff'});
		}
	});
});

// Changes global validity variables
function setValid(bool, where, what) {	
	if (where == 'register') {
		if (what == 'username') {
			valid_register_username = bool;
		}
		else if (what == 'email') {
			valid_register_email = bool;
		}
		else if (what == 'name') {
			valid_register_name = bool;
		}
		else if (what == 'password') {
			valid_register_password = bool;
		}
	}
	else if (where == 'edit') {
		if (what == 'username') {
			valid_edit_username = bool;
		}
		else if (what == 'email') {
			valid_edit_email = bool;
		}
		else if (what == 'name') {
			valid_edit_name = bool;
		}
		else if (what == 'password') {
			valid_edit_password = bool;
		}
	}
	else if (where == 'reset') {
		if (what == 'password') {
			valid_reset_password = bool;
		}
	}
}

function checkValidUsername(element, where) {
	var url = base_url + "api/checkregister.php";
	var username = $(element).val();

	if (usernameRestrictions(username)) {			
		$.ajax({
			type: "POST",
			url: url,
			data: {
				username: username
			},
			success: function(response) {
				var json = $.parseJSON(response);
				if (json.status) {
					$(element).removeClass("authentication-input-error");
					$(element).siblings('.error-sign').addClass('hide');
					setValid(true, where, 'username');
				}
				else {
					// if already in db heighlight
					$(element).addClass("authentication-input-error");
					$(element).siblings('.error-sign').removeClass('hide');
					setValid(false, where, 'username');
				}
			},
			error: function(response) {
				$('#login-error').text('Internal Error');
			}
		});
	}
	else if (username != "") {
		$(element).addClass("authentication-input-error");
		$(element).siblings('.error-sign').removeClass('hide');
		setValid(false, where, 'username');
	}
	else {
		setValid(false, where, 'username');
	}
}

function checkValidName(element, where) {
	var name = $(element).val();
	
	if (nameRestrictions(name)) {		
		$(element).removeClass("authentication-input-error");
		$(element).siblings('.error-sign').addClass('hide');
		setValid(true, where, 'name');
	}
	else if (name != ""){
		$(element).addClass("authentication-input-error");
		$(element).siblings('.error-sign').removeClass('hide');
		setValid(false, where, 'name');
	}
	else {
		setValid(false, where, 'name');
	}
}

function checkValidEmail(element, where) {
	var url = base_url + "api/checkregister.php";
	var email = $(element).val();
	
	if (emailRestrictions(email)) {		
		$.ajax({
			type: "POST",
			url: url,
			data: {
				email: email
			},
			success: function(response) {
				var json = $.parseJSON(response);
				if (json.status) {
					$(element).removeClass("authentication-input-error");
					$(element).siblings('.error-sign').addClass('hide');
					setValid(true, where, 'email');
				}
				else {
					// if already in db heighlight
					$(element).addClass("authentication-input-error");
					$(element).siblings('.error-sign').removeClass('hide');
					setValid(false, where, 'email');
				}
			},
			error: function(response) {
				$('#login-error').text('Internal Error');
			}
		});
	}
	else if (email != "") {
		$(element).addClass("authentication-input-error");
		$(element).siblings('.error-sign').removeClass('hide');
		setValid(false, where, 'email');
	}
	else {
		setValid(false, where, 'email');
	}
}

function checkValidPassword(selector1, selector2, where) {
	var password = $(selector1).val();
	var c_password = $(selector2).val();
	
	if (passwordRestrictions(password, c_password)) {		
		$(selector1).removeClass("authentication-input-error");
		$(selector1).siblings('.error-sign').addClass('hide');
		$(selector2).removeClass("authentication-input-error");
		setValid(true, where, 'password');
	}
	else if (password != "" && c_password != "") {
		$(selector1).addClass("authentication-input-error");
		$(selector1).siblings('.error-sign').removeClass('hide');
		$(selector2).addClass("authentication-input-error");
		setValid(false, where, 'password');
	}
	else {
		setValid(false, where, 'password');
	}
}
	
function usernameRestrictions(username) {
	var regex = /^[a-zA-Z0-9]+$/;
	return (regex.test(username) && username.length>=4 && username.length<=24);
}

function emailRestrictions(email) {
	// from http://emailregex.com/
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return (regex.test(email) && email.length<=128);
}

function nameRestrictions(name) {
	return (name.length>=1 && name.length<=50);
}

function passwordRestrictions(password, c_password) {	
	return (password==c_password && password.length>=6 && password.length<=128);
}

function getURLVars() {
	var gets = [];
    var url = decodeURIComponent(window.location.search.substring(1));
    var vars = url.split('&');
	
    for (i = 0; i < vars.length; i++) {
		var param = vars[i].split('=');
		if (param[1] !== undefined) {
			gets[param[0]] = param[1];
		}
	}
	
	return gets;
}

function createSerialize(array) {
	var string = "";
	
	var i = 1;
	for (var key in array) {
		if (i != 1) {
			string += "&";
		}
		
		string += key + "=" + array[key];
		i++;
	}
	
	return string;
}



