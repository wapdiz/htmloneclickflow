@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Пользователи</h2>
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-2" >
                        <p>Статус</p>
                        <select id="user_status" name="user_status" class="form-control mb-md">
                            <option value="all">Любой</option>
                            <option value="active" >Активен</option>
                            <option value="locked">Заблокирован</option>
                            <option value="banned">Забанен</option>
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
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_container">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['id']}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/users/edit?id={{$user['id']}}">Редактировать</a>
                                    <form action="/admin/users/login_like" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" value="{{$user['id']}}">
                                        <button class="btn btn-warning">Залогинится</button>
                                    </form>
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