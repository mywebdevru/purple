<div class="container">
    <div>
        <livewire:wallpaper-block :user="$user" :key="'wallpaper'.time()" />
    </div>
    <div class="col-md-12" wire:ignore>
        <div class="ui-block">
            <div class="mb-3 w-100" style="height: 500px;" id="map"></div>
        </div>
        <div class="ui-block p-2 w-100">
            <label class="pl-2" for="title">Обязательно добавьте название карты</label>
            <input wire:model.defer="title" id="map_title" type="text" name="title" placeholder="Название карты" class="map-title">
            <label class="pl-2" for="description{{ $map->id }}">Добавьте описание с фотографиями</label>
            <div id="description{{ $map->id }}">{!! $description !!}</div>
        </div>
    </div>
    <div>
        @error('title')<div class="mx-auto text-center text-danger">{{ $message }}</div> @enderror
        @error('map_data')<div class="mx-auto text-center text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-file btn-md-2 btn-success comment-form__button" id="publish-map" wire:loading.attr="disabled">Опубликовать</button>
        <button type="button" class="btn btn-file btn-md-2 btn-success comment-form__button" id="save-draft" wire:loading.attr="disabled">Сохранить Черновик</button>
        <button type="button" class="btn btn-file btn-md-2 btn-success comment-form__button" id="preview-map" wire:loading.attr="disabled">Предпросмотр</button>
        <button type="button" class="btn btn-file btn-md-2 btn-danger comment-form__button" wire:click.prevent="deleteMap" wire:loading.attr="disabled">Удалить</button>
    </div>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    @push('scripts')
    <script>
        const editor = $(`#description{{ $map->id }}`),
        config = {
            lang: 'ru-RU',
            shortcuts: false,
            airMode: false,
            focus: true,
            disableDragAndDrop: false,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style','bold', 'italic', 'underline', 'strikethrough']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
            ],
            callbacks: {
                onImageUpload: function (files) {
                    @this.upload('photo', files[0], (image) => {
                        @this.savePhoto()
                        @this.on('photoSaved', (image) => {
                            editor.summernote('insertImage', '/' + image, function ($image) {
                                $image.css('width', '100%');
                            });
                        })
                    }, () => {
                        swal("Беда!", "Грузите что то большое или неправильное" , "error");
                    })
                },
                onMediaDelete: function ($target) {
                    const url = $target[0].src,
                        cut = `${document.location.origin}/`,
                        image = url.replace(cut, '');
                    @this.deletePhoto(image);
                },
                onChange: function(contents, $editable) {
                    @this.set('description',contents);
                }
            }
        };
        editor.summernote(config);
        ymaps.ready(init);
        let currentId = 0
        let myMap, btnLayout, btnOptions, placemarkBtn, lineBtn, polygonBtn, myPolyline, myPlacemark, myPolygon

        function init() {
            let coord, obj
            let strJson = '{!! $map->map_data !!}'

            //Получаем координаты для централизации карты (либо Москва, либо координаты первого эл-та маршрута)
            if (!!strJson) {
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
            myMap = new ymaps.Map("map", {
                center: coord,
                zoom: 12,
                type: 'yandex#hybrid', //гибридный слой при открытии
            })

            //Объявление кнопок конструктора
            //Макет кнопки отображает data.content и меняется в зависимости от нажатия
            btnLayout = ymaps.templateLayoutFactory.createClass(
                "<div class='map-btn {% if state.selected %}map-btn-selected{% endif %}' title='@{{ data.title }}'>" +
                "@{{data.content}}" +
                "</div>"
            )
            //Общие опции
            btnOptions = {
                float: 'left',
                layout: btnLayout,
            }
            //кнопка создания меток
            placemarkBtn = new ymaps.control.Button({
                data: {
                    content: 'Метка',
                    title: 'placemark'
                },
                options: btnOptions
            })
            //кнопка создания ломаных
            lineBtn = new ymaps.control.Button({
                data: {
                    content: 'Ломаная',
                    title: 'line'
                },
                options: btnOptions
            })
            //кнопка создания многоугольников
            polygonBtn = new ymaps.control.Button({
                data: {
                    content: 'Многоугольник',
                    title: 'Polygon'
                },
                options: btnOptions
            })

            //Добавление кнопок конструктора на карту
            myMap.controls.add(placemarkBtn, { floatIndex: 2 });
            myMap.controls.add(lineBtn, { floatIndex: 1 });
            myMap.controls.add(polygonBtn, { floatIndex: 0 });
            if (typeof strJson !== 'undefined') {
                mapEditor(myMap, obj)
            }
            constructor(myMap, obj)

            //Сохранение данных геообъектов
            function saveMap(){
                object = [];
                for (let i = 0; i < currentId; i++) {
                    console.log(myMap.geoObjects.get(i))
                    object.push({
                        data: myMap.geoObjects.get(i).properties._data,
                        coord: myMap.geoObjects.get(i).geometry.getCoordinates()
                    });
                }
                let objectJson = JSON.stringify(object)
                console.log(typeof(objectJson) )
                @this.map_data = objectJson
            }

            $('#preview-map').click(function (e) {
                e.preventDefault()
                saveMap()
                @this.previewMap()
            });
            $('#publish-map').click(function (e) {
                e.preventDefault()
                saveMap()
                @this.publishMap()
            });
            $('#save-draft').click(function (e) {
                e.preventDefault()
                saveMap()
                @this.saveDraft()
            });
        }

        function mapEditor(myMap, obj){
            let geoObj
            for (element in obj) {
                switch(obj[element].data.type) {
                    case 'Placemark':
                        geoObj = new ymaps.Placemark(obj[element].coord, {
                            type: obj[element].data.type,
                            id: currentId++
                        }, {
                            hideIconOnBalloonOpen: false,
                            draggable: true
                        })
                        break
                    case 'Polyline':
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
                        })
                        break
                    case 'Polygon':
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
                        })
                        break
                }
                myMap.geoObjects.add(geoObj);
                geoObj.editor.startDrawing();
            };
        }

        function constructor(myMap, obj) {
            let listener
            //Функция включения создания меток при нажтии на кнопку placemarkBtn
            placemarkBtn.events.add('select', function () {
                //проверяем зажаты ли другие кнопки
                lineBtn.deselect();
                polygonBtn.deselect();
                //по клику на карте запускаем функцию установки метки в данное место
                listener = myMap.events.group().add('click', (e) => {
                    let coords = e.get('coords'); //получаем координаты места клика
                    markMap(myMap, coords)
                });
            });

            placemarkBtn.events.add('deselect', function () {
                //Отключение функций
                listener.removeAll()
            });

            //Функция включения создания ломаных при нажтии на кнопку lineBtn
            lineBtn.events.add('select', function () {
                //проверяем зажаты ли другие кнопки
                placemarkBtn.deselect();
                polygonBtn.deselect();
                //по клику на карту ставим первую вершину ломаной
                listener = myMap.events.group().add('click', (e) => {
                    let coords = e.get('coords')
                    lineMap(myMap, coords)
                })
            });

            lineBtn.events.add('deselect', function () {
                //Отключение построения ломаной
                listener.removeAll()
            });

            //Функция включения создания многоугольников при нажтии на кнопку polygonBtn
            polygonBtn.events.add('select', function () {
                //проверяем зажаты ли другие кнопки
                placemarkBtn.deselect();
                lineBtn.deselect();
                //по клику на карту переходим в режим построения многоугольника
                myMap.events.group().add('click', (e) => {
                    let coords = e.get('coords')
                    polygonMap(myMap, coords)
                })
            });

            polygonBtn.events.add('deselect', function () {
                //Отключение построения многоугольника
                listener.removeAll()
            });
        }


        function markMap(myMap, coords) {
            myPlacemark = createPlacemark(coords); //функция описания метки с заданными координатами
            myMap.geoObjects.add(myPlacemark); //установка метки на карту
            //Смена значка метки при наведении
            myPlacemark.events.add('mouseenter', function (e) {
                e.get('target').options.set('preset', 'islands#greenIcon');
            });
            myPlacemark.events.add('mouseleave', function (e) {
                e.get('target').options.unset('preset');
            });
        };

        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                id: currentId++,
                type: 'Placemark'
            }, {
                hideIconOnBalloonOpen: false,
                draggable: true
            });
        };

        function lineMap(myMap, coords) {
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

        function polygonMap(myMap, coords) {
            myPolygon = createPolygon(); //функция описания многоугольника с заданными координатами
            myMap.geoObjects.add(myPolygon);
            myPolygon.editor.startDrawing();//включение редактора многоугольника
        };
        function createPolygon() {
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
    </script>
    @endpush
</div>

