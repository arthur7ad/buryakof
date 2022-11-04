$('#blanket-order-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: '/forms/default/blanket-order',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {

            $('#order-modal').modal('hide');

            setTimeout(function tick() {
                $('#blanket-order-form')[0].reset();
                $('#thanks-modal').modal('show');
            }, 500);

//            new jBox('Notice', {
//                content: 'В ближайшее время вам позвонит наш специалист.',
//                color: 'green'
//            });
//            $('#subscribe-form-modal')[0].reset();
//            location.reload();
        }
    });
    return false;
});
