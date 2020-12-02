@extends('layouts.app')

@section('content')
    <livewire:wallpaper-block :user="$user" :key="'wallpaper'.time()" />
    <livewire:main :user="$user" :key="'main'.time()" />
@endsection
