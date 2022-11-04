var Calc = {
    lat: 0,
    long: 0,
    mark: {},
    points: [],
    addressFrom: 0,
    addressTo: 0,
    distance: 0,
    price: 0,
    price1: 0,
    price2: 0,
    pereezd: false,
    circle1: {},
    circle2: {},
    circle3: {},
    tarif_circle1: {},
    tarif_circle2: {},
    tarif_circle3: {},
    price_km_oblast: 0,
    price_km_country: 0,
    route: {},
    Map: {},
    addMark: function (coord) {


        Calc.Map.geoObjects.remove(Calc.mark);
        Calc.mark = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: coord,
            },
        }, {
            preset: 'islands#darkGreenCircleDotIcon'
        });
        Calc.Map.geoObjects.add(Calc.mark);
    },
    SetPrice: function (price) {

        console.log('set price - ' + price);
        $('.price-wrap .price').html(price);
        $('.form-summ').val(price);
    },
    Poputno_0: function () {
        $('.checkbox').addClass('disabled');
        $('#gruzcalcform-poputno').prop('disabled', true);
    },
    Poputno_1: function () {

        $('.checkbox').removeClass('disabled');
        $('#gruzcalcform-poputno').prop('disabled', false);
    },
    CalcPoputno: function () {

        if ($('#gruzcalcform-poputno').is(':checked'))
            Calc.SetPrice(Math.round(Calc.price / 2));
        else
            Calc.SetPrice(Math.round(Calc.price));
    },
    tarif1: {
        distance: 15 * 1000
    },
    tarif2: {
        distance: 30 * 1000
    },
    tarif3: {
        distance: 200 * 1000
    },
    findAddress: function (text, target) {

        console.log(text);
        if (text.length > 3)
            ymaps.suggest(text, {results: 10}
            ).then(function (items) {
                // items - массив поисковых подсказок.

                console.log(items);
                var text = '';
                items.forEach(function (item, i, arr) {
                    text = text + '<option>' + item.value + '</option>';
                });
                console.log(1);
                console.log(text);
                $('#' + target + '-list').html(text);
            });
    },
    setCar: function () {

        Calc.price1 = $('.calc-slider .slick-center .item-wrap').attr('data-tarif1-price');
        Calc.price2 = $('.calc-slider .slick-center .item-wrap').attr('data-tarif2-price');
        Calc.price_km_oblast = $('.calc-slider .slick-center .item-wrap').attr('data-price-km_oblast');
        Calc.price_km_country = $('.calc-slider .slick-center .item-wrap').attr('data-price-km_country');
        $('.car-name').val($('.calc-slider .slick-center .item-wrap').attr('data-name'));
        $('#map .tarif1 .price').html(Calc.price1 + ' / час');
        $('#map .tarif2 .price').html(Calc.price2 + ' / час');
        $('#map .tarif3 .price').html((Calc.price_km_oblast / 2) + ' / км');
        $('#map .tarif4 .price').html((Calc.price_km_country / 2) + ' / км');
    },
    getCoord: function (name) {

        console.log('get coord');
        ymaps.geocode(name, {
            /**
             * Опции запроса
             * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/geocode.xml
             */
            // Сортировка результатов от центра окна карты.
            // boundedBy: myMap.getBounds(),
            // strictBounds: true,
            // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy.
            // Если нужен только один результат, экономим трафик пользователей.
            results: 1
        }).then(function (res) {
            // Выбираем первый результат геокодирования.
            var firstGeoObject = res.geoObjects.get(0),
                    // Координаты геообъекта.
                    coords = firstGeoObject.geometry.getCoordinates(),
                    // Область видимости геообъекта.
                    bounds = firstGeoObject.properties.get('boundedBy');
            firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
            // Получаем строку с адресом и выводим в иконке геообъекта.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());
            console.log(firstGeoObject);
//            // Добавляем первый найденный геообъект на карту.
//            Calc.Map.geoObjects.add(firstGeoObject);
//            // Масштабируем карту на область видимости геообъекта.
//            Calc.Map.setBounds(bounds, {
//                // Проверяем наличие тайлов на данном масштабе.
//                checkZoomRange: true
//            });

        });
    },
    Calc: function () {

        if (typeof Calc.route !== "undefined" && Calc.route)
            Calc.Map.geoObjects.remove(Calc.route);
        var to = $('#gruzcalcform-to').val();
        var from = $('#gruzcalcform-from').val();
        if (Calc.pereezd) {

            var to = $('#pereezdcalcform-to').val();
            var from = $('#pereezdcalcform-from').val();
        }

        console.log('calc ' + to);
        console.log('calc ' + from);
        ymaps.route([
            from,
//            {type: 'viaPoint', point: from},
            to,
//            {type: 'wayPoint', point: to}
        ], {
            mapStateAutoApply: true
        }).then(function (route) {
            route.getPaths().options.set({
                // балун показывает только информацию о времени в пути с трафиком
                balloonContentLayout: ymaps.templateLayoutFactory.createClass('{{ properties.humanJamsTime }}'),
                // вы можете настроить внешний вид маршрута
                strokeColor: '0000ffff',
                opacity: 0.9
            });
            Calc.route = route;
            // добавляем маршрут на карту
            Calc.Map.geoObjects.add(route);
//            console.log(route.getLength()); // в метрах

            Calc.distance = (route.getLength()) / 1000; // в км



            route.getWayPoints().each(function (el, i) {

                Calc.points[i] = el.geometry.getCoordinates();
                console.log(i);
                console.log(el.geometry.getCoordinates());
//                writer.WriteLine(el.geometry.getCoordinates());



            })

            console.log(ymaps.geoQuery(Calc.Map.geoObjects));
            if (!Calc.points[0] && !Calc.points[1]) {
                alert('Точки не найдены');
                return false;
            }


            Calc.price = Math.round(Calc.distance * Calc.price_km_country);
            if ($('#gruzcalcform-poputno').is(':checked'))
                Calc.price = Math.round(Calc.price / 2);
//            console.log(Calc.price);
//            console.log(Calc.distance);
//            console.log(Calc.price_km);
//            console.log(Calc.points[0]);
//            console.log(Calc.points[1]);
//
//            console.log(Calc.circle1);
//            console.log(Calc.points);

            Calc.Poputno_1();

            $('.tarif4').addClass('active');

            if (Calc.circle3.contains(Calc.points[1])) {

                console.log(Calc.circle2);
                console.log('зона 3');

                $('.tarif').removeClass('active');
                $('.tarif3').addClass('active');

                Calc.price = Math.round(Calc.price1) + Math.round((Calc.distance * Calc.price_km_oblast));
                console.log(Calc.points[1]);
                Calc.Poputno_0();
                if ($('#gruzcalcform-poputno').is(':checked'))
                    Calc.price = Math.round(Calc.price / 2);
                Calc.price = Math.round(Calc.price);
            }

            if ($('#pereezdcalcform-count').val()) // грузчики
                Calc.price = Calc.price + Math.round(($('#pereezdcalcform-count').val() * 300));
//
            if (Calc.circle2.contains(Calc.points[1])) {

                console.log(Calc.circle2);
                console.log('зона 2');

                $('.tarif').removeClass('active');
                $('.tarif2').addClass('active');

                if ($('#pereezdcalcform-count').val()) // грузчики
                    Calc.price = (Math.round(Calc.price2) + Math.round(($('#pereezdcalcform-count').val() * 300)));
                else
                    Calc.price = Calc.price2;
                Calc.Poputno_0();
                console.log(Calc.points[1]);
            }

            if (Calc.circle1.contains(Calc.points[1]) && Calc.circle1.contains(Calc.points[0]))
            {
                console.log(Calc.circle1);
                console.log('зона 1');

                $('.tarif').removeClass('active');
                $('.tarif1').addClass('active');

                console.log('point 1 ' + Calc.points[0]);
                console.log('point 2 ' + Calc.points[1]);
                if ($('#pereezdcalcform-count').val()) // грузчики
                    Calc.price = (Math.round(Calc.price1) + Math.round(($('#pereezdcalcform-count').val() * 300)));
                else
                    Calc.price = Calc.price1;
                Calc.Poputno_0();
            }

            Calc.SetPrice(Calc.price);
//            if (Calc.circle2.contains(Calc.points[1]))
//            {
//                console.log(Calc.points[0]);
//                console.log(Calc.points[1]);
//                Calc.price = Calc.price2 + '(час) ';
//
//                Calc.SetPrice(Calc.price);
//            }




//            Calc.SetPrice(Calc.price);

            return 1;
        });
    },
};

