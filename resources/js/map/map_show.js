ymaps.ready(init);

function init() {

    strJson = strJson.split('&quot;').join('"');
    obj = JSON.parse(strJson)
    var myMap = new ymaps.Map("map", {
        center: obj["0"].coord, //центрируем по координатам первой метки
        zoom: 12,
        type: 'yandex#hybrid', //гибридный слой при открытии
    })
    MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass (
        '<div class="baloon">' +
            '<h3 class="baloon-title">$[properties.balloonHeader]</h3>' +
            '<div class="baloon-content">$[properties.balloonContent]</div>' +
        '</div>'
    );

    for (element in obj) {
        if (obj[element].data.type === 'Placemark') {
            geoObj = new ymaps.Placemark(obj[element].coord, {
                hintContent: obj[element].data.hintContent,
                balloonHeader: obj[element].data.balloonHeader,
                balloonContent: obj[element].data.balloonContent
            }, {
                hideIconOnBalloonOpen: false,
                balloonContentLayout: MyBalloonContentLayout
            })
        } else if (obj[element].data.type === 'Polyline') {
            geoObj = new ymaps.Polyline(obj[element].coord, {
            }, {
            // Задаем опции геообъекта.
            // Цвет с прозрачностью.
            strokeColor: "#0000FF",
            // Ширину линии.
            strokeWidth: 4,
            });
        } else {
            geoObj = new ymaps.Polygon(obj[element].coord, {
                }, {
                // Цвет обводки.
                strokeColor: '#0000FF',
                // Ширина обводки.
                strokeWidth: 5,
            });
        }
        myMap.geoObjects.add(geoObj);
    };
}