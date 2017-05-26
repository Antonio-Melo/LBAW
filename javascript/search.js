$(document).ready(function() {
	
	/* ============================================================================================= */
	/* Search filters */
	
	/* Search filter slider */
    $("#filter-price-slider").slider({
		range: true,
		min: 0,
		max: 2000,
		slide: function(event, ui) {
			$("#filter-price-amount").val(ui.values[0] + "\u20AC - " + ui.values[1] + "\u20AC");
		}
    });

	if ($("#filter-price-slider").attr("min") && $("#filter-price-slider").attr("max")) {
		$("#filter-price-slider").slider({values: [$("#filter-price-slider").attr("min"), $("#filter-price-slider").attr("max")]});
	}
	else {
		$("#filter-price-slider").slider({values: [0, 2000]});
	}
	
	$("#filter-price-amount").val($("#filter-price-slider").slider("values", 0) + "\u20AC - " + $("#filter-price-slider").slider("values", 1) + "\u20AC");
	
	/* Search filter rating */
	// Handles the filters of each star according to the situation
	rating_loop($("#filter-rating input:checked").attr("value"), 0, 1);
	
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

	$("#filter-search-bttn").click(function(e) {
		var vars = getURLVars();
		
		var keywords = [];
		var keywords_check = $('#filter-categories input[type="checkbox"]:checked');
		for (var i = 0; i < keywords_check.length; i++) {
			keywords[i] = $(keywords_check[i]).attr('id');
		}
		vars["keywords"] = keywords;
		
		var prices = $("#filter-price-slider").slider("option", "values");
		vars["prices"] = prices;
		
		var brands = [];
		var brands_check = $('#filter-brands input[type="checkbox"]:checked');
		for (var i = 0; i < brands_check.length; i++) {
			brands[i] = $(brands_check[i]).attr('id');
		}
		vars["brands"] = brands;
		
		var onsale = $('#scb:checked').val();
		if (onsale != undefined) {
			vars["onsale"] = true;
		}
		else {
			vars["onsale"] = false;
		}
	
		var rating = $('input[name=rating-input]:checked').val();
		if (rating != undefined) {
			vars["rating"] = rating;
		}
		else {
			vars["rating"] = 0;
		}
		
		vars["page"] = 1;
		
		var string = createSerialize(vars);
		window.location = base_url + "pages/search.php" + "?" + string;
		
		e.preventDefault();
	});
	
	
	/* ============================================================================================= */
	/* Search display */
	$("#search-display-bttn").click(function(e) {
		$(this).children("span").toggleClass("glyphicon-th-large");
		$(this).children("span").toggleClass("glyphicon-th-list");
		
		$("#search-results > div + div").not(".page-selector").toggleClass("product-mosaic col-lg-3 col-md-4 col-sm-6 col-xs-6");
		$("#search-results > div + div").not(".page-selector").toggleClass("product-list");
		
		e.preventDefault();
	});
	
	$("#search-order a").click(function(e) {
		var vars = getURLVars();
		vars["order"] = $(this).text();
		var string = createSerialize(vars);
		window.location = base_url + "pages/search.php" + "?" + string;
		
		e.preventDefault();
	});
	
	
	/* Change page */
	$('.page-selector a').click(function(e) {
		var value = $(this).attr("go");
		var vars = getURLVars();
		
		if ($(this).attr("before") && (value > 1)) {
			vars["page"] = parseInt(value)-1;
		}
		else if ($(this).attr("next") && (value < $(this).attr("max"))) {
			vars["page"] = parseInt(value)+1;
		}
		else {
			vars["page"] = value;
		}
		
		
		var string = createSerialize(vars);
		window.location = base_url + "pages/search.php" + "?" + string;
		
		e.preventDefault();
	});
	
	/* ============================================================================================= */
	/* Add/Remove product to favorites/cart */
	$(".product-fav-bttn").click(function(e) {
		var url;		
		if ($(this).hasClass("isFavorite")) {
			url = base_url + "api/removefavorite.php";
		}
		else {
			url = base_url + "api/addfavorite.php";
		}
		var product = $(this).parents('.product-list').attr('id');

		var element = this;
		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
				var json = $.parseJSON(response);
		        if (!json.status) {
					$('#authentication-modal').modal();
				}
				else {
					$(element).toggleClass("isFavorite");
				}
			},
			error: function() {
			}
		});
		
		e.preventDefault();
	});
	
	$(".product-cart-bttn").click(function(e) {
		var url;		
		if ($(this).hasClass("isCart")) {
			url = base_url + "api/removecart.php";
		}
		else {
			url = base_url + "api/addcart.php";
		}

		var product = $(this).parents('.product-list').attr('id');
		
		var element = this;
		$.ajax({
			type: "POST",
			url: url,
			data: {product: product},
			success: function(response) {
				var json = $.parseJSON(response);
		        if (!json.status) {
					$('#authentication-modal').modal();
				}
				else {
					$(element).toggleClass("isCart");
				}
			},
			error: function() {
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
