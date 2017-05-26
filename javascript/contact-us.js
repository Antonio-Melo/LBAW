$(document).ready(function(){
	$('#ticket').submit(function(e) {
		var url = base_url + "api/contactus.php";
		var element = this;

		$.ajax({
			type: "POST",
			url: url,
			data: $(this).serialize(),
			success: function(response) {
		        var json = $.parseJSON(response);
				if (json.status) {
					$(element).parent().append("<p>Ticket submit successfully!<br>We will email you a response shortly</p>");
					$(element).remove();
				}
			}
		});
		
		e.preventDefault();
	});
});