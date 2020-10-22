<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Профиль</h6>
        </div>
        <div class="ui-block-content">
            <!-- Обо мне -->
            <ul class="widget w-personal-info item-block">
                <li>
                    <span class="title">{{ $user->full_name }}</span>
                    <span class="text">{{ $user->creed }}</span>
                </li>
                <li>
                    <span class="title">Пол:</span>
                    <span class="text">{{ $user->gender }}</span>
                </li>
                <li>
                    <span class="title">Обитаю в:</span>
                    <span class="text">{{ $user->location }}</span>
                </li>
                <li>
                    <span class="title">Рожден:</span>
                    <span class="text">{{ $user->birth_date }}</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- Автомобили -->
    <div class="ui-block">
        @if ($user->usersVehicles->isEmpty())
            <div class="ui-block-title">
                <h6 class="title">Я хожу пешком</h6>
            </div>
        @else
            <div class="ui-block-title">
                <h6 class="title">Я катаюсь на:</h6>
            </div>
        @endif

        <ul class="widget w-friend-pages-added notification-list friend-requests js-zoom-gallery">
            @forelse ($user->usersVehicles as $item)
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
    <!-- .. окончание Авто -->

    <div class="ui-block ">
        <div class="ui-block-title">
            <h6 class="title">Видео</h6>
        </div>
        <div class="ui-block-content">

            <!-- Видео -->

            <ul class="widget w-last-video">
                <li>
                    <a href="https://www.youtube.com/watch?v=eFOvZojUJto" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
                        </svg>
                    </a>
                    <img src="{{ asset('img/boss.png') }}" alt="video">
                    <div class="video-content">
                        <div class="title">Boss's dauther Pop Evil</div>
                        <time class="published" datetime="2017-03-24T18:18">3:25</time>
                    </div>
                    <div class="overlay"></div>
                </li>
                <li>
                    <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
                        </svg>
                    </a>
                    <img src="{{ asset('img/video2.png') }}" alt="video">
                    <div class="video-content">
                        <div class="title">Kraftklub - Alles Wegen Dir</div>
                        <time class="published" datetime="2017-03-24T18:18">5:48</time>
                    </div>
                    <div class="overlay"></div>
                </li>
            </ul>

            <!-- .. окончание Видео -->
        </div>
    </div>

    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Регалии</h6>
        </div>
        <div class="ui-block-content">

            <!-- Регалии -->

            <ul class="widget w-badges">
                <li>
                    <a href="">
                        <img src="{{ asset('img/badge1.png') }}" alt="author">
                        <div class="label-avatar bg-primary">2</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge4.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge3.png') }}" alt="author">
                        <div class="label-avatar bg-blue">4</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge6.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge11.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge8.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge10.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge13.png') }}" alt="author">
                        <div class="label-avatar bg-breez">2</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge7.png') }}" alt="author">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ asset('img/badge12.png') }}" alt="author">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
