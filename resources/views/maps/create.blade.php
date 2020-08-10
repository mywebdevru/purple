
<link rel="stylesheet" href="/css/maps.css">
<body>
    <main>
    <h1>Конструктор карты</h1>
    <div id="map" style="width: 800px; height: 600px"></div>
    <button id="save-map">сохранить карту</button>
    <form class="map-form" action="{{route('map.store')}}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$id = Auth::user()->id}}">
        <input type="hidden" name="map_data">
        <input type="hidden" name="slug">
        <label>
            Введите название
            <input name ="title" type="text">
        </label>
        <label>
            Добавьте описание
            <textarea name="description" cols="30" rows="10"></textarea>
        </label>
        <label>
            загрузите фотографии (можно несколько файлов)
            <input multiple="multiple" name="photos[]" type="file">
        </label>
        <input id="Готово" type="submit" value="Upload">
        <label for="">Slug (Уникальное значение)</label>
    </form>
    </main>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/map_constructor.js')}}"></script>
</body>

</html>