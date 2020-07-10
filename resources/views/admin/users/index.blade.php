<?php
/**
 * @var $users \App\User []
 */
?>


@extends('layouts.admin')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Пользователи
        </div>
        <div class="card-body">
            @if($users->count())
                <table class="table user-list-table">
                    <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                @if(empty($user->avatar))
                                    <img src="{{ Gravatar::src($user->email) }}" alt="" width="40" style="border-radius: 50%">
                                @else
                                    <img src="{{ asset('storage/' . $user->avatar) }}" width="40" alt="">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id)}}"
                                   class="btn btn-info btn-sm"
                                   role="button">Редактирование
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <h6 class="text-center">Пользователи не найдены</h6>
            @endif
        </div>
    </div>

@endsection
