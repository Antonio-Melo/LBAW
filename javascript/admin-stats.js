$(document).ready(function() {
	var order = 1;
	
	$('th').click(function(e) {
		order = (order+1)%2;
		var id = $(this).attr('id');
		var array = $('tr:not(:first-child)');
		
		array.sort(function(a,b) {
			var n1, n2;
			if (id == 'pid' || id == 'pstock' || id == 'pviews' || id == 'pfavorites' || id == 'psales') {
				n1 = parseInt($(a).attr(id));
				n2 = parseInt($(b).attr(id));
			}
			else if (id == 'prating' || id == 'pprice') {
				n1 = parseFloat($(a).attr(id));
				n2 = parseFloat($(b).attr(id));
			}
			else {
				n1 = $(a).attr(id);
				n2 = $(b).attr(id);
			}
			
			if (order == 1) {
				var tmp = n1;
				n1 = n2;
				n2 = tmp;
			}
			
			if (n1 > n2) {
				return 1;
			}
			else if (n1 < n2) {
				return -1;
			}
			else {
				return 0;
			}
		});
		
		$('table').append(array);
	});



});