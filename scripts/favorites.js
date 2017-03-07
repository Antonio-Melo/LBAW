$(document).ready(function(){
	$('.remove-favorites-item').click(function() {
		$(this).parent().remove();
	});
});