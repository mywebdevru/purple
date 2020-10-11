@extends('layouts.app')
@section('content')
<main class="container">
<h1>Конструктор карты</h1>
<div id="map"></div>
<button id="save-map">сохранить карту</button>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="map-form" action="{{route('map.update', $map)}}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_method" value="put">
    @csrf
    <input type="hidden" name="user_id" value="{{$id = Auth::user()->id}}">
    <input type="hidden" name="map_data">
    <input type="hidden" name="slug">
    <div class="form-group">
        <label for="title">Введите название</label>
        <input name="title" id="title" type="text" class="form-control" value="{{$map->title ?? ""}}">
    </div>
    <div class="form-group">
        <label for="description">Добавьте описание</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$map->description ?? ""}}</textarea>
    </div>
    <div class="form-group">
        <label for="photos">Загрузите фотографии (можно несколько файлов)</label>
        <input multiple="multiple" name="photos[]" type="file" id="photos" class="file-path validate">
        <input type="hidden" name="imageable_type" value="App\Models\Map">
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
</main>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/maps.css')}}">
    <style>
        .map-form input:not([type=submit]) {
            border-color: black;
        }
    </style>
@endsection
@section('scripts')
    <script> strJson = '{{$map->map_data}}' </script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="{{asset('js/map/map_edit.js')}}"></script>
@endsection
