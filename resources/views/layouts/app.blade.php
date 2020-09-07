<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OffRoad Paradise') }}</title>


	<!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.css" rel="stylesheet">

    @yield('css')
</head>

<body class="page-has-left-panels page-has-right-panels">
<!-- Header -->

<header class="header" id="site-header">

    <a href="{{ route('welcome') }}" class="logo head-logo">
        <div class="img-wrap head-img-wrap">
            <img src="{{ asset('img/4x4_white_small.png') }}" alt="offroad">
        </div>
        <div class="title-block">
            <h6 class="logo-title brand-name-small">Offroad Paradise</h6>
        </div>
    </a>

	<!-- <div class="page-title">
		<h6 class="brand-name-small">OffRoad Paradise</h6>
	</div> -->

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Поиск друзей или информации . . . " type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
				</button>
			</div>
		</form>

        <!-- <a href="#" class="link-find-friend">Поиск друзей</a> -->
        <div class="control-block">
            @auth
                @component('user.components.header.control_block_item',['count' => count(auth()->user()->requestedFriendships)])
                    @slot('icon')
                        <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                        <div class="label-avatar bg-blue">{{ count(auth()->user()->requestedFriendships) }}</div>
                    @endslot
                    @slot('title')
                        Они хотят дружить
                    @endslot
                    @slot('notification')
                        @each('user.components.header.friendship_request', auth()->user()->requestedFriendships, 'request')
                    @endslot
                    @slot('button')
                        <a class="view-all bg-blue" href="#" onclick="event.preventDefault(); document.getElementById('accept-all-friends').submit();">      Добавить всех
                        </a>
                        <form id="accept-all-friends" action="{{ route('user.friends.store') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="requested_friendship" value="{{ auth()->user()->requestedFriendships }}">
                        </form>
                    @endslot
                @endcomponent
                @component('user.components.header.alert_chat_message') @endcomponent
                @component('user.components.header.alert_activity') @endcomponent
                @component('user.components.header.page_owner', ['full_name' => auth()->user()->full_name, 'creed' => auth()->user()->creed, 'avatar' => auth()->user()->avatar, 'id' => auth()->user()->id])
                @endcomponent
            @else
                    <div class="nav-item text-light">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </div>
                    @endif
            @endauth
        </div>
	</div>
