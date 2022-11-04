$(document).ready(function () {

    $(function () {
        $('[data-tooltip="tooltip"]').tooltip()
    })


    $('.dropdown-toggle').dropdownHover({delay: 300});
    $('.dropdown-toggle').click(function () {
        window.location = $(this).attr('href');
    });


//    $('body').on('mouseenter', '#blanketorder-filedoc', function () {
//        console.log($(this));
//        console.log($(this).attr('label'));
//        console.log($(this).attr('value'));
//        console.log($(this).val());
//
//       
//    })

    $(document).ready(function(){
        $(".all_review .row").owlCarousel({
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:3000,
                    autoplayHoverPause:true,
                    loop:true
                },
                1000:{
                    items:4,
                    nav:false,
                    autoplay:false,
                    autoplayTimeout:1000,
                    autoplayHoverPause:true
                }
            }
        });
    });


// Закрыить индексацию меню
    $('#menu').before('<!--noindex-->');
    $('#menu').after('<!--/noindex-->');
});



function FuckButton(el) {

    var str = el.val();

    str = str.replace("fakepath", "");
    str = str.replace("C:", "");
    str = str.replace("\\", "");
    str = str.replace("\\", "");

    $('.btn-file .hidden-xs').html(str);

//        console.log(str);
}