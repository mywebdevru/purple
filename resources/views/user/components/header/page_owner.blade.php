<div class="author-page author vcard inline-items more">
    <div class="author-thumb">
        <img alt="author" src="{{ $avatar }}" class="avatar" id="header-avatar">
        <span class="icon-status online"></span>
        <div class="more-dropdown more-with-triangle">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Your Account</h6>
                </div>

                <ul class="account-settings">
                    <li>
                        <a href="{{ route('user.edit', $id) }}">

                            <svg class="olymp-menu-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-menu-icon') }}"></use></svg>

                            <span>Настройки профиля</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>

                            <span>Создать пост</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <svg class="olymp-logout-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-logout-icon') }}"></use></svg>

                            <span>Выйти</span>
                        </a>
                    </li>
                </ul>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Настройки чата</h6>
                </div>

                <ul class="chat-settings">
                    <li>
                        <a href="#">
                            <span class="icon-status online"></span>
                            <span>Online</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-status away"></span>
                            <span>Отошел</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-status disconected"></span>
                            <span>Вне доступа</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon-status status-invisible"></span>
                            <span>Невидимка</span>
                        </a>
                    </li>
                </ul>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Индивидуальный статус</h6>
                </div>

                <form class="form-group with-button custom-status">
                    <input class="form-control" placeholder="" type="text" value="Следопыт">

                    <button class="bg-purple">
                        <svg class="olymp-check-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-check-icon') }}"></use></svg>
                    </button>
                </form>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Правила сайта</h6>
                </div>

                <ul>
                    <li>
                        <a href="#">
                            <span>Термины и определения</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>FAQs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Полезная информация</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Контакты</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <a href="{{ route('user.show', ['user' => auth()->user()]) }}" class="author-name fn">
        <div class="author-title">
            {{ $full_name }} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
        </div>
        <span class="author-subtitle">{{ $creed }}</span>
    </a>
</div>
