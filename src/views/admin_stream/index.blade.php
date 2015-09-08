@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                Стримы
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-2" >
                        <p>Статус</p>
                        <select id="stream_status_select" name="stream_status_select" class="form-control mb-md">
                            <option value="all">Любой</option>
                            <option value="active">Активен</option>
                            <option value="off">Выключен</option>
                            <option value="refuse">Отклонен</option>
                            <option value="moderation">На модерации</option>
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Категория</p>
                        <select id="stream_category_select" name="stream_category_select" class="form-control mb-md">
                            <option value="all">Любая</option>
                            @foreach($categories as $item)
                                <option value="{{$item['category_id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Пользователь</p>
                        <select id="stream_user_select" name="stream_user_select" class="form-control mb-md">
                            <option value="all">Любой</option>
                            @foreach($users as $item)
                                <option value="{{$item['id']}}">{{$item['email']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-2" style="padding-top: 26px;">
                        <button id="filter_submit" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Применить</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название стрима</th>
                            <th>Пользователь</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody id="tbody_container">
                        @foreach($streams as $item)
                            <tr>
                                <td>{{$item['id_stream']}}</td>
                                <td>{{$item['stream_name']}}</td>
                                <td>
                                    <a href="/admin/users/edit?id={{$item['user_id']}}">{{$item['user_name']}}</a>
                                </td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/stream/view?id={{$item['id_stream']}}">Просмотр</a><br>
                                    @if($item['status'] == 'moderation')
                                        <a class="mb-xs mt-xs mr-xs btn btn-success accept-stream" number="{{$item['id_stream']}}" href="#">Принять</a>
                                        <a class="mb-xs mt-xs mr-xs btn btn-danger decline-stream" number="{{$item['id_stream']}}" href="#">Отклонить</a>
                                    @endif
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