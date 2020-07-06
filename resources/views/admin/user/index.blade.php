<?php
/**
 * @var $users \App\User []
 */
?>


@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="" class="btn btn-success">
            Создать пользователя
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Пользователи
        </div>
        <div class="card-body">
            @if($users->count())
                <table class="table">
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
                            <td></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td></td>
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
