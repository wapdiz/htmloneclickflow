@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Операционные системы</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($os as $item)
                                    <tr>
                                        <td>{{$item['os_id']}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>actions (later)</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Браузер</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($browsers as $browser)
                                    <tr>
                                        <td>{{$browser['browser_id']}}</td>
                                        <td>{{$browser['name']}}</td>
                                        <td>actions (later)</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Производитель</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{$vendor['vendor_id']}}</td>
                                        <td>{{$vendor['name']}}</td>
                                        <td>actions (later)</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <a href="/admin/route_settings/new">Добавить еще</a>
    </div>
@endsection