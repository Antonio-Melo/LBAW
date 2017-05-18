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

	$('#submit').submit(function(e){
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


	/* Review filter rating */
    // Handles the filters of each star according to the situation
    rating_loop($("#review input:checked").attr("value"), 0, 1);

    function rating_loop (val1, filter1, filter2, val2) {
        var filters = [{"-webkit-filter":"none", "-moz-filter":"none", "filter":"none"},
            {"-webkit-filter":"brightness(1) grayscale(1) opacity(.7)","-moz-filter":"brightness(1) grayscale(1) opacity(.7)","filter":"brightness(1) grayscale(1) opacity(.7)"},
            {"-webkit-filter":"brightness(1.2) grayscale(.5) opacity(.9)","-moz-filter":"brightness(1.2) grayscale(.5) opacity(.9)","filter":"brightness(1.2) grayscale(.5) opacity(.9)"}];

        var start, end;
        if (val1 < val2) {start = 0; end = val2;}
        else if (val1 > val2) {start = val2; end = 5;}
        else {start = 0; end = 5;}

        for (var i = start; i < end; i++) {
            if (i < val1) {
                $("#review label").eq(i).css(filters[filter1]);
            }
            else {
                $("#review label").eq(i).css(filters[filter2]);
            }
        }
    }

    $("#review").mouseleave(function() {
        var checked_val = $("#rating input:checked").attr("value");
        rating_loop(checked_val, 0, 1);
    });

    $("#review input").change(function() {
        rating_loop(this.value, 0, 1);
    });

    $("#review label").hover(function() {
        var this_val = $(this).prev().attr("value");
        var checked_val = $("#rating input:checked").attr("value");
        if (checked_val === undefined) {
            checked_val = 0;
        }

        if (this_val < checked_val) {
            rating_loop(this_val, 0, 2, checked_val);
        }
        else if (this_val > checked_val) {
            rating_loop(this_val, 2, 1, checked_val);
        }
        else {
            rating_loop(this_val, 0, 1);
        }
    });
});
