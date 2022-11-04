ymaps.ready(init);

function init() {
    // Создаем карту.
    Calc.Map = new ymaps.Map("map", {
        center: [Calc.lat, Calc.long],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    });
    ;

    Calc.Map.events.add('click', function (e) {

        var coords = e.get('coords');

        Calc.addMark(coords);

        $('#map .tarif').removeClass('active');
        $('#map .tarif4').addClass('active');

//        console.log(coords);
//        console.log('tarif1');
    });


    Calc.circle1 = new ymaps.geometry.Circle([Calc.lat, Calc.long], Calc.tarif1.distance);
    // Создаем круг.
    Calc.tarif_circle1 = new ymaps.GeoObject({geometry: Calc.circle1}, {
        // Задаем опции круга.
        // Включаем возможность перетаскивания круга.
        draggable: false,
        // Цвет заливки.
        // Последний байт (77) определяет прозрачность.
        // Прозрачность заливки также можно задать используя опцию "fillOpacity".
        fillColor: "#FFE63466",
        opacity: .3,
    });

    Calc.tarif_circle1.events.add('click', function (e) {

        var coords = e.get('coords');

        Calc.addMark(coords);

        $('#map .tarif').removeClass('active');
        $('#map .tarif1').addClass('active');

//        console.log(coords);
//        console.log('tarif1');
    });


    Calc.circle2 = new ymaps.geometry.Circle([Calc.lat, Calc.long], Calc.tarif2.distance);
    // Создаем круг.
    Calc.tarif_circle2 = new ymaps.GeoObject({geometry: Calc.circle2}, {
        // Задаем опции круга.
        // Включаем возможность перетаскивания круга.
        draggable: false,
        // Цвет заливки.
        // Последний байт (77) определяет прозрачность.
        // Прозрачность заливки также можно задать используя опцию "fillOpacity".
        fillColor: "#94C02166",
        opacity: .3,
    });

    Calc.tarif_circle2.events.add('click', function (e) {

        var coords = e.get('coords');

        Calc.addMark(coords);

        $('#map .tarif').removeClass('active');
        $('#map .tarif2').addClass('active');

//        console.log(coords);
//        console.log('tarif1');
    });

    Calc.circle3 = new ymaps.geometry.Circle([Calc.lat, Calc.long], Calc.tarif3.distance);
    // Создаем круг.
    Calc.tarif_circle3 = new ymaps.GeoObject({geometry: Calc.circle3}, {
        // Задаем опции круга.
        // Включаем возможность перетаскивания круга.
        draggable: false,
        // Цвет заливки.
        // Последний байт (77) определяет прозрачность.
        // Прозрачность заливки также можно задать используя опцию "fillOpacity".
        fillColor: "#015B2C55",
        opacity: .3,
    });


    Calc.tarif_circle3.events.add('click', function (e) {

        var coords = e.get('coords');

        Calc.addMark(coords);

        $('#map .tarif').removeClass('active');
        $('#map .tarif3').addClass('active');

//        console.log(coords);
//        console.log('tarif1');
    });


    // Добавляем круг на карту.
    Calc.Map.geoObjects.add(Calc.tarif_circle3);
    Calc.Map.geoObjects.add(Calc.tarif_circle2);
    Calc.Map.geoObjects.add(Calc.tarif_circle1);
//    Calc.Map.geoObjects.add(Calc.circle1);
//    Calc.Map.geoObjects.add(Calc.circle2);
//    Calc.Map.geoObjects.add(Calc.circle3);

//    console.log('lat - ' + Calc.lat);
//    console.log('lat - ' + Calc.long);
//    console.log(tarif1);
//    console.log(tarif2);
//    console.log(tarif3);
//    console.log(Calc.circle1);
//    console.log(Calc.circle2);
//    console.log(Calc.circle3);

    Calc.setCar();

//    Calc.price1 = $('.slick-center .item-wrap').attr('data-tarif1-price');
//    Calc.price2 = $('.slick-center .item-wrap').attr('data-tarif2-price');
//    Calc.price_km_oblast = $('.slick-center .item-wrap').attr('data-price-km_oblast');
//    Calc.price_km_country = $('.slick-center .item-wrap').attr('data-price-km_country');
//    $('.car-name').val($('.slick-center .item-wrap').attr('data-name'));
}


$('body').on('click', '#calcform-to-list', function () {
    console.log($(this));
})

$('.calc-slider').on('click', '.item-wrap', function () {

//    Calc.price1 = $(this).attr('data-tarif1-price');
//    Calc.price2 = $(this).attr('data-tarif2-price');
//    Calc.price_km_oblast = $(this).attr('data-price-km_oblast');
//    Calc.price_km_country = $(this).attr('data-price-km_country');
//    $('.car-name').val($(this).attr('data-name'));
})
