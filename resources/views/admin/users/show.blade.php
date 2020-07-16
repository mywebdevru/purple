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
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@section('css')
@endsection

