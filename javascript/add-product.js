$(document).ready(function(){

    $("#add-product").submit(function (e) {
        var url = base_url +"api/add-product.php";
        var keyword = $('#types-search-order-bttn').attr('value');
        var brand = $('#brands-search-order-bttn').attr('value');
		
        $.ajax({
            type: "POST",
            url: url,
            data: $("#add-product").serialize()+ '&keyword='+keyword +'&brand='+brand,
            success: function(response) {
                var json = $.parseJSON(response);
                console.log(json.status);
                if (json.status) {

                }
            }
        });
        e.preventDefault();
    });

    $(".dropdown-menu li a").click(function(){
        console.log($(this).parent().parent().siblings());
        $(this).parent().parent().siblings().text($(this).text());
        $(this).parent().parent().siblings().val($(this).parent().attr('value'));

    });
});