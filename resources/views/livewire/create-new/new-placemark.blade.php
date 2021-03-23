<div class="ui-block" style="display: none" x-data="{ progress : 0, isUploading : false, create : @entangle('create') }" x-show.transition.duration.400ms="create"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    @if ($create)
        <article class="hentry post has-post-thumbnail shared-photo">
            <div class="post-thumb">
                <div class="new-image-wrapper">
                    @if ($errors->has('photo'))
                        <div  class="message">
                            @error('photo') <div class="w-100 text-center text-danger">{{ $message }}</div> @enderror
                        </div>
                    @elseif ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" alt="photo">
                    @else
                        <div class="message">
                            <div>Ваше фото полюбят тысячи рук <br>Ему лайки поставят сотни глаз </div>
                        </div>
                    @endif
                    <div class="loading-img-wrapper" x-show="isUploading">
                        <div x-text="progress + '%'"></div>
                        <div class="skills-item-meter" >
                            <span class="skills-item-meter-active bg-primary skills-animate" :style="'opacity: 1; width: ' + progress + '%'"></span>
                        </div>
                    </div>
                </div>
                <div>
                    <button  class="btn btn-file  btn-md-2 btn-primary comment-form__button" wire:loading.attr="disabled">
                        Выберите фото
                        <input type="file" wire:model="photo" name="photo"  wire:loading.attr="disabled" multiple>
                    </button>
                    @if ($photo)
                        <div class="form-group" wire:ignore>
                            <label for="description">Добавьте описание</label>
                            <div id="description" class="form-control" name="description">{!! $description !!}</div>
                        </div>
                        <button type="submit" wire:click.prevent="saveImage" class="btn btn-file btn-md-2 btn-success comment-form__button"  wire:loading.attr="disabled">Сохранить</button>
                        <script>
                            const editor = $('#description'),
                                config = {
                                    lang: 'ru-RU',
                                    shortcuts: false,
                                    airMode: false,
                                    focus: false,
                                    disableDragAndDrop: false,
                                    toolbar: [
                                        ['style', ['bold', 'italic', 'underline', 'strikethrough']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                    ],
                                    callbacks: {
                                        onChange: function(contents, $editable) {
                                            @this.set('description',contents);
                                        }
                                    }
                                };
                            editor.summernote(config);
                        </script>
                    @endif
                    <button x-on.click.prevent wire:click.prevent="toggleCreate" class="btn btn-file btn-md-2 btn-border-think c-grey btn-transparent custom-color" wire:loading.attr="disabled">Отмена</button>
                </div>
            </div>
        </article>
    @endif
</div>
