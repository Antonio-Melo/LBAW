var base_url = "/~lbaw1663/product/";

$(document).ready(function(){
		
	// Login
	$("#login").submit(function(e) {
		var url = base_url + "api/login.php";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#login").serialize(),
			success: function(response) {
				console.log(response);
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
		var url = base_url + "api/check_register.php";
		var username = $(this).val();
		
		valid_username = checkValidUsername(username);
	
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
						$("#register-username").removeClass("authentication-input-error");
					}
					else {
						// if already in db heighlight
						$("#register-username").addClass("authentication-input-error");
					}
				}
			});
		}
		else if (username != "") {
			$("#register-username").addClass("authentication-input-error");
		}
	
		e.preventDefault();
	});
	
	$("#register-email").blur(function(e) {
		var url = base_url + "api/check_register.php";
		var email = $(this).val();
		
		valid_email = checkValidEmail(email);
		
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
						$("#register-email").removeClass("authentication-input-error");
					}
					else {
						// if already in db heighlight
						$("#register-email").addClass("authentication-input-error");
					}
				}
			});
		}
		else if (email != "") {
			$("#register-email").addClass("authentication-input-error");
		}
	
		e.preventDefault();
	});
	
	$("#register-name").blur(function(e) {
		var name = $(this).val();
		valid_name = checkValidName(name);
		
		if (valid_name) {		
			$(this).removeClass("authentication-input-error");
		}
		else if (name != ""){
			$(this).addClass("authentication-input-error");
		}
	
		e.preventDefault();
	});
	
	$("#register-password, #register-confirm-password").blur(function(e) {
		var password = $("#register-password").val();
		var c_password = $("#register-confirm-password").val();
		valid_password = checkValidPassword(password, c_password);
		
		if (valid_password) {		
			$("#register-password").removeClass("authentication-input-error");
			$("#register-confirm-password").removeClass("authentication-input-error");
		}
		else if (password != "" && c_password != "") {
			$("#register-password").addClass("authentication-input-error");
			$("#register-confirm-password").addClass("authentication-input-error");
		}
	
		e.preventDefault();
	});	
});

function checkValidUsername(username) {
	var regex = /^[a-zA-Z0-9]+$/;
	return (regex.test(username) && username.length>=4 && username.length<=24);
}

function checkValidEmail(email) {
	// from http://emailregex.com/
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return (regex.test(email) && email.length<=50);
}

function checkValidName(name) {
	var regex = /^([a-z]+[,.]?[ ]?|[a-z]+['-]?)+$/;
	return (regex.test(name) && name.length>=1 && name.length<=50);
}

function checkValidPassword(password, c_password) {
	return (password==c_password && password.length>=6 && password.length<=128);
}





