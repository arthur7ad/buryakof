$('#callback-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: '/forms/default/call-back',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {

            console.log(response);

//            $('#callback-form-modal').modal('hide');
//            new jBox('Notice', {
//                content: 'В ближайшее время вам повзонит наш специалист.',
//                color: 'green'
//           });
//            $('#subscribe-form-modal')[0].reset();
//            location.reload();

//            $('#callback-form-modal').on('hidden.bs.modal', function (e) {
//
//            });

            $('#callback-form-modal').modal('hide');

            setTimeout(function tick() {
                $('#callback-form')[0].reset();
                $('#thanks-modal').modal('show');
            }, 500);


        }
    });
    return false;
});





$('body').on('click', '[data-target="#order-modal"]', function () {
//    console.log(1);

    var title = $(this).attr('data-title');

    $('#order-title').val(title);

})
