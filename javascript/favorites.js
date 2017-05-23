$(document).ready(function(){
	$('.remove-favorites-item').click(function(e) {
		var url = base_url + "api/removefavorite.php";
		var element = this;
		var product = $(this).parent().attr('id');

		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
		        $(element).parent().remove();
				
				var n_products = $('.product-list').length;
				if (n_products == 0) {
					$('#empty-favorites').attr('hidden', false);
				}
			}
		});
		
		e.preventDefault();
	});
	
	$('.product-cart-bttn').click(function(e) {
		var url = base_url + "api/addfavoritecart.php";
		var element = this;
		var product = $(this).parents('.product-list').attr('id');
				
		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
		        $(element).parents('.product-list').remove();
				
				var n_products = $('.product-list').length;
				if (n_products == 0) {
					$('#empty-favorites').attr('hidden', false);
				}
			}
		});
		
		e.preventDefault();
	});
});