$('#order-form').on('beforeSubmit', function (e) {

    e.preventDefault();

    $.get("/forms/default/order?=" + $(this).serialize())
            .done(function (data) {

//                console.log(data);

                if (data == 1) {

                    console.log(data);

//                    new jBox('Notice', {
//                        content: 'Заявка отправлена',
//                        color: 'green'
//                    });

                    $('#order-modal').modal('hide');
                    $('#order-form')[0].reset();
                    $('#thanks-modal').modal('show');
                }
            });
});

$('#callback-form').on('beforeSubmit', function (e) {

    e.preventDefault();

    $.get("/forms/default/call-back?=" + $(this).serialize())
            .done(function (data) {

//                console.log(data);

                if (data == 1) {

                    console.log(data);

//                    new jBox('Notice', {
//                        content: 'Заявка отправлена',
//                        color: 'green'
//                    });

                    $('#callback-form-modal').modal('hide');
                    $('#callback-form')[0].reset();
                    $('#thanks-modal').modal('show');
                }
            });
});

$('#order-form').on('submit', function (e) {

    e.preventDefault();
});

$('#callback-form').on('submit', function (e) {

    e.preventDefault();
});

$('#vacancy-form').on('submit', function (e) {

    e.preventDefault();
});

$('#partner-form').on('submit', function (e) {

    e.preventDefault();
});

$('#calcorder-form').on('beforeSubmit', function (e) {

    e.preventDefault();

    $.get("/forms/default/calc-form?=" + $(this).serialize())
            .done(function (data) {

//                console.log(data);

                if (data == 1) {

                    console.log(data);

                    new jBox('Notice', {
                        content: 'Заявка на рассчёт отправлена',
                        color: 'green'
                    });

                    $('#calcorder-form-modal').modal('hide');
                    $('#calcorder-form')[0].reset();

                }
            });

    return false;
});