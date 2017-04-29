$(document).ready(function(){
	$('#add-to-cart').click(function(e) {
		var url = base_url + "api/addcart.php";
		var element = this;
		var product = $(this).parents('.items-display').attr('id');
		
		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
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
	});
    
	$('#add-to-fav').click(function(e) {
		var url = base_url + "api/addfavorite.php";
		var element = this;
		var product = $(this).parents('.items-display').attr('id');

		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
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
	});

	$('submit').submit(function(e){
		var url = base_url + "api/review.php";

		$.ajax({
			type: "POST",
			url: url,
			data: $("#submit").serialize(),
			success: function(response) {
		        var json = $.parseJSON(response);
		        	if (json.status == "true") {
					document.getElementById("submit").reset();
		        	}
			}
		});
		
		e.preventDefault();
	});
});
