ymaps.ready(init);

function init() {
    let coord, obj
    //Получаем координаты для централизации карты (либо Москва, либо координаты первого эл-та маршрута)
    if (typeof strJson !== 'undefined') {
        strJson = strJson.split('&quot;').join('"');
        obj = JSON.parse(strJson)
        if (obj["0"].data.type == "Placemark") {
            coord = obj[0].coord
        } else {
            coord = obj[0].coord[0]
        }
    } else {
        coord = [55.76, 37.64]
    }
    //Создание карты
    var myMap = new ymaps.Map("map", {
        center: coord, 
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