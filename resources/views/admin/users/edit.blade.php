{{--TODO Добавить стили, чтобы отображалась ошибка валидации для даты--}}
@php
/**
 * @var $user \App\User
 */
@endphp

@extends('layouts.admin')
{{--@if($errors->any())
    @dd($errors->get('city'))
@endif--}}
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Редактирование профиля пользователя
        </div>
        <div class="card-body">
            {{--@include('admin.partials.errors')--}}
            <form action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ $errors->any() ? old('name') : $user->name }}">
                    @error('name')
                        @foreach ($errors->get('name') as $error)
                            <div class="invalid-feedback">{{ $error }}</div>
                        @endforeach
                    @enderror
                </div>
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text"
                           name="surname"
                           id="surname"
                           class="form-control @error('surname') is-invalid @enderror"
                           value="{{ $errors->any() ? old('surname') : $user->surname }}">
                    @error('surname')
                    @foreach ($errors->get('surname') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ $errors->any() ? old('email') : $user->email }}">
                    @error('email')
                    @foreach ($errors->get('email') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror
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
                    <input type="file"
                           id="avatar"
                           name="avatar"
                           class="form-control-file  @error('avatar') is-invalid @enderror">
                    @error('avatar')
                    @foreach ($errors->get('avatar') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror
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
                           class="form-control @error('birth_date') is-invalid @enderror"
                           value="{{ $errors->any() ? old('birth_date') :  $user->birth_date }}">
                    @error('birth_date')
                    @foreach ($errors->get('birth_date') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">Город</label>
                    <input type="text"
                           name="city"
                           id="city"
                           value="{{ $errors->any() ? old('city') : $user->city }}"
                           class="form-control @error('city') is-invalid @enderror">
                    @error('city')
                    @foreach ($errors->get('city') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror

                </div>
                <div class="form-group">
                    <label for="country">Страна</label>
                    <input type="text"
                           name="country"
                           id="country"
                           value="{{ $errors->any() ? old('country') : $user->country }}"
                           class="form-control @error('country') is-invalid @enderror">
                    @error('country')
                    @foreach ($errors->get('country') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror

                </div>
                <div class="form-group">
                    <label for="creed">Кредо</label>
                    <input type="text"
                           name="creed"
                           id="creed"
                           value="{{ $errors->any() ? old('creed') : $user->creed }}"
                           class="form-control @error('creed') is-invalid @enderror">
                    @error('creed')
                    @foreach ($errors->get('creed') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                    @enderror
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
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=467f68a5-dab6-4c12-9b28-13d2745d2d99" type="text/javascript"></script>
    <script>
        $('#city').on('click', () => {
            ymaps.ready(init);
            function init() {
                const suggestView = new ymaps.SuggestView('city');
                suggestView.events.add('select', function (e) {
                    let location = e.get('item').value;
                    let locationArr = _.split(location, ',');
                    let city = _.trim(_.last(locationArr));
                    let country = _.trim(_.first(locationArr));
                    $('#city').val(city);
                    $('#country').val(country);
                    suggestView.destroy();
                });
            }
        });


    </script>
@endsection
@section('css')
@endsection
