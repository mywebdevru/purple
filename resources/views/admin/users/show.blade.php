@php
/**
 * @var $user \App\User
 * @var $friends \App\Friend []
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
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Collapsible Group Item #1
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
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
                                    <form class="d-inline-block" action="{{ route('admin.friend.destroy', $friend->id) }}" method="POST">
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
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
@section('css')
@endsection

