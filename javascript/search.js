$(document).ready(function() {
	
	/* ============================================================================================= */
	/* Search filters */
	
	/* Search filter slider */
    $("#filter-price-slider").slider({
		range: true,
		min: 0,
		max: 2000,
		values: [0, 2000],
		slide: function(event, ui) {
			$("#filter-price-amount").val(ui.values[0] + "\u20AC - " + ui.values[1] + "\u20AC");
		}
    });
	
	$("#filter-price-amount").val($("#filter-price-slider").slider("values", 0) + "\u20AC - " + $("#filter-price-slider").slider("values", 1) + "\u20AC");
	
	/* Search filter rating */
	// Handles the filters of each star according to the situation
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
				$("#filter-rating label").eq(i).css(filters[filter1]);
			}
			else {
				$("#filter-rating label").eq(i).css(filters[filter2]);
			}
		}
	}
	
	$("#filter-rating").mouseleave(function() {
		var checked_val = $("#filter-rating input:checked").attr("value");
		rating_loop(checked_val, 0, 1);
	});
	
	$("#filter-rating input").change(function() {
		rating_loop(this.value, 0, 1);
	});
	
	$("#filter-rating label").hover(function() {
		var this_val = $(this).prev().attr("value");
		var checked_val = $("#filter-rating input:checked").attr("value");
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

	
	/* ============================================================================================= */
	/* Search display */
	$("#search-display-bttn").click(function() {
		$(this).children("span").toggleClass("glyphicon-th-large");
		$(this).children("span").toggleClass("glyphicon-th-list");
		
		$("#search-results > div").toggleClass("product-mosaic col-lg-3 col-md-4 col-sm-6 col-xs-6");
		$("#search-results > div").toggleClass("product-list");
	});
	
	$("#search-order a").click(function() {
		var vars = getURLVars();
		vars["order"] = $(this).text();
		var string = createSerialize(vars);
		window.location = base_url + "pages/search.php" + "?" + string;
		//$("#search-order-bttn").html($(this).text() + " &nbsp;&nbsp;<span class='caret'></span>");
	});
	
	/* ============================================================================================= */
	/* Add product to favorites/cart */
	$("#product-fav-bttn").click(function(e) {
		var url = base_url + "api/addfavorite.php";
		var product = $(this).parents('.product-list').attr('id');

		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
			}
		});
		
		e.preventDefault();
	});
	
	$("#product-cart-bttn").click(function(e) {
		var url = base_url + "api/addcart.php";
		var product = $(this).parents('.product-list').attr('id');
		
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

/* For search side nav */
function openNav() {
	document.getElementById("search-filters").style.setProperty("display", "block", "important");
	document.getElementById("search-mobile-background-filter").style.setProperty("display", "block", "important");
}

function closeNav() {
	document.getElementById("search-filters").style.setProperty("display", "none");
	document.getElementById("search-mobile-background-filter").style.setProperty("display", "none");
}
