<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Фото ({{ $imagesCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-last-photo">
            @foreach ($images as $item)
                @if ($loop->iteration < 9)
                    <li>



                        <a href="#" class="open-image-modal" data-path="{{ $imgSrc($item->image) }}">
                                <img src="{{ $imgSrc($item->image) }}" alt="photo">
                        </a>
                    </li>
                @else
                    <li style="display : none">
                        <a href="{{ $imgSrc($item->image) }}"></a>
                    </li>
                @endif
            @endforeach
            @if ($imagesCount()-8 > 0)
                <li class="all-users">
                    <a href="#">+{{ $imagesCount()-8 }}</a>
                </li>
            @endif
        </ul>
    </div>
</div>

<div class="portfolio" id="portfolio">
            <div class="portfolio__col" data-cat="app">
                <div class="work" data-modal="#modal_project_1">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>

            <div class="portfolio__col" data-cat="website">
                <div class="work" data-modal="#modal_project_2">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>

            <div class="portfolio__col" data-cat="interaction">
                <div class="work">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>

            <div class="portfolio__col" data-cat="website">
                <div class="work">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>

            <div class="portfolio__col" data-cat="interaction">
                <div class="work">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>

            <div class="portfolio__col" data-cat="app">
                <div class="work">
                    <img class="work__image" src="https://placehold.it/370x300" alt="">
                </div>
            </div>
        </div><!-- /.portfolio -->

<div class="modal" id="modal_project_1">
    <div class="modal__dialog">

        <button class="modal__close" type="button" data-close>
            <img src="{{ asset('img/modal-close.svg') }}" alt="Close">
        </button>

        <div class="modal-work">
            <div class="modal-work__preview">
                <div data-slider="slick">
                    <div>
                        <img class="modal-work__photo" src="https://placehold.it/790x780" alt="">
                    </div>
                    <div>
                        <img class="modal-work__photo" src="https://placehold.it/790x780/333" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-work__content">

                <div class="modal-work__header">
                    <h3 class="modal-work__title">Project title</h3>
                    <div class="modal-work__info">
                        category <span class="modal-work__info-divider">|</span> 2018
                    </div>
                </div>

                <div class="modal-work__client">
                    <div class="modal-work__client-title">Client:</div>
                    <div class="modal-work__client-company">Creative Agency</div>
                </div>

                <div class="modal-work__text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dicta, recusandae debitis iusto quos voluptatum at. Dolorum a, velit rerum dicta aut sapiente, optio accusantium? Sunt sed praesentium est minima.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dicta, recusandae debitis iusto quos voluptatum at. Dolorum a, velit rerum dicta aut sapiente, optio accusantium? Sunt sed praesentium est minima.</p>
                </div>

                <div class="modal-work__footer">
                    <button class="modal-work__btn slickPrev" type="button">
                        <img src="{{ asset('img/back.svg') }}" height="11" alt="">
                        Previous
                    </button>
                    <button class="modal-work__btn slickNext" type="button">
                        Next
                        <img src="{{ asset('img/next.svg') }}" height="11" alt="">
                    </button>
                </div>

            </div><!-- /.modal-work__content -->
        </div><!--/.modal-work -->

    </div><!-- /.modal__dialog -->
</div><!-- /.modal -->
