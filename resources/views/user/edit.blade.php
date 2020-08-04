@extends('layouts.app')

@section('content')
@component('user.components.left.l_sidebar')@endcomponent
@component('user.components.right.r_sidebar')@endcomponent

<div class="header-spacer"></div>

@component('user.components.wallpaper_block.main', ['data' => $user, 'user' => $user])@endcomponent

<!-- всплывающее окно для смены фото -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Обновить главное фото</h6>
            </div>

            <div class="modal-body">
                <a href="#" class="upload-photo-item">
                    <svg class="olymp-computer-icon">
                        <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                    </svg>

                    <h6>Загрузить фото</h6>
                    <span>С компьютера</span>
                </a>

                <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

                    <svg class="olymp-photos-icon">
                        <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                    </svg>

                    <h6>Выбрать фото</h6>
                    <span>Выбрать из загруженных</span>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- ... окончание всплывающего окна по смене фото -->

<!-- всплывающее окно по смене фото -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
    <div class="modal-dialog window-popup choose-from-my-photo" role="document">

        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Выбрать из моих фото</h6>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
                            <svg class="olymp-photos-icon">
                                <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
                            <svg class="olymp-albums-icon">
                                <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo1.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo2.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo3.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo4.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo5.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo6.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo7.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo8.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../../img/choose-photo9.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>


                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
                        <a href="#" class="btn btn-primary btn-lg btn--half-width">Выбрать</a>

                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../../img/choose-photo10.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">lorem</a>
                                    <span>Добавлено: 2 часа назад</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../../img/choose-photo11.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">lorem 2016</a>
                                    <span>Добавлено: 5 недель назад</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../../img/choose-photo12.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">lorem 2018</a>
                                    <span>Добавлено: 6 минут назад</span>
                                </figcaption>
                            </figure>
                        </div>






                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
                        <a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Добавить</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ... окончание всплывающего окна по смене фото -->

<!-- модалка плейлиста -->

