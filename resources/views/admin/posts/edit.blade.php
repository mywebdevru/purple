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
        $(document).ready(function () {
            const editor = $('#text'),
                config = {
                    lang: 'ru-RU',
                    shortcuts: false,
                    airMode: false,
                    focus: false,
                    disableDragAndDrop: false,
                    callbacks: {
                        onImageUpload: function (files) {
                            uploadFile(files);
                        },

                        onMediaDelete: function ($target) {
                            const url = $target[0].src,
                                cut = "{{ URL::to('/') }}" + "/storage/",
                                image = url.replace(cut, '');
                            deleteFile(image);
                        }
                    }
                };
            editor.summernote(config);

            async function uploadFile(files) {
                const data = new FormData();

                for (let i = 0; i < files.length; i++) {
                    data.append("files[]", files[i]);
                }
                try {
                    const images = (await axios({
                        data,
                        method: 'post',
                        url: "{{ route('summernote.upload') }}",
                    })).data;
                    for (let i = 0; i < images.length; i++) {
                        editor.summernote('insertImage', '/storage/' + images[i], function ($image) {
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
        });
    </script>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

