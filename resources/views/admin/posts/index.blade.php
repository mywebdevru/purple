@php
    /**
     * @var $posts \App\Post []
     */
@endphp

@extends('layouts.admin')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Посты
        </div>
        <div class="card-body">
            @if($posts->count())
                <table class="table user-list-table">
                    <thead>
                    <tr>
                        <th>Цитата</th>
                        <th>Автор</th>
                        <th>Создан</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {!! Str::words($post->text, 3, '...') !!}
                            </td>
                            <td>
                                {{ $post->postable->name }}
                            </td>
                            <td>
                                {{ $post->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route('admin.post.show', $post->id) }}"
                                   class="btn btn-success btn-sm"
                                   role="button">
                                    <i class="far fa-eye"></i>
                                </a>
                                @can('update', $post)
                                <a href="{{ route('admin.post.edit', $post->id)}}"
                                    class="btn btn-info btn-sm"
                                    role="button"><i class="far fa-edit"></i>
                                 </a>
                                @endcan
                                <form class="d-inline-block" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="btn btn-danger btn-sm"
                                        type="submit"
                                        role="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            @else
                <h6 class="text-center">Посты не найдены</h6>
            @endif
        </div>
    </div>
@endsection

