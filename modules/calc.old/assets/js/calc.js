//var Calc = {
//    from: 0,
//    to: 0,
//    distance: 0,
//    params: '',
//    get: function () {
//
//        $.get('/distance/default/get-distance?from=' + Calc.from + '&to=' + Calc.to, function (data) {
//            if (data)
//                Calc.distance = data;
//        })
//    },
//    add: function () {
//
//        $.get('/distance/default/add?from=' + Calc.from + '&to=' + Calc.to + '&distance' + Calc.distance, function (data) {
////            if (data)
////                Calc.distance = data;
//        })
//    },
//}

$('#main-calc').on('beforeSubmit', function (e) {

    e.preventDefault();
//    console.log($('#calcform-from').val());

    var data = $('#main-calc').serialize();
    $.get('/calc/default/result?' + data, function (data) {

//        console.log(data);

        if (data != 0) {
            $('#calc-result-modal .modal-body').html(data);
            $('#calc-result-modal').modal('show')
        }

    });

//
//    Calc.from = $('#calcform-from').val();
//    Calc.to = $('#calcform-to').val();
//    Calc.params = $('#main-calc').serialize();
//    Calc.get();
//
//    if (Calc.distance) {
//    } else
//        ymaps.route([$('#calcform-from').val(), $('#calcform-to').val()]).then
//                (
//                        function (route)
//                        {
//                            var distance = Math.round(route.getLength() / 1000);
//                            var X = distance;
//
//                            Calc.distance = X;
//                            Calc.add();
//
//                            console.log(X);
//                            $('#calcform-rast').val(X)
//
//                            var data = $('#main-calc').serialize();
//                            $.get('/calc/default/result?' + data, function (data) {
//
////        console.log(data);
//
//                                if (data != 0) {
//                                    $('#calc-result-modal .modal-body').html(data);
//                                    $('#calc-result-modal').modal('show')
//                                }
//
//                            });
//                        });

//    setTimeout(showOrderModal, 3000);



    return false;
});
$('#local-calc').on('beforeSubmit', function (e) {

    e.preventDefault();

    var data = $('#local-calc').serialize();

    $.get('/calc/default/result-local?' + data, function (data) {

//        console.log(data);

        if (data != 0) {
            $('#calc-result-modal .modal-body').html(data);
            $('#calc-result-modal').modal('show')
        }

    });

//    console.log($('#calcform-from').val());
//    Calc.from = $('#calclocalform-from').val();
//    Calc.to = $('#calclocalform-to').val();
//    Calc.params = $('#local-calc').serialize();
//    Calc.get();

//    if (Calc.distance) {
//    } else
//        ymaps.route([$('#calclocalform-from').val(), $('#calclocalform-to').val()]).then
//                (
//                        function (route)
//                        {
//                            var distance = Math.round(route.getLength() / 1000);
//                            var X = distance;
//                            console.log(X);
//                            $('#calclocalform-rast').val(X)
//
//                            var data = $('#local-calc').serialize();
//                            $.get('/calc/default/result-local?' + data, function (data) {
//
////        console.log(data);
//
//                                if (data != 0) {
//                                    $('#calc-result-modal .modal-body').html(data);
//                                    $('#calc-result-modal').modal('show')
//                                }
//
//                            });
//                        });
//
//    setTimeout(showOrderModal, 3000);

    return false;
});

function showOrderModal() {

    if (!Calc.distance) {

        console.log(Calc.from);
        console.log(Calc.to);
        console.log(Calc.params);

        $('#calcorderform-from').val(Calc.from);
        $('#calcorderform-to').val(Calc.to);
        $('#calcorderform-params').val(Calc.params);

        $('#calcorder-form-modal').modal('show')

        console.log('none');
    }


}