<div class="window-popup playlist-popup" tabindex="-1" role="dialog" aria-labelledby="playlist-popup" aria-hidden="true">

    <a href="" class="icon-close js-close-popup">
        <svg class="olymp-close-icon">
            <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
        </svg>
    </a>

    <div class="mCustomScrollbar">
        <table class="playlist-popup-table">

            <thead>

            <tr>

                <th class="play">
                    PLAY
                </th>

                <th class="cover">
                    COVER
                </th>

                <th class="song-artist">
                    SONG AND ARTIST
                </th>

                <th class="album">
                    ALBUM
                </th>

                <th class="released">
                    RELEASED
                </th>

                <th class="duration">
                    DURATION
                </th>

                <th class="spotify">
                    GET IT ON SPOTIFY
                </th>

                <th class="remove">
                    REMOVE
                </th>
            </tr>

            </thead>

            <tbody>
            <tr>
                <td class="play">
                    <a href="#" class="play-icon">
                        <svg class="olymp-music-play-icon-big">
                            <use xlink:href="../../svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                        </svg>
                    </a>
                </td>
                <td class="cover">
                    <div class="playlist-thumb">
                        <img src="../../img/playlist8.jpg" alt="thumb-composition">
                    </div>
                </td>
                <td class="song-artist">
                    <div class="composition">
                        <a href="#" class="composition-name">Iron Maiden</a>
                        <a href="#" class="composition-author">Iron Maiden</a>
                    </div>
                </td>
                <td class="album">
                    <a href="#" class="album-composition">Iron Maiden</a>
                </td>
                <td class="released">
                    <div class="release-year">2014</div>
                </td>
                <td class="duration">
                    <div class="composition-time">
                        <time class="published" datetime="2017-03-24T18:18">6:17</time>
                    </div>
                </td>
                <td class="spotify">
                    <i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
                </td>
                <td class="remove">
                    <a href="#" class="remove-icon">
                        <svg class="olymp-close-icon">
                            <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                    </a>
                </td>
            </tr>

            <tr>
                <td class="play">
                    <a href="#" class="play-icon">
                        <svg class="olymp-music-play-icon-big">
                            <use xlink:href="../../svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                        </svg>
                    </a>
                </td>
                <td class="cover">
                    <div class="playlist-thumb">
                        <img src="../../img/playlist8.jpg" alt="thumb-composition">
                    </div>
                </td>
                <td class="song-artist">
                    <div class="composition">
                        <a href="#" class="composition-name">Iron Maiden</a>
                        <a href="#" class="composition-author">Iron Maiden</a>
                    </div>
                </td>
                <td class="album">
                    <a href="#" class="album-composition">Iron Maiden</a>
                </td>
                <td class="released">
                    <div class="release-year">2014</div>
                </td>
                <td class="duration">
                    <div class="composition-time">
                        <time class="published" datetime="2017-03-24T18:18">6:17</time>
                    </div>
                </td>
                <td class="spotify">
                    <i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
                </td>
                <td class="remove">
                    <a href="#" class="remove-icon">
                        <svg class="olymp-close-icon">
                            <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                    </a>
                </td>
            </tr>

            <tr>
                <td class="play">
                    <a href="#" class="play-icon">
                        <svg class="olymp-music-play-icon-big">
                            <use xlink:href="../../svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                        </svg>
                    </a>
                </td>
                <td class="cover">
                    <div class="playlist-thumb">
                        <img src="../../img/playlist8.jpg" alt="thumb-composition">
                    </div>
                </td>
                <td class="song-artist">
                    <div class="composition">
                        <a href="#" class="composition-name">Iron Maiden</a>
                        <a href="#" class="composition-author">Iron Maiden</a>
                    </div>
                </td>
                <td class="album">
                    <a href="#" class="album-composition">Iron Maiden</a>
                </td>
                <td class="released">
                    <div class="release-year">2014</div>
                </td>
                <td class="duration">
                    <div class="composition-time">
                        <time class="published" datetime="2017-03-24T18:18">6:17</time>
                    </div>
                </td>
                <td class="spotify">
                    <i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
                </td>
                <td class="remove">
                    <a href="#" class="remove-icon">
                        <svg class="olymp-close-icon">
                            <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <audio id="mediaplayer" data-showplaylist="true">
        <source src="" title="Track 1" data-poster="track1.png" type="audio/mpeg">
        <source src="" title="Track 2" data-poster="track2.png" type="audio/mpeg">
        <source src="" title="Track 3" data-poster="track3.png" type="audio/mpeg">
        <source src="" title="Track 4" data-poster="track4.png" type="audio/mpeg">
    </audio>

</div>

<!-- ... окончание модалки плейлиста -->


<a class="back-to-top" href="#">
    <img src="../../svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>




<!-- Блок чата -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

    <div class="modal-content">
        <div class="modal-header">
            <span class="icon-status online"></span>
            <h6 class="title">Чат</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
                <svg class="olymp-little-delete js-chat-open">
                    <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-little-delete"></use>
                </svg>
            </div>
        </div>
        <div class="modal-body">
            <div class="mCustomScrollbar">
                <ul class="notification-list chat-message chat-message-field">
                    <li>
                        <div class="author-thumb">
                            <img src="../../img/spiegel.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../../img/ii.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
                            <span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:29pm</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../../img/spiegel.jpg" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem Lorem</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
                        </div>
                    </li>
                </ul>
            </div>

            <form class="need-validation">

                <div class="form-group">
                    <textarea class="form-control" placeholder="Введите сообщение..."></textarea>
                    <div class="add-options-message">
                        <a href="#" class="options-message">
                            <svg class="olymp-computer-icon">
                                <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                            </svg>
                        </a>
                        <div class="options-message smile-block">

                            <svg class="olymp-happy-sticker-icon">
                                <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use>
                            </svg>

                            <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat1.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat2.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat3.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat4.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat5.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat6.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat7.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat8.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat9.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat10.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat11.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat12.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat13.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat14.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat15.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat16.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat17.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat18.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat19.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat20.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat21.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat22.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat23.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat24.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat25.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat26.png" alt="icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="../../img/icon-chat27.png" alt="icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Конец блока Чата -->

<div class="container pl-4 ml-4">
    <form>
        <div class="row">
            <div class="col-sm-12 mb-4">
                <h3 class="text-center">
                    Редактирование профиля name
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
