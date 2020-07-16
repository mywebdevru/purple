<?php
/**
 * @var $user \App\User
 */
?>

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
                    <th scope="row"></th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@section('css')
@endsection

