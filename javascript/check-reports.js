$(document).ready(function(){
    /* Change page */
    $('.page-selector a').click(function(e) {
        var value = $(this).attr("go");
        var page;

        if ($(this).attr("before") && (parseInt(value) > 1)) {
            page = parseInt(value)-1;
        }
        else if ($(this).attr("next") && (parseInt(value) < $(this).attr("max"))) {
            page = parseInt(value)+1;
        }
        else {
            page = parseInt(value);
        }

        window.location = base_url + "pages/check-reports.php" + "?page=" + page;

        e.preventDefault();
    });
});