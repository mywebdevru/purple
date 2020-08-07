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

        </div>
    </div>
    <!-- Скрипты, вопсолняющие функционал левого меню. Должны идти либо с компонентом, либо в каком-то js-файле public -->
    <script>
        function changeHoverState(id) {
            console.log('[IN] На входе ID ' + id);
            if (id == "div1") {document.getElementById("link1").style.color = "white"; document.getElementById("link1").style.textDecoration = "none";}
            if (id == "div2") {document.getElementById("link2").style.color = "white"; document.getElementById("link2").style.textDecoration = "none";}
            if (id == "div3") {document.getElementById("link3").style.color = "white"; document.getElementById("link3").style.textDecoration = "none";}
            if (id == "div4") {document.getElementById("link4").style.color = "white"; document.getElementById("link4").style.textDecoration = "none";}
            if (id == "div5") {document.getElementById("link5").style.color = "white"; document.getElementById("link5").style.textDecoration = "none";}
            if (id == "div6") {document.getElementById("link6").style.color = "white"; document.getElementById("link6").style.textDecoration = "none";}
            if (id == "div7") {document.getElementById("link7").style.color = "white"; document.getElementById("link7").style.textDecoration = "none";}
        }
    </script>
    <script>
        function hoverStateMoveOut(id) {
            console.log('[OUT] На выходе ID ' + id);
            if (id == "div1") {document.getElementById("link1").style.color = "#ff5e3a"; document.getElementById("link1").style.textDecoration = "none";}
            if (id == "div2") {document.getElementById("link2").style.color = "#ff5e3a"; document.getElementById("link2").style.textDecoration = "none";}
            if (id == "div3") {document.getElementById("link3").style.color = "#ff5e3a"; document.getElementById("link3").style.textDecoration = "none";}
            if (id == "div4") {document.getElementById("link4").style.color = "#ff5e3a"; document.getElementById("link4").style.textDecoration = "none";}
            if (id == "div5") {document.getElementById("link5").style.color = "#ff5e3a"; document.getElementById("link5").style.textDecoration = "none";}
            if (id == "div6") {document.getElementById("link6").style.color = "#ff5e3a"; document.getElementById("link6").style.textDecoration = "none";}
            if (id == "div7") {document.getElementById("link7").style.color = "#ff5e3a"; document.getElementById("link7").style.textDecoration = "none";}
        }
    </script>
    <script>
        function locator(id) {
            let href = '';
            if (id == "div1") { let href = document.getElementById("link1").getAttribute("href"); document.location.href = href; }
            if (id == "div2") { let href = document.getElementById("link2").getAttribute("href"); document.location.href = href; }
            if (id == "div3") { let href = document.getElementById("link3").getAttribute("href"); document.location.href = href; }
            if (id == "div4") { let href = document.getElementById("link4").getAttribute("href"); document.location.href = href; }
            if (id == "div5") { let href = document.getElementById("link5").getAttribute("href"); document.location.href = href; }
            if (id == "div6") { let href = document.getElementById("link6").getAttribute("href"); document.location.href = href; }
            if (id == "div7") { let href = document.getElementById("link7").getAttribute("href"); document.location.href = href; }
        }
    </script>
</div>
@endsection