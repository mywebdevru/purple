@extends('layouts.purple')

@section('content')
    <div class="container pl-4 pr-4 pt-4">
        <div class="row">
            <!-- Секция профиля -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        Просто взгляни на меня, я сделал сетку
                    </div>
                </div>
            </div>
            <!-- Секция левого блока под профилем (логично, не правда ли?) -->
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-body">
                        Просто взгляни на меня, я сделал сетку
                    </div>
                </div>
            </div>
            <!-- п о с т ы (генерируются карточками) -->
            <div class="col-sm-6 mt-2">
                <div class="card mb-2">
                    <div class="card-body">
                        Пост
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        Пост
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        И еще Пост
                    </div>
                </div>
            </div>
            <!-- Правая нижняя карточка -->
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <div class="card-body">
                        Просто взгляни на меня, я сделал сетку
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection