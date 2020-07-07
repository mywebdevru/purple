<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование профиля</title>
    <!-- Подключаю скрипты и CDN на всякий случай -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Локальные стили, чтобы точно всё работало -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="">
        <div class="navbar navbar-light-bg-light navbar-expand-md">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img src="/img/4x4.png" alt="LOGO" class="logo-4x4"></a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="#navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Лента</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Мой профиль</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Клубы</a></li>
                        <li class="nav-item"><span class="badge badge-important">6</span><a class="nav-link" href="#" data-toggle="modal" data-target="#notifyModal"><i class="fa fa-bell-o fa-lg bt4fix-fa-icons-blacked" aria-hidden="true"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#msgModal"><i class="fa fa-envelope-o fa-lg bt4fix-fa-icons-blacked" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                    <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" class="img-responsive rounded-circle" title="John Doe" alt="John Doe" width="30px" height="30px">
                                </span>
                                <span class="user-name">
                                    John Doe
                                </span>
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-menu-right mt-4">
                                <li>
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                                <!-- <p class="text-center small mt-2">
                                                    <a href="#" data-toggle="modal" data-target="#profpicModal"><i class="fa fa-upload"></i> Новое фото</a>
                                                </p> -->
                                            </div>
                                            <div class="col-md-7">
                                                <span>John Doe</span>
                                                <p class="text-muted small">
                                                    purple@mail.ru</p>
                                                <div class="divider">
                                                </div>
                                                <a href="#" class="btn btn-default btn-xs mb-2"><i class="fa fa-user-o" aria-hidden="true"></i> Редактировать</a>
                                                <!-- <a href="#" class="btn btn-default btn-xs mb-2" data-toggle="modal" data-target="#aboutModal"><i class="fa fa-address-card-o" aria-hidden="true"></i> О себе</a> -->
                                                <a href="#" class="btn btn-default btn-xs mb-2" data-toggle="modal" data-target="#setsModal"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a>
                                                <a href="#" class="btn btn-default btn-xs mb-2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Поддержка</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#passwdModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Сменить пароль</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-danger btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Выход</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mainbody container-fluid mt-4">
        <div class="row">
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="">
                            <div align="center">
                                <img class="thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="100%">
                                <p class="text-center small mt-2">
                                    <a href="#" data-toggle="modal" data-target="#profpicModal"><i class="fa fa-upload"></i> Новое фото</a>
                                </p>
                            </div>
                            <div class="media-body">
                                <hr>
                                <h3><strong>Девиз по жизни</strong></h3>
                                <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr>
                                <h3><strong>Автомобиль</strong></h3>
                                <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Рено логан</p>
                                <hr>
                                <h3><strong>Город</strong></h3>
                                <select class="p_input__style" id="city">
                                    <option disabled selected> Выберите город</option>
                                    <option  label="Москва"> Москва</option>
                                    <option  label="Санкт-Петербург"> Санкт-Петербург</option>
                                    <option  label="Самара"> Самара</option>
                                    <option  label="Ростов-на-Дону"> Ростов-на-Дону</option>
                                </select>
                                <hr>
                                <h3><strong>Пол</strong></h3>
                                <select class="p_input__style" id="gender">
                                    <option disabled selected> Выберите пол</option>
                                    <option  label="Мужской"> Мужской</option>
                                    <option  label="Женский"> Женский</option>                                    
                                </select>
                                <hr>
                                <h3><strong>Родился</strong></h3>
                                <input class="p_input__style" type="date" name="calendar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <p>Для редактировании нажми два раза на текст</p>
                <div class="card card-default">
                    <div class="card-body">
                        <h1 class="card-title pull-left change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ" style="font-size:30px;">Джон Доу</h1><br>
                        <hr>
                        <span class="pull-left">
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> Посты</a>
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-picture-o" aria-hidden="true"></i> Фотографии <span class="badge">42</span></a>
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-camera" aria-hidden="true"></i> Видео <span class="badge">42</span></a>
                        </span>
                        <span class="pull-right">
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Упомянуть в посте"></i></a>
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Написать сообщение"></i></a>
                            <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Заблокировать"></i></a>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="card card-default mb-4">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">                                
                                <hr>
                                <h3><strong>Телефон</strong></h3>                                
                                    <input type="text" id="phone" class="p_input__style" placeholder="8(800)0000000" required oninput="" pattern="[0-9]{11,}" />
                                <hr>
                                <h3><strong>E-Mail</strong></h3>
                                    <input type="text" id="email" class="p_input__style" placeholder="mail@mail.ru" required oninput="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                                <hr>
                                <h3><strong>Наличие иного транспорта для путешествий</strong></h3>
                                    <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr>
                                <h3><strong>Навыки (виды транспорта, умения, способности и пр.)</strong></h3>
                                    <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr> 
                                <h3><strong>Места которые посетил</strong></h3>
                                    <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr>
                                <h3><strong>Места которые хочу посетить</strong></h3>
                                    <p class="change_text" title="НАЖМИ ДВА РАЗА ДЛЯ РЕДАКТИРОВАНИЯ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr>
                                <h3><strong>Семейное положение</strong></h3>
                                    <select class="family p_input__style">
                                        <option disabled selected> Семейное положение</option>
                                        <option  label="В браке"> В браке</option>
                                        <option  label="Не в браке"> Не в браке</option>                                    
                                    </select>
                                <hr>
                                <button class="btn btn-primary ml-4">Сохранить</button>                                                                                                
                            </div>
                        </div>
                    </div>
                </div>                       
            </div>
        </div>
    </div>
    <!-- м о д а л к и -->
    <div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notifyModalLabel">Уведомления</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Подписался -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important subscribed"><i class="fa fa-plus bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">peacefulisac</a> отправил Вам заявку в друзья. <span class="text-muted notifytime">00:12</span><br>
                            </p>
                            <div class="mb-2 ml-4">
                                <button class="btn btn-primary"><i class="fa fa-plus"></i> Принять</button>
                                <button class="btn btn-danger"><i class="fa fa-minus"></i> Отклонить</button>
                            </div>
                            <div class="mb-2 ml-4">
                                <l class="accepted-text">Вы приняли заявку.</l>
                                <l class="declined-text">Вы отклонили заявку.</l>
                            </div>
                        </div>
                    </div>
                    <!-- Лайкнул пост -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important liked"><i class="fa fa-heart bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">rus</a> понравился ваш <a href="#">пост</a>. Как насчёт взаимности? <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                    <!-- Дал комментарий -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important commented"><i class="fa fa-comment bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">пажилойжмых</a> прокомментрировал вашу <a href="#">запись</a>. «Одно знаю точно, это будет MVP» <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                    <!-- Лайкнул комментарий -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important liked"><i class="fa fa-comment bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">unknown4126</a> понравился ваш комментарий «Главное не умереть, пока верстаешь» <a href="#">под постом</a>. <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                    <!-- Поделился записью -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important reposted"><i class="fa fa-retweet bt4fix-fa-icons-notif" aria-hidden="true"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">42</a> поделился <a href="#">вашей записью</a>. <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                    <!-- Принял заявку в друзья -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important accepted"><i class="fa fa-plus bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">zelenskiy</a> принял вашу заявку в друзья. <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                    <!-- Клуб одобрил заявку на вступление -->
                    <div class="row mb-2">
                        <div class="col-sm-1 text-left">
                            <a href="#">
                                <span class="badge badge-important accepted"><i class="fa fa-check bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="col-sm-10 text-left">
                            <p class="ml-4">
                                <a href="#">Название клуба</a> одобрило запрос на членство. Самое время посмотреть, чем живёт клуб! <span class="text-muted notifytime">00:12</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="msgModalLabel">Сообщения</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="mail-block">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"> Написать письмо</i>
                        </div>
                        <div class="mail-block">
                            <i class="fa fa-envelope-o fa-lg" aria-hidden="true"> Входящие</i>
                        </div>
                        <div class="mail-block">
                            <i class="fa fa-share fa-lg" aria-hidden="true"> Исходящие</i>
                        </div>
                        <div class="mail-block">
                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"> Корзина</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalLabel">Обо мне</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h3 class="abouthead">Основная информация</h3>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="profeditName">Имя</label>
                                <input type="name" class="form-control" id="profeditName" aria-describedby="profnameHelp" placeholder="Ваше имя">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="profeditsurName">Фамилия</label>
                                <input type="surname" class="form-control" id="profeditsurName" placeholder="Ваша Фамилия">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emailName">Email</label>
                                <input type="email" class="form-control" id="emailName" placeholder="ex@purple.mail">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="passwordName">Пароль</label>
                                <input type="password" class="form-control" id="passwordName" placeholder="...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Дата рождения</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="16.01.2003">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cityName">Город</label>
                                <input type="text" class="form-control" id="cityName" placeholder="Москва">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="alert accepted">
                                <strong>Готово!</strong> Клуб <b>Бампера и Грязь</b> получит вашу заявку на вступление.
                            </div>
                            <div class="alert liked">
                                <strong>Внимание!</strong> Клуб <b>Бампера и Грязь</b> отклонил вашу последнюю заявку, но вы можете подать заявку еще раз.
                            </div>
                            <div class="alert commented">
                                <strong>Важно!</strong> Вы уже состоите в клубе <b>Бампера и Грязь</b>. Прежде чем перейти в другой клуб, покиньте нынешний.
                            </div>
                            <div class="alert subscribed">
                                Клуб <b>Бампера и Грязь</b> одобрил вашу заявку. Клуб установлен у вас в Профиле.
                            </div>
                            <label>Клуб</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <h3 class="abouthead">Транспортное средство</h3>
                        <div class="col-sm-6">
                            <label>Марка</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Модель</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Девиз по жизни</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setsModal" tabindex="-1" role="dialog" aria-labelledby="setsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setsModalLabel">Настройки</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="settings-block">
                            <i class="fa fa-bell-o fa-lg" aria-hidden="true"> Настройка уведомлений</i>
                        </div>
                        <div class="settings-block">
                            <i class="fa fa-calendar fa-lg" aria-hidden="true"> Календарь событий</i>
                        </div>
                        <div class="settings-block">
                            <i class="fa fa-commenting-o fa-lg" aria-hidden="true"> FAQ</i>
                        </div>
                        <div class="settings-block">
                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"> Удалить профиль</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profpicModal" tabindex="-1" role="dialog" aria-labelledby="profpicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profpicModalLabel">Настройка аватарки</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="AVATAR" style="width: 250px; height: 250px;">
                        </div>
                    </div>
                    <span class="control-fileupload mt-2">
                        <label for="fileInput">Выберите файл:</label>
                        <input type="file" id="fileInput">
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwdModal" tabindex="-1" role="dialog" aria-labelledby="passwdModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwdModalLabel">Сменить пароль</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    <!-- Все нужные жс -->
    <script type="text/javascript" src="/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
