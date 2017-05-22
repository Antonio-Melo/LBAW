$(document).ready(function(){
	calculateSubtotal();
	
	function calculateSubtotal() {
		var subtotal = 0;
		
		$('.price').each(function() {
			value = parseFloat($(this).text().replace(/,/g,''));
			quantity = parseInt($(this).closest(".product-info-container").find("input").val());
			subtotal += value * quantity;
		});
		
		$('.checkout-subtotal-value').text(parseFloat(subtotal).toFixed(2) + "\u20AC");
	}
	
    $('.quantity-right-plus').click(function(){
        var quantity = parseInt($(this).siblings('input').val());
        if(quantity < 60) {
            $(this).siblings('input').val(quantity + 1);
        }
		calculateSubtotal();
    });

    $('.quantity-left-minus').click(function(){
        var quantity = parseInt($(this).siblings('input').val());
        if(quantity > 1){
            $(this).siblings('input').val(quantity - 1);
        }
		calculateSubtotal();
    });
	
	$('.remove-cart-item').click(function(e) {
		var url = base_url + "api/removecart.php";
		var element = this;
		var product = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
		        $(element).parent().remove();
				calculateSubtotal();
			}
		});
		
		e.preventDefault();
	});
});
