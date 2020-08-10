<h1>{{$map->title}}</h1>
<div id="map" style="width: 800px; height: 600px"></div>

<div>
    <p>{{$map->description}}</p>
    <div>
    @forelse ($photos as $photo)
        <img src="{{ asset('storage/'.$photo->filename) }}" alt="{{$photo->filename}}" whidth=300>
    @empty
        <span>Фото отсутствуют</span>
    @endforelse
    </div>
</div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<script>
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64], //Moscow
            zoom: 12,
            type: 'yandex#hybrid', //гибридный слой при открытии
        }),
        strJson = '{{$map->map_data}}'
        // for (element in strJson) {
        //     console.log(element)
        //     var geoObj = new ymaps.GeoObject ({
        //         geometry: {
        //             type: element.data.type,
        //             coordinates: element.coord,
        //         }, 
        //         data: {
        //             hintContent: element.data.hintContent,
        //             balloonHeader: element.data.balloonHeader,
        //             balloonContent: element.data.balloonContent
        //         } 
        //     })
        //     myMap.geoObjects.add(geoObj);
        //     console.log(element.data)
        // };
    }
</script>