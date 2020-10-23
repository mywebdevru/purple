<div class="ui-block revealator-fade revealator-delay3 revealator-once">
    <div class="ui-block-title">
        <h6 class="title">Фото ({{ $imagesCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-last-photo">
            @foreach ($images as $item)
                @if ($loop->iteration < 9)
                    <li>
                    <a href="" data-toggle="modal" data-target="#open-photo-popup">
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
									<img src="https://static1.bocoup.com/assets/2015/11/05183211/font-face.jpg" alt="">
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
