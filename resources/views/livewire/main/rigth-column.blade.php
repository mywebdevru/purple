<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
    <x-friends-block :friends="$user->friends"/>
    <x-images-block :images="$user->images"/>
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Избранные карты</h6>
        </div>
        {{-- Избранные места --}}
        <ul class="widget w-friend-pages-added notification-list friend-requests">
            <li class="inline-items">
                <div class="author-thumb">
                    <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">The Marina Bar</a>
                    <span class="chat-message-item">Restaurant / Bar</span>
                </div>
                <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                    <a href="#">
                        <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                    </a>
                </span>
            </li>

            <li class="inline-items">
                <div class="author-thumb">
                    <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Tapronus Rock</a>
                    <span class="chat-message-item">Rock Band</span>
                </div>
                <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                    <a href="#">
                        <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                    </a>
                </span>

            </li>

            <li class="inline-items">
                <div class="author-thumb">
                    <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Pixel Digital Design</a>
                    <span class="chat-message-item">Company</span>
                </div>
                <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                    <a href="#">
                        <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                    </a>
                </span>
            </li>
        </ul>
        <!-- .. окончание избранных мест -->
    </div>
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Опрос</h6>
        </div>
        <div class="ui-block-content">
            <!-- голосовалка -->
            <ul class="widget w-pool">
                <li>
                    <p>Lorem ipsum dolor sit amet</p>
                </li>
                <li>
                    <div class="skills-item">
                        <div class="skills-item-info">
                            <span class="skills-item-title">
                                <span class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios">
                                        Thomas Bale
                                    </label>
                                </span>
                            </span>
                            <span class="skills-item-count">
                                <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span>
                                <span class="units">62%</span>
                            </span>
                        </div>
                        <div class="skills-item-meter">
                            <span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
                        </div>

                        <div class="counter-friends">12 друзей проголосовали</div>

                        <ul class="friends-harmonic">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#" class="all-users">+3</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="skills-item">
                        <div class="skills-item-info">
                            <span class="skills-item-title">
                                <span class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios">
                                        Thomas Bale
                                    </label>
                                </span>
                            </span>
                            <span class="skills-item-count">
                                <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span>
                                <span class="units">27%</span>
                            </span>
                        </div>
                        <div class="skills-item-meter">
                            <span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
                        </div>
                        <div class="counter-friends">7 друзей проголосовали</div>

                        <ul class="friends-harmonic">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div class="skills-item">
                        <div class="skills-item-info">
                            <span class="skills-item-title">
                                <span class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios">
                                        Thomas Bale
                                    </label>
                                </span>
                            </span>
                            <span class="skills-item-count">
                                <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
                                <span class="units">11%</span>
                            </span>
                        </div>
                        <div class="skills-item-meter">
                            <span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
                        </div>

                        <div class="counter-friends">2 друзей проголосовали</div>

                        <ul class="friends-harmonic">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- .. окончание Голосовалки -->
            <a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Голосовать</a>
        </div>
    </div>
</div>
