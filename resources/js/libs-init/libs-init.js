// Прогресс бар

$(document).ready(function () {
	var $progress_bar = $('.skills-item');

	$progress_bar.each(function () {
		$progress_bar.appear({force_process: true});
		$progress_bar.on('appear', function () {
			var current_bar = $(this);
			if (!current_bar.data('inited')) {
				current_bar.find('.skills-item-meter-active').fadeTo(300, 1).addClass('skills-animate');
				current_bar.data('inited', true);
			}
		});
	});
});

// Пролистывание галереи + просмотр видео

CRUMINA.mediaPopups = function () {
	$('.play-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
	$('.js-zoom-image').magnificPopup({
		type: 'image',
		removalDelay: 500, 
		callbacks: {
			beforeOpen: function () {
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = 'mfp-zoom-in';
			}
		},
		closeOnContentClick: true,
		midClick: true
	});
	$('.js-zoom-gallery').each(function () {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true
			},
			removalDelay: 500, 
			callbacks: {
				beforeOpen: function () {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = 'mfp-zoom-in';
				}
			},
			closeOnContentClick: true,
			midClick: true
		});
	});
};

$(document).ready(function () {

	if (typeof $.fn.magnificPopup !== 'undefined'){
		CRUMINA.mediaPopups();
	}
});

// Чек бокс

CRUMINA.Materialize = function () {
	$.material.init();

	$('.checkbox > label').on('click', function () {
		$(this).closest('.checkbox').addClass('clicked');
	})
};

$(document).ready(function () {
	CRUMINA.Materialize();
});