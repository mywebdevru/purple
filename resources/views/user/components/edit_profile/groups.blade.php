@extends('layouts.app')

@section('content')
@component('user.components.left.l_sidebar')@endcomponent
@component('user.components.right.r_sidebar')@endcomponent

<div class="header-spacer"></div>

@component('user.components.wallpaper_block.main', ['data' => $user, 'user' => $user])@endcomponent

<a class="back-to-top" href="#">
    <img src="../../../svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<div class="container pl-4">
    <div class="row mt-4">
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
                        <a id="link4" href="/user/1/edit/groups" class="profileeditmenu_link"><i class="fas fa-globe"></i> Клубы</a>
                    </div>
                    <div id="div5" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link5" href="/user/1/edit/maps" class="profileeditmenu_link"><i class="fas fa-map"></i> Карты</a>
                    </div>
                    <div id="div6" class="profileeditmenu_element mb-2 px-4 py-2" onclick="locator(this.id)" onmouseover="changeHoverState(this.id)" onmouseout="hoverStateMoveOut(this.id)">
                        <a id="link6" href="/user/1/edit/secure" class="profileeditmenu_link"><i class="fas fa-lock"></i> Безопасность</a>
                    </div>
                </div>
            </div>
            <!-- А вот тут должен быть конец компонента -->
        </div>
        <div class="col-sm-9">
            <h2 class="text-center">Клубы</h2>
            <div class="currentclub py-4 px-4 mb-2">
                <h4 class="mb-2">Ваши клубы (членство и подписки) <a data-toggle="collapse" href="#clubslistcollapse" role="button" aria-expanded="false" aria-controls="clubslistcollapse"><i class="fas fa-arrow-down"></i></a></h4>
                <div class="collapse clubslistcollapse" id="clubslistcollapse">
                    <!-- Подписка оформлена, но не отправлена заявка -->
                    <div class="text-center mb-2">
                        <img src="http://placehold.it/1080x1080" alt="CURRENTCLUB" class="currentclub-image">
                        <h3 class="text-center">Бампера и Грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3>
                        <l>Сыктывкар</l><br>
                        <l>Вы подписаны на клуб, но не являетесь участником</l><br>
                        <div class="mt-2 flex-center">
                            <button class="btn btn-primary">Страница клуба</button>
                            <button class="btn btn-primary">Участники</button>
                            <button class="btn btn-danger">Отписаться</button>
                            <button class="btn btn-success">Подать заявку</button>
                        </div>
                    </div>
                    <hr class="clubslist_hr">
                    <!-- Подписка оформлена, но не отправлена заявка -->
                    <div class="text-center mb-2">
                        <img src="http://placehold.it/1080x1080" alt="CURRENTCLUB" class="currentclub-image">
                        <h3 class="text-center">Бампера и Грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3>
                        <l>Сыктывкар</l><br>
                        <l>Вы подписались на клуб и подали заявку</l><br>
                        <div class="mt-2 flex-center">
                            <button class="btn btn-primary">Страница клуба</button>
                            <button class="btn btn-primary">Участники</button>
                            <button class="btn btn-danger">Отписаться</button>
                            <button class="btn btn-success" disabled>Заяка отправлена</button>
                        </div>
                    </div>
                    <hr class="clubslist_hr">
                    <!-- Подписка оформлена, заявка отклонена клубом -->
                    <div class="text-center mb-2">
                        <img src="http://placehold.it/1080x1080" alt="CURRENTCLUB" class="currentclub-image">
                        <h3 class="text-center">Бампера и Грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3>
                        <l>Сыктывкар</l><br>
                        <l><b>ВНИМАНИЕ!</b> Вы подписаны на клуб, но ваша заявка на вступление отклонена</l><br>
                        <div class="mt-2 flex-center">
                            <button class="btn btn-primary">Страница клуба</button>
                            <button class="btn btn-primary">Участники</button>
                            <button class="btn btn-danger">Отписаться</button>
                            <button class="btn btn-danger">Заявка отклонена, попробуете ещё раз?</button>
                        </div>
                    </div>
                    <hr class="clubslist_hr">
                    <!-- Подписка оформлена, но заявку отменил пользователь (а это вообще будет отображаться?) -->
                    <div class="text-center mb-2">
                        <img src="http://placehold.it/1080x1080" alt="CURRENTCLUB" class="currentclub-image">
                        <h3 class="text-center">Бампера и Грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3>
                        <l>Сыктывкар</l><br>
                        <l><b>ВНИМАНИЕ!</b> Вы подписаны на клуб, но вы отменили заявку</l><br>
                        <div class="mt-2 flex-center">
                            <button class="btn btn-primary">Страница клуба</button>
                            <button class="btn btn-primary">Участники</button>
                            <button class="btn btn-danger">Отписаться</button>
                            <button class="btn btn-danger">Заявка отменена, вы передумали?</button>
                        </div>
                    </div>
                    <hr class="clubslist_hr">
                    <!-- Подписка оформлена, но заявку отменил пользователь (а это вообще будет отображаться?) -->
                    <div class="text-center mb-2">
                        <img src="http://placehold.it/1080x1080" alt="CURRENTCLUB" class="currentclub-image">
                        <h3 class="text-center">Бампера и Грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3>
                        <l>Сыктывкар</l><br>
                        <l>Вы являетесь участником клуба</l><br>
                        <div class="mt-2 flex-center">
                            <button class="btn btn-primary">Страница клуба</button>
                            <button class="btn btn-primary">Участники</button>
                            <button class="btn btn-danger">Покинуть клуб</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clubstosub py-4 px-4">
                <h4 class="mb-2">Клубы, на которые можно подписаться <a data-toggle="collapse" href="#clubstosubcollapse" role="button" aria-expanded="false" aria-controls="clubstosubcollapse"><i class="fas fa-arrow-down"></i></a></h4>
                <div class="collapse clubstosubcollapse" id="clubstosubcollapse">
                    <div class="clubstosub_block py-4 px-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="http://placehold.it/1080x1080" alt="CLUBTOSUB" class="clubstosubimg">
                            </div>
                            <div class="col-sm-9">
                                <h3 class="mb-2">Тестовый клуб?</h3> <l>Москва</l>
                                <div class="flex-center mt-2">
                                    <button class="btn btn-primary">Страница клуба</button>
                                    <button class="btn btn-success">Подписаться</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="clubstosub_block py-4 px-4">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="http://placehold.it/1080x1080" alt="CLUBTOSUB" class="clubstosubimg">
                            </div>
                            <div class="col-sm-9">
                                <h3 class="mb-2">Бампера и грязь <i class="fas fa-check club_confirmed_state" data-toggle="tooltip" data-placement="right" title="Клуб заргестрирован официально"></i></h3> <l>Сыктывкар</l>
                                <div class="flex-center mt-2">
                                    <button class="btn btn-primary">Страница клуба</button>
                                    <button class="btn btn-primary" disabled>Подписка оформлена</button>
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
    <!-- Скрипты, вопсолняющие функционал левого меню. Должны идти либо с компонентом, либо в каком-то js-файле public -->
    <script>function changeHoverState(e){var t;"div1"==e&&((t=document.getElementById("link1")).style.color="white",t.style.textDecoration="none"),"div2"==e&&((t=document.getElementById("link2")).style.color="white",t.style.textDecoration="none"),"div3"==e&&((t=document.getElementById("link3")).style.color="white",t.style.textDecoration="none"),"div4"==e&&((t=document.getElementById("link4")).style.color="white",t.style.textDecoration="none"),"div5"==e&&((t=document.getElementById("link5")).style.color="white",t.style.textDecoration="none"),"div6"==e&&((t=document.getElementById("link6")).style.color="white",t.style.textDecoration="none")}function hoverStateMoveOut(e){var t;"div1"==e&&((t=document.getElementById("link1")).style.color="#ff5e3a",t.style.textDecoration="none"),"div2"==e&&((t=document.getElementById("link2")).style.color="#ff5e3a",t.style.textDecoration="none"),"div3"==e&&((t=document.getElementById("link3")).style.color="#ff5e3a",t.style.textDecoration="none"),"div4"==e&&((t=document.getElementById("link4")).style.color="#ff5e3a",t.style.textDecoration="none"),"div5"==e&&((t=document.getElementById("link5")).style.color="#ff5e3a",t.style.textDecoration="none"),"div6"==e&&((t=document.getElementById("link6")).style.color="#ff5e3a",t.style.textDecoration="none")}</script>
    <script>function locator(e){if("div1"==e){var t=document.getElementById("link1").getAttribute("href");console.log(t),document.location.href=t}"div2"==e&&(t=document.getElementById("link2").getAttribute("href"),console.log(t),document.location.href=t),"div3"==e&&(t=document.getElementById("link3").getAttribute("href"),console.log(t),document.location.href=t),"div4"==e&&(t=document.getElementById("link4").getAttribute("href"),console.log(t),document.location.href=t),"div5"==e&&(t=document.getElementById("link5").getAttribute("href"),console.log(t),document.location.href=t),"div6"==e&&(t=document.getElementById("link6").getAttribute("href"),console.log(t),document.location.href=t)}</script>
</div>
@endsection
