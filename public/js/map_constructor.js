ymaps.ready(init);

function init() {
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        center: [55.76, 37.64], //Moscow
        zoom: 12,
        type: 'yandex#hybrid' //гибридный слой при открытии
    }),
        currentId = 0, //id создаваемого геообъекта
        object = [], //массив для геообъектов
        //Объявление кнопок конструктора
        //Макет кнопки отображает data.content и меняется в зависимости от нажатия
        btnLayout = ymaps.templateLayoutFactory.createClass(
            "<div class='map-btn {% if state.selected %}map-btn-selected{% endif %}' title='{{ data.title }}'>" +
            "{{data.content}}" +
            "</div>"
        ),
        //Общие опции
        btnOptions = {
            float: 'left',
            layout: btnLayout,
        },
        //кнопка создания меток
        placemarkBtn = new ymaps.control.Button({
            data: {
                content: 'Метка',
                title: 'placemark'
            },
            options: btnOptions
        }),
        //кнопка создания ломаных
        lineBtn = new ymaps.control.Button({
            data: {
                content: 'Ломаная',
                title: 'line'
            },
            options: btnOptions
        }),
        //кнопка создания многоугольников
        polygonBtn = new ymaps.control.Button({
            data: {
                content: 'Многоугольник',
                title: 'Polygon'
            },
            options: btnOptions
        });

    //Добавление кнопок конструктора на карту
    myMap.controls.add(placemarkBtn, { floatIndex: 2 });
    myMap.controls.add(lineBtn, { floatIndex: 1 });
    myMap.controls.add(polygonBtn, { floatIndex: 0 });

    //Функция включения создания меток при нажтии на кнопку placemarkBtn
    placemarkBtn.events.add('select', function () {
        //проверяем зажаты ли другие кнопки
        lineBtn.deselect();
        polygonBtn.deselect();
        //по клику на карте запускаем функцию установки метки в данное место
        myMap.events.group().add('click', markMapClick);
    });
    function markMapClick(event) {
        var coords = event.get('coords'); //получаем координаты места клика
        myPlacemark = createPlacemark(coords, 1); //функция описания метки с заданными координатами
        myMap.geoObjects.add(myPlacemark); //установка метки на карту
    };
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            balloonHeader: 'Заголовок балуна',
            balloonContent: 'Контент балуна',
            id: currentId++,
            type: 'Placemark'
        }, {
            draggable: true,
        });
    };
    placemarkBtn.events.add('deselect', function () {
        //Отключение расстановки меток
        myMap.events.remove('click', markMapClick);
    });


    //Функция включения создания ломаных при нажтии на кнопку lineBtn
    lineBtn.events.add('select', function () {
        //проверяем зажаты ли другие кнопки
        placemarkBtn.deselect();
        polygonBtn.deselect();
        //по клику на карту ставим первую вершину ломаной
        myMap.events.group().add('click', lineMapClick)
    });
    function lineMapClick(event) {
        var coords = event.get('coords'); //получаем координаты места клика
        myPolyline = createPolyline(coords); //функция описания ломаной с заданными координатами
        myMap.geoObjects.add(myPolyline);
        myPolyline.editor.startDrawing();//включение редактора ломаной
    };
    function createPolyline(coords) {
        return new ymaps.Polyline([coords], {
            id: currentId++,
            type: 'Polyline'
        }, {
            // Задаем опции геообъекта.
            // Цвет с прозрачностью.
            strokeColor: "#0000FF",
            // Ширину линии.
            strokeWidth: 4,
            // Максимально допустимое количество вершин в ломаной.
            editorMaxPoints: 25,
            // Добавляем в контекстное меню новый пункт, позволяющий удалить ломаную.
            editorMenuManager: function (items) {
                items.push({
                    title: "Удалить линию",
                    onClick: function () {
                        myMap.geoObjects.remove(myPolyline);
                        currentId--;
                    }
                });
                return items;
            }
        });
    };
    lineBtn.events.add('deselect', function () {
        //Отключение построения ломаной
        myMap.events.remove('click', lineMapClick);
    });


    //Функция включения создания многоугольников при нажтии на кнопку polygonBtn
    polygonBtn.events.add('select', function () {
        //проверяем зажаты ли другие кнопки
        placemarkBtn.deselect();
        lineBtn.deselect();
        //по клику на карту переходим в режим построения многоугольника
        myMap.events.group().add('click', polygonMapClick)
    });
    function polygonMapClick(event) {
        var coords = event.get('coords'); //получаем координаты места клика
        myPolygon = createPolygon(coords); //функция описания многоугольника с заданными координатами
        myMap.geoObjects.add(myPolygon);
        myPolygon.editor.startDrawing();//включение редактора многоугольника
    };
    function createPolygon(coords) {
        return new ymaps.Polygon([], {
            id: currentId++,
            type: 'Polygon'
        }, {
            // Курсор в режиме добавления новых вершин.
            editorDrawingCursor: "crosshair",
            // Максимально допустимое количество вершин.
            editorMaxPoints: 20,
            // Цвет заливки.
            fillColor: '#00FF00',
            // Цвет обводки.
            strokeColor: '#0000FF',
            // Ширина обводки.
            strokeWidth: 5,
            // Добавляем в контекстное меню новый пункт, позволяющий удалить многоугольник.
            editorMenuManager: function (items) {
                items.push({
                    title: "Удалить многоугольник",
                    onClick: function () {
                        myMap.geoObjects.remove(myPolygon);
                        currentId--;
                    }
                });
                return items;
            }
        });
    };
    polygonBtn.events.add('deselect', function () {
        //Отключение построения ломаной
        myMap.events.remove('click', polygonMapClick);
    });


    //Сохранение данных геообъектов
    document.querySelector('#save-map').addEventListener('click', () => {
        object = [];
        for (let i = 0; i < currentId; i++) {
            object.push({
                data: myMap.geoObjects.get(i).properties._data,
                coord: myMap.geoObjects.get(i).geometry.getCoordinates()
            });
        }
        let objectJson = JSON.stringify(object);
        console.log(objectJson);
    });
}