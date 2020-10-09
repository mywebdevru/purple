@extends('layouts.app')
@section('content')
<main class="container">
<h1>{{$map->title}}</h1>
<div id="map"></div>

<div>
    <p>{{$map->description}}</p>
    <div>
    @forelse ($photos as $photo)
        <img src="{{ asset($photo->image) }}" alt="{{$photo->image}}" width=300>
    @empty
        <span>Фото отсутствуют</span>
    @endforelse
    </div>
</div>
</main>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/maps.css')}}">
@endsection
@section('scripts')
<script> strJson = '{{$map->map_data}}' </script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="{{asset('js/map/map_show.js')}}"></script>
@endsection
