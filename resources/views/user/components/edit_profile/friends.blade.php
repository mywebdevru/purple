@extends('layouts.app')

@section('content')
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar')@endcomponent

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
                        Заявки в друзья {{ $profile->full_name }}
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
                        <div class="ui-block-title">
                            <h6 class="title">Друзья ({{ count($data->friends) }}) </h6>
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
		
            </div>
            <center>
                <button class="btn btn-primary">Сохранить</button>
            </center>
        </form>        
    </div>
@endsection
