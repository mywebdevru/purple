<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Фото ({{ $imagesCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-last-photo">
            @foreach ($images as $item)
                @if ($loop->iteration < 9)
                    <li>



                        <a href="#" class="photo" data-modal="#modal_project_1" data-path="{{ $imgSrc($item->image) }}">
                                <img class="photo__image" src="{{ $imgSrc($item->image) }}" alt="photo">
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
<!-- <div class="modal-for-photo" id="modal-for-photo">
            <div class="modal-for-photo__col" data-cat="app">
                <div class="photo" data-modal="#modal_project_1">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>

            <div class="modal-for-photo__col" data-cat="website">
                <div class="photo" data-modal="#modal_project_2">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>

            <div class="modal-for-photo__col" data-cat="interaction">
                <div class="photo">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>

            <div class="modal-for-photo__col" data-cat="website">
                <div class="photo">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>

            <div class="modal-for-photo__col" data-cat="interaction">
                <div class="photo">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>

            <div class="modal-for-photo__col" data-cat="app">
                <div class="photo">
                    <img class="photo__image" src="" alt="">
                </div>
            </div>
        </div>-->

<div class="modal" id="modal_project_1">
    <div class="modal__dialog">

        <button class="modal__close" type="button" data-close>
            <svg class="olymp-close-icon">
                <use xlink:href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
            </svg>
        </button>

        <div class="modal-photo">
            <div class="modal-photo__preview">
                <a href="#" class="btn btn-control btn-for-gallery">
                    <svg class="olymp-like-post-icon liked-photo">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-like-post-icon') }}"></use>
                    </svg>
                </a>
                <a href="#" class="btn btn-control btn-for-gallery btn-for-gallery__top">
                    <svg class="olymp-share-icon repost-photo">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                    </svg>
                </a>
                <a href="#" class="btn btn-control btn-for-gallery btn-for-gallery__place">
                    <span class="place-name">Йоркшир</span>

                        <div class="coordinates">
                            <svg class="olymp-add-a-place-icon coordinates-icon-for-gallery">
                                <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-add-a-place-icon') }}"></use>
                            </svg>
                            <span>321321546.3123165466</span>
                        </div>
                </a>
                <div class="date-photo-gallery">12/12/2021</div>
                <div data-slider="slick">
                    <div>
                        <img class="modal-photo__photo" src="https://look.com.ua/pic/201209/1280x960/look.com.ua-41023.jpg" alt="">
                    </div>
                    <div>
                        <img class="modal-photo__photo" src="https://look.com.ua/pic/201311/1280x720/look.com.ua-83727.jpg" alt="">
                    </div>
                    <div>
                        <img class="modal-photo__photo" src="https://look.com.ua/pic/201209/1280x960/look.com.ua-41023.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="modal-photo__content">

                <div class="modal-photo__header">
                    <h3 class="modal-photo__title">Пользователь</h3>
                    <div class="modal-photo__info">
                        Описание красивого путешествия Описание красивого путешествия Описание красивого путешествия Описание красивого путешествия Описание красивого путешествия Описание красивого путешествия
                    </div>
                </div>

                <!-- <div class="modal-photo__client">
                    <div class="modal-photo__client-title">Пользователь:</div>
                    <div class="modal-photo__client-company">John Smith</div>
                </div> -->
                <p>Комментарии</p>
                <div class="modal-photo__text" id="modal-photo__comments">
                    <p></p>
                </div>

                <div class="enter-comment">
                    <input class="enter-comment__block" id="text-comment" type="text">
                    <button type="submit" class="enter-comment__submit" id="add-comment">SEND</button>
                </div>

                <div class="modal-photo__footer">
                    <button class="modal-photo__btn slickPrev" type="button">
                        <img class="modal-arrow" src="{{ asset('img/back.svg') }}" height="11" alt="">
                        ПРЕД
                    </button>
                    <button class="modal-photo__btn slickNext" type="button">
                        СЛЕД
                        <img class="modal-arrow" src="{{ asset('img/next.svg') }}" height="11" alt="">
                    </button>
                </div>

            </div><!-- /.modal-photo__content -->
        </div><!--/.modal-photo -->

    </div><!-- /.modal__dialog -->
</div><!-- /.modal -->

<!-- <script>
    let btnPhotoGallery = document.getElementsByClassName('btn-for-gallery');


btnPhotoGallery[0].onclick = function() {

    document.getElementsByClassName('liked-photo')[0].style.fill = 'rgb(253, 41, 41)'
}

btnPhotoGallery[1].onclick = function() {
    document.getElementsByClassName('repost-photo')[0].style.fill = 'rgb(253, 41, 41)'
}
</script> -->
