@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Платежные агрегаторы</h2>
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
                        @foreach($agregators as $item)
                            <tr>
                                <td>{{$item['agregator_id']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/agregators/edit?id={{$item['agregator_id']}}">Редактировать</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/agregators/create">Добавить</a>
            </footer>
        </section>
    </div>
@endsection