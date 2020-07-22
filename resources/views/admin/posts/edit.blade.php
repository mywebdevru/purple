@php
    /**
     * @var $post \App\Post
     */
@endphp

@extends('layouts.admin')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Редактирование поста
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea id="text"
                              class="form-control @error('name') is-invalid @enderror"
                              name="text">{!! $errors->any() ? old('text') : $post->text !!}
                    </textarea>
                    @error('text')
                        @foreach ($errors->get('text') as $error)
                            <div class="invalid-feedback">{{ $error }}</div>
                        @endforeach
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            const config = {
                lang: 'ru-RU',
                shortcuts: false,
                airMode: false,
                focus: false,
                disableDragAndDrop: false,
                callbacks: {
                    onImageUpload: function (files) {
                        uploadFile(files);
                    },

                    onMediaDelete: function ($target, editor, $editable) {
                        console.log($target);
                        console.log(editor);
                        console.log($editable);
                    }
                }
            }
            $('#text').summernote(config);

            function uploadFile(files) {
                const data = new FormData();

                for (let i = 0; i < files.length; i++) {
                    data.append("files[]", files[i]);
                    data.append('username', 'Chris');
                }
                console.log(data);

                $.ajax({
                    data: data,
                    type: "POST",
                    url: "/ajax/uploader/upload",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    contentType: false,
                    processData: false,
                    success: function (images) {
                        //console.log(images);

                        // If not errors.
                        if (typeof images['error'] == 'undefined') {

                            // Get all images and insert to editor.
                            for (var i = 0; i < images['url'].length; i++) {

                                editor.summernote('insertImage', images['url'][i], function ($image) {
                                    //$image.css('width', $image.width() / 3);
                                    //$image.attr('data-filename', 'retriever')
                                });
                            }
                        }
                        else {
                            // Get user's browser language.
                            var userLang = navigator.language || navigator.userLanguage;

                            if (userLang == 'ru-RU') {
                                var error = 'Ошибка, не могу загрузить файл! Пожалуйста, проверьте файл или ссылку. ' +
                                    'Изображение должно быть не менее 500px!';
                            }
                            else {
                                var error = 'Error, can\'t upload file! Please check file or URL. Image should be more then 500px!';
                            }

                            alert(error);
                        }
                    }
                });
            }
        });
    </script>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

