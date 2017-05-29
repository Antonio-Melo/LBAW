$(document).ready(function(){
	$('#add-to-cart').click(function(e) {
		var url;
		var element = this;
		var product = $(this).parents('.items-display').attr('id');
		
		var adding;
		if ($(this).text().trim() == "Remove from Cart") {
			adding = false;
			url = base_url + "api/removecart.php";
		}
		else {
			adding = true;
			url = base_url + "api/addcart.php";
		}
		
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
					if (adding) {
						$(element).html("<span class='glyphicon glyphicon-shopping-cart'></span> Remove from Cart");
					}
					else {
						$(element).html("<span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart");
					}
				}
			},
			error: function() {
			}
		});
		
		e.preventDefault();
	});

	$('#add-to-fav').click(function(e) {
		var url;
		var element = this;
		var product = $(this).parents('.items-display').attr('id');
		
		var adding;
		if ($(this).text().trim() == "Remove from Favorites") {
			adding = false;
			url = base_url + "api/removefavorite.php";
		}
		else {
			adding = true;
			url = base_url + "api/addfavorite.php"
		}

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
					if (adding) {
						$(element).html("<span class='glyphicon glyphicon-heart'></span> Remove from Favorites");
					}
					else {
						$(element).html("<span class='glyphicon glyphicon-heart'></span> Add to Favorites");
					}
				}
			},
			error: function() {
			}
		});
		
		e.preventDefault();
	});

	$('.report-link').click(function(e) {
		var id_review = $(this).attr("review");
		var element = $(this).closest('.media-body').children().last();
		var value = $(this).attr('name');
		if(value == "off") {
            $('<div class="write_report">' +
                '<form name="report-form" review='+id_review+' method="post">' +
                	'<label for="comment_report">Report:</label>' +
                	'<textarea class="form-control" name="text_report" rows="5"></textarea>' +
                	'<button type="submit" class="btn btn-success product-buttons button">Report</button>' +
                '</form>' +
			'</div>').insertAfter(element);
            $(this).attr('name', "on");
			$(this).closest('.media-body').children('p').remove();
        }else{
            $(this).attr('name',"off");
			$(this).closest('.media-body').children('.write_report').remove();
		}
		
		
	});
	
	$('.media-body').on('submit', 'form[name="report-form"]', function (e) {
		var url = base_url +"api/report.php";
        var id_review = $(this).attr("review");
		var text = $(this).children('textarea').val();
		
		var form_data = new FormData();
		form_data.append('id_review', id_review);
		form_data.append('text_report', text);
		
		var parent = $(this).closest('.write_report');
		var report_link = $(this).closest('.media-body').find('.report-link');
		
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
			processData: false,
			contentType: false,
            success: function(response) {
				var json = $.parseJSON(response);
                if (json.status) {
					$('<p>Report sent successfully. Thanks!</p>').insertAfter(parent);
					$(parent).remove();
					$(report_link).attr('name',"off");
                }
				else {
					$('<p>Report sent successfully. Thanks!</p>').insertAfter(parent);
					$(parent).remove();
					$(report_link).attr('name',"off");
				}
            },
			error: function(response) {
				$('<p>Could not send report. Please try again later.</p>').insertAfter(parent);
				$(parent).remove();
				$(report_link).attr('name',"off");
			}
		});
        e.preventDefault();
    });
	
	$('.reply-link').click(function(e) {
		var id_review = $(this).attr("id");
		var element = $(this).closest('.media-body').children().last();
		var value = $(this).attr('name');
		if(value == "off") {
            $('<div class="write_reply">' +
                '<form id="reply" name="reply-form" review='+id_review+' method="post">' +
                	'<label for="comment_reply">Comment:</label>' +
                	'<textarea class="form-control" name="text_reply" rows="5" id="comment_reply"></textarea>' +
                	'<button type="submit" class="btn btn-success product-buttons button">Reply</button>' +
                '</form>' +
			'</div>').insertAfter(element);
            $(this).attr('name', "on");
        }else{
            $(this).attr('name',"off");
			$(this).closest('.media-body').children('.write_reply').remove();
		}
	});

	$('.media-body').on('submit', 'form[name="reply-form"]', function (e) {
		var url = base_url +"api/reply.php";
        var id_review = $(this).attr("review");
		var text = $(this).children('textarea').val();
		var element = $(this);
		var form_data = new FormData();
		form_data.append('id_review', id_review);
		form_data.append('text_reply', text);
		
        $.ajax({
            type: "POST",
            url: url,
            data: form_data,
			processData: false,
			contentType: false,
            success: function(response) {
                var json = $.parseJSON(response);
                
				if (json.user_image == null && json.admin) {
					json.user_image = "common/default_admin.png";
				}
				else if (json.user_image == null) {
					json.user_image = "common/default_client.png";
				}
				
                if (json.status) {
                    $('<div class="media">'+
                        '<div class="media-left">'+
                        '<img class="media-object answer-pic" src="../images/users/' + json.user_image + '" alt="' + json.user_name + '">'+
                        '</div>'+
                        '<div class="media-body">'+
                        '<h4 class="media-heading">' + json.user_name + ' </h4>'+
                        '<p>'+json.text_reply+'</p>'+
                        '</div>'+
                        '</div>'+
                        '<hr>').insertAfter(element.parent('.write_reply').siblings().last());
					element.parent('.write_reply').remove();
                }
            }
		});
        e.preventDefault();
    });

	$("#review").submit(function(e){
		var url = base_url + "api/review.php";
		var stuff = qs();
		var id = stuff['id'];
        $.ajax({
			type: "POST",
			url: url,
			data: $("#review").serialize() + "&id=" +id,
			success: function(response) {
		        var json = $.parseJSON(response);

				if (json.status) {
                    document.getElementById("review").reset();
					
					var rating = "";
					for (var i = 0; i < json.rating; i++) {
						rating += '<img class="star" src="../images/products/common/star.png" alt="'+json.rating+'"> '
					}
					
					if (json.user_image == null) {
						json.user_image = "common/default_client.png";
					}
					
					$('<div class="media">'+
						'<div class="media-left">'+
							'<img class="media-object" src="../images/users/' + json.user_image + '" alt="' + json.user_name + '">'+
						'</div>'+
						'<div class="media-body">'+
							'<h4 class="media-heading">' + json.user_name + ' </h4>'+
							'<span>'+rating+'</span>'+
							'<p>'+json.comment+'</p>'+
						'</div>'+
					'</div>'+
					'<hr>').insertAfter('#customer-rv hr:last-of-type');
		        }
			}
		});
		
		e.preventDefault();
	});
    function qs() {"use strict";
        var query, parms, i, pos, key, val, qsp;
        qsp = {};
        query = location.search.substring(1);
        parms = query.split('&');
        for (i=parms.length-1; i>=0; i--) {
            pos = parms[i].indexOf('=');
            if (pos > 0) {
                key = parms[i].substring(0,pos);
                val = parms[i].substring(pos+1);
                qsp[key] = val;
            }
        }
        return qsp;
    }

	$("#faq form").submit(function(e){
		var url = base_url + "api/addfaq.php";
        $.ajax({
			type: "POST",
			url: url,
			data: $(this).serialize(),
			success: function(response) {
		        var json = $.parseJSON(response);

				if (json.status) {
                    $("#faq .list-group").empty();
					
					for (let faq of json.faqs) {
						$("#faq .list-group").append(
							'<a href=#'+faq.id+' class="list-group-item" data-toggle="collapse">'+faq.question+' <i class="fa fa-caret-down"></i></a>'+
							'<div class="collapse answer" id='+faq.id+'>'+
								'<br><p>'+faq.answer+'</p>'+
							'</div>'
						);						
					}
		        }
			}
		});
		
		e.preventDefault();
	});
	
	
	
	
	
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
});
