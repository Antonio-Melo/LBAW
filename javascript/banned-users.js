$(document).ready(function() {


    $('.review-input').submit(function(e){
        var e = $(this);
        console.log($(this));
        var id = $(this).attr('id');
        console.log(id);
        var url = base_url +"api/unban.php";

        $.ajax({
            type: "POST",
            url: url,
            data: '&id='+id,
            sucess: function(response) {
                var json = $.parseJSON(response);
                console.log(json.status);
                if (json.status) {
                    e.remove();
                }
            }
        });
    });
});