</header>
<!-- ... окончание Header -->
@component('user.components.header.mobile.mobile_header')@endcomponent
@auth
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar', ['friends' => auth()->user()->friends])@endcomponent
@endauth
<div class="header-spacer"></div>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.js"></script>
@auth
<script>
    function likeIt(item)
    {
        let data =item.data()
        if(item.hasClass('can_like')){
            item.toggleClass('can_like')
            let route ='../like';
            if(item.hasClass('like_it')){
                route = `${route}/${data.id}`
                item.children('form').append('<input type="hidden" name="_method" value="DELETE">')
            }

            $.ajax({
                type: "POST",
                url: route,
                data: item.children('form').serialize(),
                dataType: "JSON",
                success: function (response) {
                    if(!!response['error']){
                        console.log(response['error'])
                    }
                    count = response['likes'].length
                    if (data.model != 'Comment'){
                        item.parents('.post-additional-info').find('.friends-harmonic').html('')
                        item.parents('.post-additional-info').find('.names-people-likes').html('')
                        renderLikedUsers(response, item, count)
                    }
                    if(!!response['like_id']){
                        item.toggleClass('like_it')
                            .data('id', response['like_id'])
                            .children('span').text(count)
                    }
                    if(!!response['delete']){
                        item.children('form').find('input[name="_method"]').detach()
                        item.toggleClass('like_it')
                            .data('id', 0)
                            .children('span').text(count)
                    }
                    item.toggleClass('can_like')
                }
            });
        }
    }
    function renderLikedUsers(response, item, count)
    {
        if(count > 2) {
            likes = response['likes'].slice(-2)
        } else {
            likes = response['likes']
        }
        likes.forEach(like => {
            item.parents('.post-additional-info').find('.friends-harmonic').append(`<li><a href="{{ URL::to('/') }}/user/${like['authorable']['id']}">
                <img src="{{ URL::to('/') }}/${like['authorable']['avatar']}" alt="автор">
            </a></li>`)
            item.parents('.post-additional-info').find('.names-people-likes').append(`<a href="{{ URL::to('/') }}/user/${like['authorable']['id']}">${like['authorable']['name']} </a>`)
        });
        if (count > 2) {
            item.parents('.post-additional-info').find('.names-people-likes').append(` и еще <br>${count - 2} человк(а)`)
        }
    }

    function createPost()
    {
        let post = $('.new_post')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log(post)
        $.ajax({
            type: "post",
            url: `{{ URL::to('/') }}/post`,
            data: post.find('form').serialize(),
            dataType: "JSON",
            success: function (response) {
                console.log(response)
                if(!!response['id']){
                    editPost(0, post, response['id'])
                    post.parent().slideDown(300)
                }
            }
        })
    }
    function editPost(item, post = 0, id = 0)
    {
        post ? postBody = post.find('.post_body') : postBody = item.parents('.hentry').find('.post_body')
        console.log(postBody)
        id ? id = id : id = item.data('id')
        console.log(id)
        if(postBody.hasClass('can_edit')){
            postBody.toggleClass('can_edit')
                .html(`<form action="" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="postable_type" value="App\\Models\\User">
                        <input type="hidden" name="postable_id" value='{{ auth()->user()->id }}'>
                        <input type="hidden" name="post_id" value="${id}">
                        <div class="form-group">
                            <label for="text">Текст</label>
                            <textarea id="text"
                                    class="form-control"
                                    name="text">${postBody.html()}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">
                            Сохранить
                        </button>
                    </form>`)
            startSummernote(id)
            !!post ? url = '{{ URL::to('/') }}/post' : url = `{{ URL::to('/') }}/post/${id}`
            !!post ? method = 'post' : method = 'patch'
            postBody.children('form').submit(function (e) {
                e.preventDefault()
                $.ajax({
                    type: method,
                    url: url,
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response)
                        if(!!response['text']){
                            postBody.html(response['text'])
                                .toggleClass('can_edit')
                                .prev().find('.more-dropdown').show()
                        } else {
                            post.parent().slideUp(300)
                                .after(response)
                            postBody.html('')
                                    .toggleClass('can_edit')
                        }
                    }
                })
            })
        }
    }

    function deletePost(item)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let post = item.parents('.ui-block')
        console.log(post)
        $.ajax({
            type: "delete",
            url: `{{ URL::to('/') }}/post/${item.data('id')}`,
            data: '',
            dataType: "JSON",
            success: function (response) {
                if(!!response['deleted']){
                    post.slideUp(300)
                }
            }
        })
    }

    function startSummernote(post_id)
    {
        var post_id = post_id
        const editor = $('#text'),
            config = {
                lang: 'ru-RU',
                shortcuts: false,
                airMode: false,
                focus: true,
                disableDragAndDrop: false,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                ],
                callbacks: {
                    onImageUpload: function (files) {
                        uploadFile(files);
                    },

                    onMediaDelete: function ($target) {
                        const url = $target[0].src,
                            cut = "{{ URL::to('/') }}" + "/",
                            image = url.replace(cut, '');
                        deleteFile(image);
                    }
                }
            };
        editor.summernote(config);
        async function uploadFile(files) {
            const data = new FormData();
            data.append('post', post_id);
            for (let i = 0; i < files.length; i++) {
                data.append("files[]", files[i]);
            }
            try {
                const images = (await axios({
                    data,
                    method: 'post',
                    url: "{{ route('summernote.upload') }}",
                })).data;
                console.log(images);
                for (let i = 0; i < images.length; i++) {
                    editor.summernote('insertImage', '/' + images[i], function ($image) {
                        $image.css('width', '100%');
                    });
                }
            } catch (e) {
                console.log(e);
            }
        }
        async function deleteFile(file) {
            console.log(file);
            const data = new FormData();
            data.append('file', file);
            try {
                await axios({
                    data,
                    method: 'post',
                    url: "{{ route('summernote.delete') }}",
                });
            } catch (e) {
                console.log(e);
            }
        }
    }

    function showComments(feed)
    {
        let commentsList = feed.find('.comments-list')
        let button = feed.find('.more-comments')
        let commentForm = feed.find('.write_comment')
        commentsList.slideToggle()
        if(button.children('span').text() =='+'){
            button.html('Скрыть комментарии <span>-</span>')
            writeComment(feed)
        } else {
            button.html('Показать комментарии <span>+</span>')
            commentForm.slideUp()
            commentForm.unbind('submit')
            commentForm.children('button').not('[type]').unbind('click')
        }
    }

    function writeComment(feed)
    {
        let commentCount = 0
        let commentForm = feed.find('.write_comment')
        commentForm.slideToggle()
        commentForm.children('button').not('[type]').click(function (e){
            e.preventDefault()
            commentForm.find('textarea').val('')
            showComments(feed)
        })
        commentForm.submit(function (e) {
            e.preventDefault()
            commentCount = +feed.find('.comments_count').text()
            $(this).children('button').prop('disabled', true)
            $.ajax({
                type: "POST",
                url: `{{ URL::to('/') }}/comment`,
                data: $(this).serialize(),
                dataType: "JSON",
                success: function (response) {
                    if(!!response){
                        console.log(response)
                        renderComment(response, feed)
                        commentForm.find('textarea').val('')
                        commentForm.children('button').removeAttr("disabled")
                        feed.find('.comments_count').text(++commentCount)
                    }
                }
            });
        })
    }

    function renderComment(response, feed)
    {
        feed.find('.comments-list').append(response['comment'])
    }

    function editComment(href)
    {
        let commentId = href.data('id')
        let comment = href.parents('.comment-item').find('p')
        if(comment.hasClass('can_edit')){
            comment.toggleClass('can_edit')
            commentText = comment.text()
            comment.html(`<form class="comment-form inline-items" method="POST" action=""
                            <div class="post__author author vcard inline-items">
                                <div class="form-group with-icon-right">
                                    <textarea class="form-control" placeholder="" name="text">${commentText}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md-2 btn-primary">Сохранить</button>
                            <button class="cancel btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
                        </form>`)
            comment.find('.cancel').click(function(e){
                e.preventDefault()
                comment.html(commentText)
                comment.toggleClass('can_edit')
                href.parents('.more-dropdown').show()
            })
            comment.children('form').submit(function(e) {
                e.preventDefault()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: "patch",
                    url: `{{ URL::to('/') }}/comment/${commentId}`,
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        if(!!response['text']){
                            comment.html(response['text'])
                            comment.toggleClass('can_edit')
                            href.parents('.more-dropdown').show()
                        }
                    }
                })
            })
        }
    }

    function deleteComment(href)
    {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        let data = href.data()
        let comment = href.parents('.comment-item')
        let commentCount = +href.parents('.hentry').find('.comments_count').text()
        $.ajax({
            type: "delete",
            url: `{{ URL::to('/') }}/comment/${data.id}`,
            data: '',
            dataType: "JSON",
            success: function (response) {
                if(!!response['deleted']){
                    comment.slideUp(300)
                    href.parents('.hentry').find('.comments_count').text(--commentCount)
                }
            }
        });
    }

    $(document).ready(function() {
        console.log($('#newsfeed-items-grid'))
        $('#newsfeed-items-grid').on('click', '.dropdown_menu_item', function(e){
            e.preventDefault()
            console.log($(this).data())
            if($(this).hasClass('edit_comment')){
                editComment($(this))
                $(this).parents('.more-dropdown').fadeOut(200)

            }
            if($(this).hasClass('delete_comment')){
                deleteComment($(this))
                console.log($(this).parents('.hentry').find('.comments_count'))
                $(this).parents('.more-dropdown').fadeOut(200)
            }
            if($(this).hasClass('edit_post')){
                editPost($(this))
               $(this).parents('.more-dropdown').fadeOut(200)
            }
            if($(this).hasClass('delete_post')){
                deletePost($(this))
               $(this).parents('.more-dropdown').fadeOut(200)
            }
        })
        .on('click', '.show_comments', function(e){
            e.preventDefault()
            showComments($(this).parents('.hentry'))
        })
        .on('click', '.likes', function(e){
            e.preventDefault()
            console.log($(this))
            likeIt($(this))
        })

        $('.create_post').click( function(e){
            e.preventDefault()
            createPost()
        })
    })

</script>
@endauth
</body>
</html>
