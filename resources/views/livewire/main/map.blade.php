<div class="container mb-3" x-data="{'show_comments' : @entangle('commentsIsShown')}">
    <livewire:wallpaper-block :user="$user" :key="'wallpaper'.time()" />
    <div class="map-title text-center">{{ $map->title }}</div>
        <div class="col-md-12">
            <div class="ui-block" wire:ignore>
                <div class="mb-3 w-100" style="height: 500px;" id="map"></div>
            </div>
            <div class="ui-block w-100 p-2">
                @if (!!$description)
                    <div>{!! $description !!}</div>
                @endif
                @if ($mode == 'show')
                    <div class="map-list-item__additional inline-items">
                        <livewire:like :item="$map" :key="'likes'.$map->id" />
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items" wire:click.prevent="toggleComments">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                                </svg>
                                <span>{{ count($map->comments) }}</span>
                            </a>
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-share-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                                </svg>
                                <span>16</span>
                            </a>
                        </div>
                    </div>
                    @if (!!$commentsCount)
                        <div class="more-comments-wrapper">
                            {!! $showCommentsButton !!}
                        </div>
                    @endif
                    @if ($commentsIsLoaded)
                        <ul class="comments-list"  x-bind:class="{'feed-hide' : !!!show_comments, 'comments-show' : !!show_comments}">
                            @foreach ($map->comments->sortByDesc('created_at') as $comment)
                                <livewire:feed.comment :comment="$comment" :key="'comment'.$comment->id"/>
                            @endforeach
                        </ul>
                    @endif
                    <livewire:feed.write-comment :feedItem="$map" :key="'create_post_comment'.$map->id"/>
                @endif
            </div>
            @if($mode == 'preview')
                <div class="text-center">
                    <button type="button" class="btn btn-file btn-md-2 btn-success comment-form__button" wire:click.prevent="publishMap" wire:loading.attr="disabled">Опубликовать</button>
                    <button type="button" class="btn btn-file btn-md-2 btn-success comment-form__button" wire:click.prevent="editMap" wire:loading.attr="disabled">Редактировать</button>
                    <button type="button" class="btn btn-file btn-md-2 btn-danger comment-form__button" wire:click.prevent="deleteMap" wire:loading.attr="disabled">Удалить</button>
                </div>
            @endif
        </div>
    </div>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script>
        ymaps.ready(init);
        function init() {
            let coord, obj, MyBalloonContentLayout, geoObj, element
            let strJson = '{!! $map->map_data !!}'
            //Получаем координаты для централизации карты (либо Москва, либо координаты первого эл-та маршрута)
            if (typeof strJson !== 'undefined') {
                // strJson = strJson.split('&quot;').join('"');
                console.log('1')
                obj = JSON.parse(strJson)
                if (obj["0"].data.type == "Placemark") {
                    coord = obj[0].coord
                    console.log('2')
                } else {
                    coord = obj[0].coord[0]
                    console.log('3')
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
    </script>
</div>
