//$('#gruzchik-calc').on('beforeSubmit', function (evt) {
//
//    evt.preventDefault();
//    var formData = $(this).serialize();
//    $.ajax({
//        url: '/calc/default/gruzchik-calc',
//        type: 'POST',
//        data: formData,
//        cache: false,
//        processData: false,
//
//        success: function (response) {
//
//            new jBox('Notice', {
//                content: 'В ближайшее время вам позвонит наш специалист.',
//                color: 'green'
//            });
////            $('#subscribe-form-modal')[0].reset();
////            location.reload();
//        }
//    });
//    return false;
//});

$('#gruz-calc').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: '/calc/default/gruz-calc',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {

            new jBox('Notice', {
                content: 'В ближайшее время вам позвонит наш специалист.',
                color: 'green'
            });
//            $('#subscribe-form-modal')[0].reset();
//            location.reload();
        }
    });
    return false;
});

$('#per-calc').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: '/calc/default/per-calc',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {

            new jBox('Notice', {
                content: 'В ближайшее время вам позвонит наш специалист.',
                color: 'green'
            });
//            $('#subscribe-form-modal')[0].reset();
//            location.reload();
        }
    });
    return false;
});
