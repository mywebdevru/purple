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
    <div class="row">
        <div class="col-sm-3">
            <!-- Меню. Скорее всего, нужно выносить в компонент и генерироватьего только с этой стрроки -->
            <!-- 
                ЕДИНСТВЕННОЕ, ЧТО СТОИТ ОТМЕТИТЬ!
                Скриптам необходимо брать href из ссылок a для работы. Поэтому, в хрефах должны быть постоянные ссылки с роутами
                на разделы. Как я это вижу:

                href="/user/303/edit/clubs", а по коду /user/$userid(ID пользователя который авторизован)/edit/clubs
            -->
            <div class="profileeditmenu">
                <div class="profileeditmenu_body">
                    <div id="div1" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link1" href="/user/1/edit/personal" class="profileeditmenu_link"><i class="fas fa-user"></i> Персональная информация</a>
                    </div>
                    <div id="div2" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link2" href="/user/1/edit/vehicles" class="profileeditmenu_link"><i class="fas fa-car"></i> Автомобили</a>
                    </div>
                    <div id="div3" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link3" href="/user/1/edit/friends" class="profileeditmenu_link"><i class="fas fa-user-plus"></i> Друзья</a>
                    </div>
                    <div id="div4" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link4" href="/user/1/edit/groups" class="profileeditmenu_link"><i class="fas fa-globe"></i> Группы и сообщества</a>
                    </div>
                    <div id="div5" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link5" href="/user/1/edit/clubs" class="profileeditmenu_link"><i class="fas fa-users"></i> Клубы</a>
                    </div>
                    <div id="div6" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link6" href="/user/1/edit/maps" class="profileeditmenu_link"><i class="fas fa-map"></i> Карты</a>
                    </div>
                    <div id="div7" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link7" href="/user/1/edit/secure" class="profileeditmenu_link"><i class="fas fa-lock"></i> Безопасность</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <form>
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <h3 class="text-center">
                            Редактирование профиля Testing
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
    </div>
</div>
@javascript('user', $profile->id)
@endsection
@section('css')
<style>
    #photo {
        display: none;
    }

    .upload-photo-item:hover {
        cursor: pointer;
    }

</style>
@endsection
@section('scripts')
<script>
    let type = '';
    $('#upload-photo').on('click', function(e) {
        e.preventDefault();
        $('#photo').trigger('click');
    });
    $('.profile-photo-modal-link').on('click', function(e) {
        e.preventDefault();
        type = $(this).data('upload-type')
    });
    $('#photo').on('change', async function() {
        const file = $(this).prop('files')[0];
        const formData = new FormData();
        formData.append('file', file);
        formData.append('type', type);
        formData.append('user', user);
        try {
            const response = await imageUpload(formData);
            $('#update-header-photo').modal('hide');
            const image = response.image,
                imgType = response.type;
            if (image && imgType) {
                const src = "{{ URL::to('/') }}" + '/' + image;
                if (imgType === 'avatar') {
                    $('.author-image').attr('src', src);
                    $('#header-avatar').attr('src', src);
                } else if (imgType === 'wallpaper') {
                    $('#wallpaper').attr('src', src);
                }
                swal("Успех!", "Вы успешно загрузили новое изображение", "success");
            }
        } catch (e) {
            console.log(e.message);
            swal("Ошибка!", e.message, "danger");
        }
    });
    async function imageUpload(data) {
        try {
            const response = (await axios({
                data,
                method: 'post',
                url: "{{ route('api.profile.upload') }}",
            })).data;
            if (response.status) {
                return response;
            }
        } catch (e) {
            throw new Error(e.message);
        }
    }

</script>
<!-- Скрипты, вопсолняющие функционал левого меню. Должны идти либо с компонентом, либо в каком-то js-файле public -->
<script>
    function changeHoverState(id) {
        console.log('[IN] На входе ID ' + id);
        if (id == "div1") {
            document.getElementById("link1").style.color = "white";
            document.getElementById("link1").style.textDecoration = "none";
        }
        if (id == "div2") {
            document.getElementById("link2").style.color = "white";
            document.getElementById("link2").style.textDecoration = "none";
        }
        if (id == "div3") {
            document.getElementById("link3").style.color = "white";
            document.getElementById("link3").style.textDecoration = "none";
        }
        if (id == "div4") {
            document.getElementById("link4").style.color = "white";
            document.getElementById("link4").style.textDecoration = "none";
        }
        if (id == "div5") {
            document.getElementById("link5").style.color = "white";
            document.getElementById("link5").style.textDecoration = "none";
        }
        if (id == "div6") {
            document.getElementById("link6").style.color = "white";
            document.getElementById("link6").style.textDecoration = "none";
        }
        if (id == "div7") {
            document.getElementById("link7").style.color = "white";
            document.getElementById("link7").style.textDecoration = "none";
        }
    }

</script>
<script>
    function hoverStateMoveOut(id) {
        console.log('[OUT] На выходе ID ' + id);
        if (id == "div1") {
            document.getElementById("link1").style.color = "#ff5e3a";
            document.getElementById("link1").style.textDecoration = "none";
        }
        if (id == "div2") {
            document.getElementById("link2").style.color = "#ff5e3a";
            document.getElementById("link2").style.textDecoration = "none";
        }
        if (id == "div3") {
            document.getElementById("link3").style.color = "#ff5e3a";
            document.getElementById("link3").style.textDecoration = "none";
        }
        if (id == "div4") {
            document.getElementById("link4").style.color = "#ff5e3a";
            document.getElementById("link4").style.textDecoration = "none";
        }
        if (id == "div5") {
            document.getElementById("link5").style.color = "#ff5e3a";
            document.getElementById("link5").style.textDecoration = "none";
        }
        if (id == "div6") {
            document.getElementById("link6").style.color = "#ff5e3a";
            document.getElementById("link6").style.textDecoration = "none";
        }
        if (id == "div7") {
            document.getElementById("link7").style.color = "#ff5e3a";
            document.getElementById("link7").style.textDecoration = "none";
        }
    }

</script>
<script>
    function locator(id) {
        let href = '';
        if (id == "div1") {
            let href = document.getElementById("link1").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div2") {
            let href = document.getElementById("link2").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div3") {
            let href = document.getElementById("link3").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div4") {
            let href = document.getElementById("link4").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div5") {
            let href = document.getElementById("link5").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div6") {
            let href = document.getElementById("link6").getAttribute("href");
            document.location.href = href;
        }
        if (id == "div7") {
            let href = document.getElementById("link7").getAttribute("href");
            document.location.href = href;
        }
    }

</script>
@endsection
