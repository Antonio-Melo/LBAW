$(document).ready(function(){
    $(".dropdown-menu li a").click(function(){
        $(this).parent().parent().siblings().text($(this).text());
        $(this).closest('.dropdown-container').children('input').val($(this).parent().attr('value'));
    });
});