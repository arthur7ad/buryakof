var Calc = {

    form: {},

    init: function () {

    },

    Result: function (e) {

        var form = $('#main-calc');
        $('#main-calc').yiiActiveForm('validate');
//        $('#main-calc').data('yiiActiveForm').submitting = true;
//        $('#main-calc').data('yiiActiveForm').validatting = true;
//        var data = form.serializeObject();
//        $('#main-calc').yiiActiveForm('validateAttribute', 'to');
//        console.log(data);
//        data.forEach(function (element) {
//            console.log(element);
//        });

//        var from = data['CalcForm[from]'];
//        var to = data['CalcForm[to]'];
////        console.log(data['CalcForm[from]']);
//
//        ymaps.route([from, to]).then
//                (
//                        function (route)
//                        {
//                            var distance = Math.round(route.getLength() / 1000);
//
//                            var X = distance;
//                            console.log(X);
//                        });
//
    },

};

$('#main-calc').on('submit', function (e) {

    $('#main-calc').yiiActiveForm('validate');
    e.preventDefault();
    console.log('#form-order submitted');
    console.log( $('#calcform-summ').val());
});

$('#main-calc').on('afterValidate', function (e) {
    e.preventDefault();
    console.log('#form-order after');
});



function findWay()
{

    document.getElementById('StartButton').style.display = 'none';
    document.getElementById('result_window').classList.remove("hide_result_window");


    var from1 = document.getElementById('from').value;
    var to = document.getElementById('to').value;
    if (from1 == '' || to == '')
    {
        alert('Заполните все поля');
        return;
    }
    // document.getElementById('result').innerHTML = 'Поиск...';
    ymaps.route([from1, to]).then
            (
                    function (route)
                    {
                        var distance = Math.round(route.getLength() / 1000);

                        var X = distance;

                        var rarr = document.getElementsByName("TipTS");
                        if (rarr[0].checked) {
                            Z = X * 1;
                            document.getElementById('TSreuslt').innerHTML = 'Тент';
                        }
                        if (rarr[1].checked) {
                            Z = Math.round(X * 1.2);
                            document.getElementById('TSreuslt').innerHTML = 'Изотерма';
                        }
                        if (rarr[2].checked) {
                            Z = Math.round(X * 1.5);
                            document.getElementById('TSreuslt').innerHTML = 'Рефрижератор';
                        }


                        var rarr = document.getElementsByName("TN");
                        if (rarr[0].checked) {
                            B = Z * 18;
                            document.getElementById('TNreuslt').innerHTML = '1.5 т';
                        }
                        if (rarr[1].checked) {
                            B = Z * 24;
                            document.getElementById('TNreuslt').innerHTML = '3 т';
                        }
                        if (rarr[2].checked) {
                            B = Z * 30;
                            document.getElementById('TNreuslt').innerHTML = '5 т';
                        }
                        if (rarr[3].checked) {
                            B = Z * 32;
                            document.getElementById('TNreuslt').innerHTML = '10 т';
                        }
                        if (rarr[4].checked) {
                            B = Z * 40;
                            document.getElementById('TNreuslt').innerHTML = '20 т';
                        }

                        var rarr = document.getElementsByName("pr");
                        if (rarr[0].checked) {
                            K = B * 1;
                            document.getElementById('prresult').innerHTML = 'отдельно';
                        }
                        if (rarr[1].checked) {
                            K = Math.round(B * 0.5);
                            document.getElementById('prresult').innerHTML = 'догруз';
                        }
                        if (rarr[2].checked) {
                            K = Math.round(B * 1.5);
                            document.getElementById('prresult').innerHTML = 'кругорейс';
                        }

                        var rarr = document.getElementsByName("TZ");
                        if (rarr[0].checked) {
                            Y = K + 0;
                            document.getElementById('TZreuslt').innerHTML = 'задняя';
                        }
                        if (rarr[1].checked) {
                            Y = K + 2000;
                            document.getElementById('TZreuslt').innerHTML = 'верхняя';
                        }
                        if (rarr[2].checked) {
                            Y = K + 3000;
                            document.getElementById('TZreuslt').innerHTML = 'боковая';
                        }

                        document.getElementById('fromresult').innerHTML = document.getElementById('from').value;
                        document.getElementById('toresult').innerHTML = document.getElementById('to').value;

                        //           document.getElementById('result').innerHTML = distance + ' км';
                        document.getElementById('DistResult').innerHTML = distance + ' км';

                        document.getElementById('cena').innerHTML = 'от ' + Y + ' руб. в т.ч. НДС';
                        document.getElementById('CenaResult').innerHTML = Y + ' руб';
                        map.geoObjects.add(route);
                        document.getElementById('result_window').style.display = 'none';

                    },
                    function (error)
                    {
                        alert('Ошибка: ' + error.message);
                    }
            );
}

$.fn.serializeObject = function ()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};