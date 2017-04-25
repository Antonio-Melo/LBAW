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
			}
		});
		
		e.preventDefault();
	});
});
