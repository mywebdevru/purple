<?php
/**
 * @var $user \App\User
 */
?>

@extends('layouts.admin')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Редактирование профиля пользователя
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" name="surname" id="surname" class="form-control" value="{{ $user->surname }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    @if(!empty($user->avatar))
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="" width="40px">
                        </div>
                    @else
                        <div class="mb-3">
                            <img src="{{ Gravatar::src($user->email) }}" alt="" width="40" style="border-radius: 50%">
                        </div>
                    @endif
                    <input type="file" id="avatar" name="avatar" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="gender">Пол</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="В смятении"
                                @if($user->gender == 'В смятении')
                                selected
                            @endif>В смятении
                        </option>
                        <option value="Мужчина"
                                @if($user->gender == 'Мужчина')
                                    selected
                                @endif>Мужчина
                        </option>
                        <option value="Девушка"
                                @if($user->gender == 'Девушка')
                                selected
                                @endif>Девушка
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">Дата рождения</label>
                    <input type="text"
                           name="birth_date"
                           id="birth_date"
                           class="form-control"
                           value="{{ $user->birth_date }}">
                </div>
                <div class="form-group">
                    <label for="country">Страна</label>
                    <input type="text" name="country" id="country" value="{{ $user->country }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">Город</label>
                    <input type="text" name="city" id="city" value="{{ $user->city }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="creed">Кредо</label>
                    <input type="text" name="creed" id="creed" value="{{ $user->creed }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        flatpickr('#birth_date', {
            altInput: true,
            altFormat: "j M Y",
            dateFormat: "Y-m-d",
            locale: flatpickrRU,
        });
    </script>
@endsection
@section('css')
@endsection
