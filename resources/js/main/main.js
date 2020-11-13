// Скрипты для страницы редактирования профиля

$(document).ready(function()
{
// $(function () {
//     $('[data-toggle="tooltip"]').tooltip()
// });

// $(function () {
//     $('[data-toggle="popover"]').popover()
// });

$('#js-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplaySpeed: 2000,
    autoplayHoverPause: true,
    slideTransition: 'linear',
    items: 2,
    nav: false,
    dots: false,

    responsive: {
      600: {
        items: 3
      }
    }
  });

$(function () {
    $('input[type=file]').change(function () {
        var t = $(this).val();
        var labelText = 'File : ' + t.substr(12, t.length);
        $(this).prev('label').text(labelText);
    })
});

function view(n) {
    style = document.getElementById(n).style;
    style.display = (style.display == 'block') ? 'none' : 'block';
    style.transition = '600ms';
    document.querySelector(".form-rows").setAttribute("rows", "6");
    document.querySelector(".form-post").style.display = "flow-root";
};

function limitChars(textid, limit, infodiv) {
    var text = $('#' + textid).val();
    var textlength = text.length;
    if (textlength > limit) {
        $('#' + infodiv).html('Вам нельзя написать более чем ' + limit + ' символов!');
        $('#' + textid).val(text.substr(0, limit));
        return false;
    } else {
        $('#' + infodiv).html('Осталось ' + (limit - textlength) + ' символов.');
        return true;
    }
};

$(function () {
    $('#comment').keyup(function () {
        limitChars('comment', 20, 'charlimitinfo');
    })
});


    var oldText, newText;
    $(".change_text").bind("dblclick", replaceHTML);


	$(document).on("click", ".btnSave", function(){
            newText = $(this).siblings("form")
                                .children(".editBox")
                                .val().replace(/"/g, "&quot;");

            $(this).parent()
                    .html(newText)
                    .removeClass("noPad")
                    .bind("dblclick", replaceHTML);
        });

	$(document).on("click", ".btnDiscard", function(){
            $(this).parent()
                    .html(oldText)
                    .removeClass("noPad")
                    .bind("dblclick", replaceHTML);
        });

	function replaceHTML()
        {
            oldText = $(this).html()
                                .replace(/"/g, "&quot;");
            $(this).addClass("noPad")
                    .html("")
                    .html("<form><input type=\"text\" class=\"editBox\" value=\"" + oldText + "\" /> </form><a href=\"#\" class=\"btnSave\">Сохранить</a> <a href=\"#\" class=\"btnDiscard\">Отменить</a>")
                    .unbind('dblclick', replaceHTML);

        }
});

// конец кодя для страницы редактирования


// страница Профиль

var CRUMINA = {};

(function ($) {

	"use strict";

	var $window = $(window),
		$document = $(document),
		$body = $('body'),
        $sidebar = $('.fixed-sidebar');


	// Плавный скролл вверх
        jQuery('.back-to-top').on('click', function () {
            $('html,body').animate({
                scrollTop: 0
            }, 1200);
            return false;
        });

	// Выпадающее меню

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // activated tab
        if('#events' === target){
            $('.fc-state-active').click();
        }
    });

	// Панели
	$(".js-sidebar-open").on('click', function () {
		var mobileWidthApp = $('body').outerWidth();
		if(mobileWidthApp <= 560) {
			$(this).closest('body').find('.popup-chat-responsive').removeClass('open-chat');
		}

        $(this).toggleClass('active');
        $(this).closest($sidebar).toggleClass('open');
        return false;
    });

	// Закрытие при нажатии на "ESC"
    $window.keydown(function (eventObject) {
        if (eventObject.which == 27 && $sidebar.is(':visible')) {
            $sidebar.removeClass('open');
        }
    });

    // Закрытие при нажатии в иное поле
    $document.on('click', function (event) {
        if (!$(event.target).closest($sidebar).length && $sidebar.is(':visible')) {
            $sidebar.removeClass('open');
        }
    });


    var $popup = $('.window-popup');

    $(".js-open-popup").on('click', function (event) {
        var target_popup = $(this).data('popup-target');
        var current_popup = $popup.filter(target_popup);
        var offset = $(this).offset();
        current_popup.addClass('open');
        current_popup.css('top', (offset.top - (current_popup.innerHeight() / 2)));
        $body.addClass('overlay-enable');
        return false;
    });

    // Закрытие при нажатии на "ESC"
    $window.keydown(function (eventObject) {
        if (eventObject.which == 27) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.popup-chat-responsive').removeClass('open-chat');
			$('.profile-settings-responsive').removeClass('open');
			$('.header-menu').removeClass('open');
			$('.js-sidebar-open').removeClass('active');
        }
    });

    // Закрытие при нажатии в иное поле
    $document.on('click', function (event) {
        if (!$(event.target).closest($popup).length) {
            $popup.removeClass('open');
            $body.removeClass('overlay-enable');
			$('.profile-menu').removeClass('expanded-menu');
			$('.header-menu').removeClass('open');
			$('.profile-settings-responsive').removeClass('open');
        }
    });

    $('[data-toggle=tab]').on('click', function(){
		/*$body.toggleClass('body--fixed');*/
        if ($(this).hasClass('active') && $(this).closest('ul').hasClass('mobile-app-tabs')){
            $($(this).attr("href")).toggleClass('active');
            $(this).removeClass('active');
            return false;
        }
    });


    // Закрытие при нажатии на Х
    $(".js-close-popup").on('click', function () {
        $(this).closest($popup).removeClass('open');
        $body.removeClass('overlay-enable');
        return false
    });

	$(".profile-settings-open").on('click', function () {
		$('.profile-settings-responsive').toggleClass('open');
		return false
	});

	$(".js-expanded-menu").on('click', function () {
		$('.header-menu').toggleClass('expanded-menu');
		return false
	});

	$(".js-chat-open").on('click', function () {
		$('.popup-chat-responsive').toggleClass('open-chat');
		return false
	});
    $(".js-chat-close").on('click', function () {
        $('.popup-chat-responsive').removeClass('open-chat');
        return false
    });

	$(".js-open-responsive-menu").on('click', function () {
		$('.header-menu').toggleClass('open');
		return false
	});

	$(".js-close-responsive-menu").on('click', function () {
		$('.header-menu').removeClass('open');
		return false
	});




	CRUMINA.perfectScrollbarInit = function () {
		var $chatContainer = $('.popup-chat .mCustomScrollbar');
		var $containers = $('.mCustomScrollbar');

		$containers.perfectScrollbar({wheelPropagation:false});

		if(!$chatContainer.length){
			return;
		}

		$chatContainer.scrollTop( $chatContainer.prop( "scrollHeight" ) );
		$chatContainer.perfectScrollbar('update');
	};



	$document.ready(function () {



		CRUMINA.perfectScrollbarInit();

	// муз проигрыватель
        if (typeof $.fn.mediaelementplayer !== 'undefined'){
            $('#mediaplayer').mediaelementplayer({
                "features": ['prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'current', 'progress', 'duration', 'volume']
            });
        }

	});
})(jQuery);

// const el = document.querySelector(".travel");

// el.addEventListener("mousemove", (e) => {
//   el.style.backgroundPositionX = -e.offsetX + "px";
//   el.style.backgroundPositionY = -e.offsetY + "px";
// });
