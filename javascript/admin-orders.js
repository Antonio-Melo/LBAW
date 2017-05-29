$(document).ready(function (e) {
	$('.ship, .deliver').click(function(e) {
		var url = base_url + "api/handleorder.php";
		var element = this;
		var id = $(this).closest('tr').attr('id');
		var type;
		if ($(this).hasClass('ship')) {
			type = "ship";
		}
		else if ($(this).hasClass('deliver')) {
			type = "deliver";
		}
		else {
			return;
		}

		$.ajax({
			type: "POST",
			url: url,
			data: {id: id, type: type},
			success: function(response) {				
		        var json = $.parseJSON(response);				
				if (json.status) {
					if (type == "ship") {
						$(element).closest('tr').find('.hidden').removeClass('hidden');
					}
					$(element).parent().html(json.date);
				}
			},
			error: function(response) {}
		});
		
		e.preventDefault();
	});
});