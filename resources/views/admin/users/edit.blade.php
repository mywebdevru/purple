<?php
/**
 * @var $user \App\User
 */
?>

@extends('layouts.admin')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Редактирование профиля пользователя
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('admin.users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" name="surname" id="surname" class="form-control" value="{{ $user->surname }}">
                </div>
            </form>
        </div>
    </div>
@endsection
