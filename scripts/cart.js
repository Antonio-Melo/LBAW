$(document).ready(function(){
	calculateSubtotal();
	
	function calculateSubtotal() {
		var subtotal = 0;
		
		$('.price-value').each(function() {
			subtotal += parseInt($(this).text());
		});
		
		
		$('.checkout-subtotal-value').text(subtotal + "€");
	}
	
    $('.quantity-right-plus').click(function(){
        var quantity = parseInt($(this).siblings('input').val());
        if(quantity < 60) {
            $(this).siblings('input').val(quantity + 1);
        }
    });

    $('.quantity-left-minus').click(function(){
        var quantity = parseInt($(this).siblings('input').val());
        if(quantity > 1){
            $(this).siblings('input').val(quantity - 1);
        }
    });
	
	$('.remove-cart-item').click(function() {
		$(this).parent().remove();
		calculateSubtotal();
	});

});