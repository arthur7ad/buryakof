$(document).ready(function () {

    $("[href ^='#']").click(function () {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({
            scrollTop: destination
        }, 650);
        return false;
    });




});


$('body').on('click', '#modal-menu .list-unstyled a', function () {

    console.log(1);


    $('#modal-menu').modal('hide');

})


function HideModal() {
    $('#modal-menu').modal('hide');
    console.log(1);
}
