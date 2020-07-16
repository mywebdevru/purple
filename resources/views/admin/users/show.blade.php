@php
/**
 * @var $user \App\User
 * @var $friends \App\Friends []
 */
@endphp

@extends('layouts.admin')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Информация о пользователе {{ $user->full_name }}
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">
                        Email:
                    </th>
                    <td>
                        {{ $user->email }} ({{ $user->email_verified_at ? 'подтвержден' : 'не подтвержден' }})
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Создан / обновлен:
                    </th>
                    <td>
                        {{ $user->created_at->diffForHumans() }} / {{ $user->updated_at->diffForHumans() }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">Пол</th>
                    <td>{{ $user->gender }}</td>
                </tr>
                <tr>
                    <th scope="row">Дата рождения</th>
                    <td>
                        {{ $user->birth_date ? $user->birth_date->isoFormat('D MMM YYYY')  : 'Не указана' }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">Откуда</th>
                    <td>{{ $user->location }}</td>
                </tr>
                <tr>
                    <th scope="row">Девиз</th>
                    <td>{{ $user->creed }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Друзья</th>
                        <th scope="col">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($friends as $friend)
                        <tr>
                            <td>
                                {{ $friend->user->full_name }}
                            </td>
                            <td>
                                <form class="d-inline-block" action="{{ route('friend.delete', $friend->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="btn btn-danger btn-sm"
                                        type="submit"
                                        role="button">
                                        Удаление
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        У пользователя пока нет друзей
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@section('css')
@endsection

