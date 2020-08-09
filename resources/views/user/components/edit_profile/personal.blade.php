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
                        <article class="hentry post video">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="exampleInputName1">Изменить имя</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше прекрасное имя здесь..." value="Иван">
                                    <small id="InputName1Help" class="form-text text-muted">Имя, которое видят все.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName2">Изменить фамилию</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваша фамилия здесь..." value="Иванов">
                                    <small id="InputName2Help" class="form-text text-muted">Фамилия, которую видят все.</small>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">Сменить Email</label>
                                    <input type="email" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш адрес электронной почты, если его надо сменить..." value="example@gb.ru">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group">
                                    <label for="examplecalendar">Выберите пол...</label>
                                    <select class="form-control form_edit_profile_field" id="examplecalendar">
                                        <option>Мужской</option>
                                        <option>Женский</option>
                                        <option>В смятении...</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Ваша дата рождения</label>
                                    <input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control form_edit_profile_field">
                                </div>

                                <div class="form-group">
                                    <label for="examplecity">Выберите страну</label>
                                    <select class="form-control form_edit_profile_field" id="country" value="Город, который выбрал пользователь"></select>
                                </div>

                                <div class="form-group">
                                    <label for="examplecity">Выберите город</label>
                                    <select class="form-control form_edit_profile_field" id="city" value="Город, который выбрал пользователь"></select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCreed1">Кредо</label>
                                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputCreed1" aria-describedby="emailHelp" placeholder="Ваша фраза здесь...">
                                    <small id="exampleInputCreed1" class="form-text text-muted">Не обязательно указывать</small>
                                </div>
                            </div>
                        </article>
                    </div>           
                </div>

                <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

                    <div class="ui-block">
                        @if ($data->usersVehicles->isEmpty())
                            <div class="ui-block-title">
                                <h6 class="title">Редактировать транспорт</h6>
                            </div>
                        @else
                            <div class="ui-block-title">
                                <h6 class="title">Редактировать транспорт</h6>
                            </div>
                        @endif

                        <ul class="widget w-friend-pages-added notification-list friend-requests js-zoom-gallery">
                            @forelse ($data->usersVehicles as $item)
                                <li class="inline-items">
                                    <div class="author-thumb">
                                        <img src="{{ $item->avatar }}" alt="author" class="avatar">
                                    </div>
                                    <div class="notification-event">
                                    <a href="{{ $item->avatar }}" class="h6 notification-friend">{{ $item->type }}</a>
                                        <span class="chat-message-item">{{ $item->full_vehicle_name }}</span>
                                    </div>
                                    <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                        <a href="#">
                                            <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                                        </a>
                                    </span>
                                </li>
                            @empty
                            @endforelse
                        </ul>
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
        $('#upload-photo').on('click', function (e) {
            e.preventDefault();
            $('#photo').trigger('click');
        });
        $('.profile-photo-modal-link').on('click', function (e) {
            e.preventDefault();
            type = $(this).data('upload-type')
        });
        $('#photo').on('change', async function (){
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
                if(image && imgType) {
                    const src = "{{ URL::to('/') }}" + '/' + image;
                    if(imgType === 'avatar') {
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
                if(response.status) {
                    return response;
                }
            } catch (e) {
                throw new Error(e.message);
            }
        }
    </script>
@endsection
