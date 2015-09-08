@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Лендинги</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Вес</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($landings as $landing)
                            <tr>
                                <td>{{$landing['id']}}</td>
                                <td>{{$landing['name']}}</td>
                                <td>{{$landing['weight']}}</td>
                                <td>
                                    <a href="/admin/landings/group/delete?id={{$landing['id']}}">Удалить</a><br>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a href="/admin/landings/group/create">Добавить</a>
            </footer>
        </section>
    </div>
@endsection