@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Проекты</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{$project['project_id']}}</td>
                                <td>{{$project['name']}}</td>
                                <td>
                                    <a href="/projects/view?id={{$project['project_id']}}">Просмотреть</a>
                                    <br>
                                    <a href="/projects/edit?id={{$project['project_id']}}">Редактировать</a>
                                    <br>
                                    <a href="/projects/delete?id={{$project['project_id']}}">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection