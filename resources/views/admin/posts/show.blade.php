@php
/**
 *  @var $post \App\Post
 *  @var $postable \App\User | \App\Group | \App\Club
*/
@endphp

@extends('layouts.admin')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Информация о посте
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">
                        Автор
                    </th>
                    <td>
                        @if($postable instanceof \App\User)
                        {{ $postable->full_name }}
                        @else
                        {{ $postable->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Создан / обновлен:
                    </th>
                    <td>
                        {{ $post->created_at->diffForHumans() }} / {{ $post->updated_at->diffForHumans() }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Текст:
                    </th>
                    <td>
                        {{ $post->text }}
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="show-action-buttons">
                <a href="{{ route('admin.post.edit', $post->id)}}"
                   class="btn btn-info btn-sm"
                   role="button">
                    <i class="far fa-edit"></i> Редактировать
                </a>
                <form class="d-inline-block" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        class="btn btn-danger btn-sm"
                        type="submit"
                        role="button">
                        <i class="far fa-trash-alt"></i> Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@section('css')
@endsection
