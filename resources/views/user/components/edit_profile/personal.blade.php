@php
/**
 * @var $profile \App\User
*/
@endphp

@extends('layouts.app')

@section('content')
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar')@endcomponent

    <div class="header-spacer"></div>

    @component('user.components.wallpaper_block.main', ['data' => $profile, 'user' => $profile])@endcomponent

    <a class="back-to-top" href="#">
        <img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
    </a>

    <div class="container">
        <form>
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h3 class="text-center">
                        Редактирование профиля {{ $profile->full_name }}
                    </h3>
                </div>
                <div class="col-sm-12">
                    <!-- Это место под алерт -->
                    <div class="alert alert-success alert-dismissible fade show alert-fix-success" role="alert">
                        <strong>Готово!</strong> Вы успешно изменили собственные данные. Можете продолжать пользоваться сервисом!
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show alert-fix-danger" role="alert">
                        <strong>Погодите-ка!</strong> При изменении данных произошла ошибка. Проверьте поля, которые вы изменяли.
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputName1">Отображаемое Имя</label>
                        <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше прекрасное имя здесь..." value="Иван">
                        <small id="InputName1Help" class="form-text text-muted">Имя, которое видят все.</small>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputName2">Отображаемое Имя</label>
                        <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваша фамилия здесь..." value="Иванов">
                        <small id="InputName2Help" class="form-text text-muted">Фамилия, которую видят все.</small>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш адрес электронной почты, если его надо сменить..." value="example@gb.ru">
                        <small id="emailHelp" class="form-text text-muted">Это только для нас.</small>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a href="#" class="author-thumb revealator-zoomin revealator-within">
                        <img src="../../img/i.jpg" alt="author" class="author-image">
                    </a>
                </div>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Выберите новый аватар для профиля <i class="fas fa-download"></i></label>
                        <small id="file" class="form-text text-muted">Рекомендации для аватара: соотношение 1:1, .jpeg или .png, размер не меньше 50x50</small>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="examplecalendar">Выберите пол...</label>
                        <select class="form-control form_edit_profile_field" id="examplecalendar">
                            <option>Мужской</option>
                            <option>Женский</option>
                            <option>В смятении...</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Ваша дата рождения</label>
                        <input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control form_edit_profile_field">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputCreed1">Кредо</label>
                        <input type="text" class="form-control form_edit_profile_field" id="exampleInputCreed1" aria-describedby="emailHelp" placeholder="Ваша фраза здесь...">
                        <small id="exampleInputCreed1" class="form-text text-muted">Если оно у вас есть :)</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="examplecity">Выберите город</label>
                    <select class="form-control form_edit_profile_field" id="city" value="Город, который выбрал пользователь"></select>
                </div>
                <div class="col-sm-6">
                    <label for="examplecity">Выберите страну</label>
                    <select class="form-control form_edit_profile_field" id="country" value="Город, который выбрал пользователь"></select>
                </div>
            </div>
            <center>
                <button class="btn btn-primary">Сохранить</button>
            </center>
        </form>
    </div>
@endsection
@section('css')
    <style>
        #photo {
            display: none;
        }
    </style>
@endsection
@section('scripts')
    <script>
        let type = '';
        $('#upload-photo').on('click', function (e) {
            e.preventDefault();
            $('#photo').trigger('click');
            console.log(type);
        });
        $('.profile-photo-modal-link').on('click', function (e) {
            e.preventDefault();
            type = $(this).data('upload-type')
        });
        $('#photo').on('change', function (){
            const file = $(this).prop('files')[0];
            const formData = new FormData();
            formData.append('file', file);
        });
    </script>
@endsection
