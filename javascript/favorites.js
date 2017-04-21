$(document).ready(function(){
	$('.remove-favorites-item').click(function() {
		var url = base_url + "api/removefavorite.php";
		var element = this;
		var product = $(this).attr('id');

		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
		        $(element).parent().remove();
			}
		});
		
		e.preventDefault();
	});
});