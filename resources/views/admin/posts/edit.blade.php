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
            $('#text').summernote();
        });
    </script>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

