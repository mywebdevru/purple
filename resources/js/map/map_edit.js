ymaps.ready(init);

function init() {
    // Создание карты.
    strJson = strJson.split('&quot;').join('"');
    obj = JSON.parse(strJson)
    var myMap = new ymaps.Map("map", {
        center: obj["0"].coord, //центрируем по координатам первой метки
        zoom: 12,
        type: 'yandex#hybrid', //гибридный слой при открытии
    })
    currentId = 0,
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
    }),
    // Создание макета балуна
    MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass (
        '<div class="baloon">' +
            '<h3 class="baloon-title">$[properties.balloonHeader]</h3>' +
            '<div class="baloon-content">$[properties.balloonContent]</div>' +
        '</div>'
    );
    
    //Добавление кнопок конструктора на карту
    myMap.controls.add(placemarkBtn, { floatIndex: 2 });
    myMap.controls.add(lineBtn, { floatIndex: 1 });
    myMap.controls.add(polygonBtn, { floatIndex: 0 });

    //расстановка элементов из БД
    for (element in obj) {
        if (obj[element].data.type === 'Placemark') {
            geoObj = new ymaps.Placemark(obj[element].coord, {
                hintContent: obj[element].data.hintContent,
                type: obj[element].data.type,
                id: currentId++,
                balloonHeader: obj[element].data.balloonHeader,
                balloonContent: obj[element].data.balloonContent
            }, {
                hideIconOnBalloonOpen: false,
                balloonContentLayout: MyBalloonContentLayout,
                draggable: true
            })
        } else if (obj[element].data.type === 'Polyline') {
            geoObj = new ymaps.Polyline(obj[element].coord, {
                id: currentId++,
                type: obj[element].data.type,
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
        } else {
            geoObj = new ymaps.Polygon(obj[element].coord, {
                id: currentId++,
                type: obj[element].data.type,
            }, {
                // Курсор в режиме добавления новых вершин.
                editorDrawingCursor: "crosshair",
                // Максимально допустимое количество вершин.
                editorMaxPoints: 20,
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
        }
        myMap.geoObjects.add(geoObj);
        geoObj.editor.startDrawing();
    };

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
        //Смена значка метки при наведении
        myPlacemark.events.add('mouseenter', function (e) {
            e.get('target').options.set('preset', 'islands#greenIcon');
        });
        myPlacemark.events.add('mouseleave', function (e) {
            e.get('target').options.unset('preset');
        });
        // Контекстное меню, позволяющее изменить параметры метки.
        // Вызывается при нажатии правой кнопкой мыши на метке.
        myPlacemark.events.add('contextmenu', function (e) {
            createBaloonContent(myPlacemark, e);
        });
    };
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            hintContent: "Добавить описание - правая кнопка мыши",
            id: currentId++,
            type: 'Placemark'
        }, {
            hideIconOnBalloonOpen: false,
            balloonContentLayout: MyBalloonContentLayout,
            draggable: true
        });
    };
    placemarkBtn.events.add('deselect', function () {
        //Отключение расстановки меток
        myMap.events.remove('click', markMapClick);
    });
    function createBaloonContent (placemark, e) {
        if ($('#menu').css('display') == 'flex') {
            $('#menu').remove();
        } else {
            // HTML-содержимое контекстного меню.
            var menuContent =
            '<div class="menu" id="menu">' +
                '<a class="close" href="#">&times;</a>' +
                '<div id="form" class="menu-form">' +
                    '<label for="baloon-hint">Всплывающая подсказка:</label>' +
                    '<input type="text" id="baloon-hint">' +
                    '<label for="baloon-header">Подпись метки:</label>' +
                    '<input type="text" id="baloon-header">' +
                    '<label for="baloon-desc">Описание метки:</label>' +
                    '<textarea id="baloon-desc" cols="40" rows="6"></textarea>' +
                    '<input type="submit" id="baloon-save" value="Сохранить">' +
                '</div>' +
                '<button class="placemark-delete">Удалить метку</button>' +
            '</div>';
            // Размещаем контекстное меню на странице
            $('body').append(menuContent);
            // Задаем позицию меню.
            $('#menu').css({
                left: e.get('pagePixels')[0],
                top: e.get('pagePixels')[1]
            });
            $(".close").click(function () {
                $('#menu').remove();
            });
            // Заполняем поля контекстного меню текущими значениями свойств метки.
            $('#baloon-hint').val(placemark.properties.get('hintContent'));
            $('#baloon-header').val(placemark.properties.get('balloonHeader'));
            $('#baloon-desc').val(placemark.properties.get('balloonContent'));
            // При нажатии на кнопку "Сохранить" изменяем свойства метки
            // значениями, введенными в форме контекстного меню.
            $("#baloon-save").click(function () {
                placemark.properties.set({
                    hintContent: $("#baloon-hint").val(),
                    balloonHeader: $("#baloon-header").val(),
                    balloonContent: $("#baloon-desc").val()
                });
                // Удаляем контекстное меню.
                $('#menu').remove();
            });
            $(".placemark-delete").click(function () {
                myMap.geoObjects.remove(placemark);
                $('#menu').remove();
            });
        }
    };

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
    $('#save-map').click(function () {
        if (currentId === 0) {
            alert("Карта не должна быть пустой. Пожалуйста, нарисуйте свой путь!")
        } else {
            object = [];
            for (let i = 0; i < currentId; i++) {
                object.push({
                    data: myMap.geoObjects.get(i).properties._data,
                    coord: myMap.geoObjects.get(i).geometry.getCoordinates()
                });
            }
            let objectJson = JSON.stringify(object)
            $("#map").css("display","none")
            $("#save-map").css("display","none")
            $(".map-form").css("display","block")
            $("input[name=map_data]").val(objectJson)
        }
    });
}