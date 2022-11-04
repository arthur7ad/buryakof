$('#contact-form').on('beforeSubmit', function (evt) {

    evt.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: '/forms/default/contact-form',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {
            $('#contact-form-modal').modal('hide');

            setTimeout(function tick() {
                $('#contact-form')[0].reset();
                $('#thanks-modal').modal('show');
            }, 500);
//            new jBox('Notice', {
//                content: 'Успешно отправлено',
//                color: 'green'
//            });
//            $('#subscribe-form-modal')[0].reset();
//            location.reload();
        }
    });
    return false;
});
