$(document).ready(function(){
	var subtotal = 0;
	calculateSubtotal();
	
	function calculateSubtotal() {
		subtotal = 0;
		
		$('.price').each(function() {
			value = parseFloat($(this).text().replace(/,/g,''));
			quantity = parseInt($(this).closest(".product-info-container").find('#quantity')[0].textContent);
			subtotal += value * quantity;
		});
		
		$('.checkout-subtotal-value').text(parseFloat(subtotal).toFixed(2) + "\u20AC");
	}
	
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
	
	$('.select-address').click(function(e) {
		var addressID = $(this).attr('id');
		var innerhtml = $('#' + addressID).children(":first").html();
		$('#selectedAddressInfo')[0].innerHTML = innerhtml;
		$('.selectedAddress')[0].setAttribute("id", addressID);
		$('.selectedAddress').removeClass('hide');
		$('.selectedAddress').addClass('show');
	});
	
	$('.change-address').click(function(e) {
		$('#submit-order').prop('disabled', true);
		$('.selectedShipping').removeClass('show');
		$('.selectedShipping').addClass('hide');
		$('.selectedPayment').removeClass('show');
		$('.selectedPayment').addClass('hide');
		$('.selectedBillingAddress').removeClass('show');
		$('.selectedBillingAddress').addClass('hide');
		$('.collapse#shippingAddress').collapse("show");
		$('.collapse#shippingMethod').collapse("hide");
		$('.collapse#paymentMethod').collapse("hide");
		$('.collapse#billingAddress').collapse("hide");
		$('.selectedAddress').removeClass('show');
		$('.selectedAddress').addClass('hide');
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
	
	$('.select-shipping-method').click(function(e) {
		var shippingID = $(this).attr('name');
		var shipping = $(this).attr('id');
		var innerhtml = $('#' + shipping).children(":first").html();
		$('#selectedShippingInfo')[0].innerHTML = innerhtml;
		$('.selectedShipping')[0].setAttribute("id", shippingID);
		$('.selectedShipping').removeClass('hide');
		$('.selectedShipping').addClass('show');
		
		var value = 0;
		if (shipping == "Priority") {
			value = 10;
		} else if (shipping == "Standard") {
			value = 20;
		} else if (shipping == "Expedited") {
			value = 25;
		}
		subtotal += value;
		$('.checkout-subtotal-value').text(parseFloat(subtotal).toFixed(2) + "\u20AC");
	});
	
	$('.change-shipping').click(function(e) {
		var selected = $(this).parent().children().find("h4")[0].textContent;
		$('#submit-order').prop('disabled', true);
		$('.selectedPayment').removeClass('show');
		$('.selectedPayment').addClass('hide');
		$('.selectedBillingAddress').removeClass('show');
		$('.selectedBillingAddress').addClass('hide');
		$('.collapse#shippingMethod').collapse("show");
		$('.collapse#paymentMethod').collapse("hide");
		$('.collapse#billingAddress').collapse("hide");
		$('.selectedShipping').removeClass('show');
		$('.selectedShipping').addClass('hide');
		
		var value = 0;
		if (selected == "Priority Direct Mail") {
			value = 10;
		} else if (selected == "Standard Shipping") {
			value = 20;
		} else if (selected == "Expedited Shipping") {
			value = 25;
		}
		subtotal -= value;
		$('.checkout-subtotal-value').text(parseFloat(subtotal).toFixed(2) + "\u20AC");
	});
	
	$('.select-payment-method').click(function(e) {
		var payment = $(this).attr('name');
		var paymentID = $(this).attr('id');
		var innerhtml = $('#' + paymentID).children(":first").html();
		$('#selectedPaymentInfo')[0].innerHTML = innerhtml;
		$('.selectedPayment')[0].setAttribute("id", payment);
		$('.selectedPayment').removeClass('hide');
		$('.selectedPayment').addClass('show');
	});
	
	$('.change-payment-method').click(function(e) {
		$('#submit-order').prop('disabled', true);
		$('.selectedBillingAddress').removeClass('show');
		$('.selectedBillingAddress').addClass('hide');
		$('.collapse#paymentMethod').collapse("show");
		$('.collapse#billingAddress').collapse("hide");
		$('.selectedPayment').removeClass('show');
		$('.selectedPayment').addClass('hide');
	});
	
	$('.select-billing-address').click(function(e) {
		var addressID = $(this).attr('id');
		var innerhtml = $('#' + addressID).children(":first").html();
		$('#selectedBillingAddressInfo')[0].innerHTML = innerhtml;
		$('.selectedBillingAddress')[0].setAttribute("id", addressID);
		$('.selectedBillingAddress').removeClass('hide');
		$('.selectedBillingAddress').addClass('show');
		$('#submit-order').prop('disabled', false);
	});
	
	$('.change-billing-address').click(function(e) {
		$('#submit-order').prop('disabled', true);
		$('.collapse#billingAddress').collapse("show");
		$('.selectedBillingAddress').removeClass('show');
		$('.selectedBillingAddress').addClass('hide');
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
	
	$('#submit-order').click(function(e) {
		var url = base_url + "api/addorder.php";
		var element = $('#cart-results')[0];
		var products = element.querySelectorAll("#quantity");
		var shipping_address = $('.selectedAddress').eq(0).attr('id');
		var billing_address = $('.selectedBillingAddress').eq(0).attr('id');
		var shipping_method = $('.selectedShipping').eq(0).attr('id');
		var payment_method =  $('.selectedPayment').eq(0).attr('id');
		/* reference */
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		if (dd < 10) {
			dd = '0' + dd
		}
		if (mm < 10) {
			mm = '0' + mm
		}
		var date_ordered = yyyy + '-' + mm + '-' + dd;
		
		var reference = "BAT" + yyyy + mm + dd;
		var numbers = "0123456789";
		for (i=0; i<11; i++) {
        	reference += numbers.charAt(Math.floor(Math.random() * numbers.length));
		}
		
		$.ajax({
			type: "POST",
			url: url,
			data: {reference: reference, date_ordered: date_ordered, billing_address: billing_address, shipping_address: shipping_address, shipping_method: shipping_method, payment_method: payment_method },
			success: function(response) {
				var json = $.parseJSON(response);
		        if (!json.status) {
					$('#authentication-modal').modal();
				}
			},
			error: function() {
			}
		});
		e.preventDefault();
		
		//url = base_url + "api/addproductsorder.php";
		for (i=0; i<products.length; i++) {
			var product = products[i].getAttribute("name");
			var price_paid = products[i].getAttribute("class");
			var nr_units = products[i].getAttribute("value");
			
			$.ajax({
				type: "POST",
				url: url,
				data: {reference: reference, product: product, price_paid: price_paid, nr_units: nr_units },
				success: function(response) {
					console.log(response);
					var json = $.parseJSON(response);
					if (!json.status) {
						$('#authentication-modal').modal();
					}
				},
				error: function() {
				}
			});
			e.preventDefault();
		}
	});
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

