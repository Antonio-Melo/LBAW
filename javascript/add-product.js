$(document).ready(function(){

    $("#add-product").submit(function (e) {
        var url = base_url +"api/add-product.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#add-product").serialize(),
            success: function(response) {
                var json = $.parseJSON(response);

                if (json.status) {

                }
            }
        });
        e.preventDefault();
    });
});