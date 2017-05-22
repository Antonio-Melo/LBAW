var valid_edit_username = true, valid_edit_name = true, valid_edit_email = true, valid_edit_password = false;

$(document).ready(function(){
	
	/* ========================================================================*/
	/* Addresses */
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
				if (json.status) {
					$(element).parents('li').remove();
				}
			}
		});
		
		e.preventDefault();
	});
	
	var street, door, zip, city, region, country, phone;
	$('.edit-address').click(function(e) {
		setAddressVars(this);
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
					if (json.status) {
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
		street = $('#address-add-street').val();
		door = $('#address-add-door-number').val();
		zip = $('#address-add-postal-zip').val();
		city = $('#address-add-city').val();
		region = $('#address-add-region').val();
		country = $('#address-add-country').val();
		phone = $('#address-add-telephone').val();
		
		var url = base_url + "api/addaddress.php";		
		if (street!="" && door!="" && zip !="" && city!="" && region!="" && country!="" && phone!="") {
			$.ajax({
				type: "POST",
				url: url,
				data: {street: street, door: door, zip: zip, city: city, region: region, country: country, phone: phone},
				success: function(response) {
					var json = $.parseJSON(response);
					if (json.status) {
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

function toggleAddress(element) {
	$(element).toggleClass('hide');
	$(element).siblings('.select-address').toggleClass('hide');
	$(element).siblings('.edit-address').toggleClass('hide');
	$(element).siblings('.delete-address').toggleClass('hide');
	$(element).siblings('.save-address').toggleClass('hide');
	$(element).siblings('.cancel-address').toggleClass('hide');
	$(element).siblings('.addressEdit').toggleClass('hide');
	$(element).siblings('.addressInfo').toggleClass('hide');	
}

