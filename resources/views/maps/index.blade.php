@extends('layouts.app')
@section('content')
    <h1 class="container">Карты</h1>
    <div class="container">
        <hr>
        <a href="{{route('map.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Создать новую карту</a>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($maps as $map)
                <tr>
                    <td><a href="{{route('map.show', $map)}}">{{$map->title}}</a></td>
                    <td>{{$map->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('map.destroy', $map)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-primary" href="{{route('map.edit', $map)}}"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$maps->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
