function createPost(post)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: `${document.location.origin}/post`,
        data: post.find('form').serialize(),
        dataType: "JSON",
        success: function (response) {
            if(!!response['id']){
                post.data('id', response['id'])
                editPost(post, 1)
                post.parent().slideDown(300)
            }
        }
    })
}
function editPost(post, newPost = 0)
{
    let postBody = post.find('.post_body')
    let id = post.data('id')
    if(postBody.hasClass('can_edit')){
        postBody.toggleClass('can_edit')
            .html(`<form action="" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="postable_type" value="App\\Models\\User">
                    <input type="hidden" name="postable_id" value="${post.data('author')}">
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
        !!newPost ? url = `${document.location.origin}/post` : url = `${document.location.origin}/post/${id}`
        !!newPost ? method = 'post' : method = 'patch'
        postBody.children('form').submit(function (e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: method,
                url: url,
                data: $(this).serialize(),
                dataType: "JSON",
                success: function (response) {
                    if(!!response['text']){
                        postBody.html(response['text'])
                            .toggleClass('can_edit')
                            .prev().find('.more-dropdown').show()
                    } else {
                        post.data('id', 0)
                            .parent().slideUp(300)
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
    let post = item.parent('.ui-block')
    $.ajax({
        type: "delete",
        url: `${document.location.origin}/post/${item.data('id')}`,
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
                        cut = `${document.location.origin}/`,
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
                url: `${document.location.origin}/summernote/upload`,
            })).data;
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
        const data = new FormData();
        data.append('file', file);
        try {
            await axios({
                data,
                method: 'post',
                url: `${document.location.origin}/summernote/delete`,
            });
        } catch (e) {
            console.log(e);
        }
    }
}
