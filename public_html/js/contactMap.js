ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('contactMap', {
        center: [55.753994, 37.622093],
        zoom: 9
    });

    // Поиск координат центра Нижнего Новгорода.

    if (address) {
        ymaps.geocode(address, {
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

//            console.log(coords);
//
            coords = [
                coords[0] - 2,
                coords[1]

            ];
//
//            console.log(coords);



            firstGeoObject.options.set('preset', 'islands#darkGreenDotIconWithCaption');
            // Получаем строку с адресом и выводим в иконке геообъекта.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

            // Добавляем первый найденный геообъект на карту.
            myMap.geoObjects.add(firstGeoObject);
            // Масштабируем карту на область видимости геообъекта.
            myMap.setBounds(bounds, {
                // Проверяем наличие тайлов на данном масштабе.
                checkZoomRange: true
            });

            myMap.setCenter(coords);

        });
    }

    myMap.behaviors.disable('scrollZoom');

    myMap.setCenter(coords);
}

