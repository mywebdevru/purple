@php
/**
 * @var $users \App\User []
 */
@endphp


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
                                <a href="{{ route('admin.user.show', $user->id) }}"
                                   class="btn btn-success btn-sm"
                                   role="button">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.user.edit', $user->id)}}"
                                   class="btn btn-info btn-sm"
                                   role="button"><i class="far fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
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
                {{ $users->links() }}
            @else
                <h6 class="text-center">Пользователи не найдены</h6>
            @endif
        </div>
    </div>

@endsection
