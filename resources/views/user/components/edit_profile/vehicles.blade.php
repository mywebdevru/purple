@extends('layouts.app')

@section('content')
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar', ['friends' => $user->friends])@endcomponent

    <div class="header-spacer"></div>

    @component('user.components.wallpaper_block.main', ['data' => $user, 'user' => $user])@endcomponent

    <a class="back-to-top" href="#">
        <img src="../../svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>

    <div class="container">
        <form>
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h3 class="text-center">
                        Редактирование транспортного средства {{ $profile->full_name }}
                    </h3>
                </div>
                <!-- Это место под алерт -->
                <!-- <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show alert-fix-success" role="alert">
                        <strong>Готово!</strong> Вы успешно изменили собственные данные. Можете продолжать пользоваться сервисом!
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show alert-fix-danger" role="alert">
                        <strong>Погодите-ка!</strong> При изменении данных произошла ошибка. Проверьте поля, которые вы изменяли.
                    </div>
                </div> -->



                <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                    <div class="ui-block">
                           <form>
                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить марку</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Марка автомобиля" value="Toyota">
                                    <small id="InputName1Help" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить модель</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Модель автомобиля" value="Corolla">
                                    <small id="InputName1Help" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить тип</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Тип автомобиля" value="Седан">
                                    <small id="InputName1Help" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить год выпуска</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Год выпуска" value="2015">
                                    <small id="InputName1Help" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить вместимость</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Вместимость" value="5">
                                    <small id="InputName1Help" class="form-text text-muted"></small>
                                </div>
                           </form>
                    </div>
                </div>

                <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Редактировать профиль</h6>
                        </div>
                        <div class="ui-block-content">

                            <!-- Обо мне -->

                            <ul class="widget w-personal-info item-block">
                                <li>
                                    <span class="title">{{ $data->full_name }}</span>
                                    <span class="text">{{ $data->creed }}</span>
                                </li>
                                <li>
                                    <span class="title">Пол:</span>
                                    <span class="text">{{ $data->gender }}</span>
                                </li>
                                <li>
                                    <span class="title">Обитаю в:</span>
                                    <span class="text">{{ $data->location }}</span>
                                </li>
                                <li>
                                    <span class="title">Рожден:</span>
                                    <span class="text">{{ $data->birth_date }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

                <div class="ui-block">
                            <div class="ui-block-title">
                                <h6 class="title">Друзья ({{ count($data->friends) }}) Редактировать</h6>
                            </div>
                            <div class="ui-block-content">

                                <!--друзья -->

                                <ul class="widget w-faved-page js-zoom-gallery">
                                    @foreach ($data->friends as $friend)
                                        <li>
                                            <a href="#">
                                                <img src="{{ $friend->user->avatar }}" alt="author">
                                            </a>
                                        </li>
                                    @break($loop->iteration == 14)
                                    @endforeach
                                    @if (count($data->friends)-14 > 0)
                                        <li class="all-users">
                                            <a href="#">+{{ count($data->friends)-14 }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                    </div>
            </div>

            </div>
            <center>
                <button class="btn btn-primary">Сохранить</button>
            </center>
        </form>
    </div>
@endsection
