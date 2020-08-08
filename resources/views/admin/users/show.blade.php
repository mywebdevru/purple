@php
/**
 * @var $user \App\User
 * @var $friends \App\Friend []
 * @var $vehicles \App\UserVehicle []
 */
@endphp

@extends('layouts.admin')

@section('content')
    <div class="card card-default mb-3">
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
                        Друзья
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Друг</th>
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
                        Запросы пользователя на дружбу
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($userRequests as $request)
                            <tr>
                                <td>
                                    {{ $request->friend->full_name }}
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.request.destroy', $request->id) }}" method="POST">
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
                            Пользователь не предлагал дружбу
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Запросы на дружбу, поступившие пользователю
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($friendshipRequests as $request)
                            <tr>
                                <td>
                                    {{ $request->user->full_name }}
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.request.destroy', $request->id) }}" method="POST">
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
                            Пользователь не предлагал дружбу
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Транспортные средства
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Тип</th>
                            <th scope="col">Марка</th>
                            <th scope="col">Модель</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($vehicles as $vehicle)
                            <tr>
                                <td>
                                    {{ $vehicle->type }}
                                </td>
                                <td>
                                    {{ $vehicle->brand }}
                                </td>
                                <td>
                                    {{ $vehicle->model }}
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('admin.vehicle.destroy', $vehicle->id) }}" method="POST">
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
                            У пользователя пока нет транспортных средств
                        @endforelse
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addVehicleModal">
                        Добавить транспортное средство
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление транспортного средства</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type">Тип транспортного средства</label>
                            <select class="form-control" id="type" name="type">
                                <option disabled selected>Выберите тип транспортного средства</option>
                                <option value="1">Легковой</option>
                                <option value="2">Грузовой или автобус</option>
                                <option value="3">Коммерческий</option>
                                <option value="4">Мотоцикл/квадрацикл</option>
                            </select>
                        </div>
                        <div class="form-group" id="brands-group" style="display: none">
                            <label for="brand">Производитель</label>
                            <input list="brand-list" id="brand" name="brand" class="form-control" placeholder="Начните вводить производителя...">
                            <datalist id="brand-list"></datalist>
                        </div>
                        <div class="form-group" id="models-group" style="display: none">
                            <label for="model">Модель</label>
                            <input list="model-list" id="model" name="model" class="form-control" placeholder="Начните вводить марку...">
                            <datalist id="model-list"></datalist>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#type').on('change', function () {
        const type = $(this).val();
        (async function getCategory() {
            try {
                const brands = (await axios.get('https://auto-db.mywebdev.ru/api/category/' + type)).data.data;
                console.log(brands);
                brands.forEach(function (brand) {
                    $("#brand-list").append('<option value="' + brand.name + '" data-brand="' + brand.id + '">');
                });
                $('#brands-group').fadeIn();
            } catch (e) {
                console.log(e);
            }
        })();
    });
    $('#brand').on('change', function () {
        const brand = $(this).val(),
            brandID = $(`#brand-list option[value=${brand}]`).data('brand');
        (async function getBrand() {
            try {
                const models = (await axios.get('https://auto-db.mywebdev.ru/api/manufacturer/' + brandID)).data.data;
                console.log(models);
                models.forEach(function (model) {
                    $("#model-list").append('<option value="' + model.name + '" data-brand="' + model.id + '">');
                });
                $('#models-group').fadeIn();
            } catch (e) {
                console.log(e);
            }
        })();
        console.log(brandID);
    });
});
</script>
@endsection
@section('css')
    <style>
        .btn-link:hover,
        .btn-link:active,
        .btn-link:focus {
            color: black;
            text-decoration: none;
        }
        .btn-link {
            color: black;
        }
    </style>
@endsection

