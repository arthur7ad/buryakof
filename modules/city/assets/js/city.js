ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("ya-map", {
        center: [55.030199, 82.92043],
        zoom: 4
    }, {
        searchControlProvider: 'yandex#search'
    });
    
    myMap.behaviors.disable('scrollZoom');

//    console.log(City.List);

    City.List.forEach(function (item, i, arr) {

        myMap.geoObjects
                .add(new ymaps.Placemark([item['lat'], item['long']], {
                    balloonContent: item['name']
                }, {
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: '/image/map-label.png',
                    // Размеры метки.
                    iconImageSize: [30, 48],
                     iconImageOffset: [-15, -48],

                }))
    });

}
