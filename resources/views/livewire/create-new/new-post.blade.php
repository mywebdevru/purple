<div class="ui-block" style="display:none" x-data x-show="$wire.create == 'post'">
    @if ($create == 'post')
    <article  class="hentry post" data-id="{{ $post['id'] }}">
        <form wire:submit.prevent="savePost">
            <div class="form-group" wire:ignore>
                <label for="post{{ $post->id }}">Ваш пост увидят и прочтут!</label>
            <textarea id="post{{ $post->id }}" class="form-control" name="text">{!! $text !!}</textarea>
            </div>
            <button type="submit" class="btn btn-success" wire.loading.attr="disabled">
                Сохранить
            </button>
        </form>
    </article>
    <script>
        let post_id = {{ $post->id }}
        const editor = $(`#post${post_id}`),
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
                        @this.upload('photo', files[0], (image) => {
                            @this.savePhoto()
                            @this.on('photoSaved', (image)=>{
                                editor.summernote('insertImage', '/' + image, function ($image) {
                                    $image.css('width', '100%');
                                });
                            })
                        }, () => {
                            swal("Беда!", "Грузите что то большое или неправильное" , "error");
                        })
                    },
                    onMediaDelete: function ($target) {
                        const url = $target[0].src,
                            cut = `${document.location.origin}/`,
                            image = url.replace(cut, '');
                        @this.deletePhoto(image);
                    },
                    onChange: function(contents, $editable) {
                        @this.set('text',contents);
                    }
                }
            };
        editor.summernote(config);
    </script>
    @endif
</div>
