<div class="ui-block revealator-fade revealator-delay3 revealator-once">
    <div class="ui-block-title">
        <h6 class="title">Фото ({{ $imagesCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-last-photo">
            @foreach ($images as $item)
                @if ($loop->iteration < 9)
                    <li>
                        <a href="" data-toggle="modal" data-target="#open-photo-popup" data-src="{{ $imgSrc($item->image) }}" class="photo-src">
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
<div class="modal fade modal-has-swiper" id="open-photo-popup">
	<div class="modal-dialog window-popup open-photo-popup">
		<div class="modal-content">
			<div class="modal-body-gallery">
				<div class="open-photo-thumb">
					<div class="swiper-container" data-slide="fade">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="photo-item">

                                    <img class="modal-img" src="" alt="">

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="open-photo-content">
					<article class="hentry post">
						<div class="post__author author vcard inline-items">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="">Author / Photogrpher</a>
                                <div class="post__date">
                                    <time class="published" datetime="">

                                    </time>
                                </div>
                            </div>
					    </div>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function img() {
        var dataSrc = document.getElementsByClassName("photo-src");
        var modalImg = document.getElementsByClassName("modal-img");
        console.log(modalImg);
        for (let i = 0; i < dataSrc.length; i++) {
            var currentSrc = dataSrc[i].getAttribute('data-src');
            console.log(currentSrc);
        }
        for (let l = 0; l < modalImg.length; l++) {
            modalImg[l].setAttribute('src', currentSrc);
            console.log(modalImg[l])
        }
    }
    img();
</script>
