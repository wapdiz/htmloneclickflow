@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Просмотр причин Trafficback</h2>
            </header>
            <div class="panel-body">
                <div class="row">
                    <p class="col-md-2">
                        @if($tb_log_status == true)
                            <button type="button" id="button_log_switch" class="mb-xs mt-xs mr-xs btn btn-success" enable="1">Логирование включено</button>
                        @elseif($tb_log_status == false)
                            <button type="button" id="button_log_switch" class="mb-xs mt-xs mr-xs btn btn-warning" enable="0">Логирование выключено</button>
                        @endif
                    </p>
                    <p class="col-md-2">
                        <button type="button" id="button_truncate_log" class="mb-xs mt-xs mr-xs btn btn-danger">Транкейт таблицы!</button>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-12" id="show_container">

                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive" col-md-12>
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Причина</th>
                                <th>IP</th>
                                <th>
                                    Параметры девайс детектора<br>
                                    и геолокации
                                </th>
                                <th>
                                    Входящие параметры
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['reason']}}</td>
                                    <td>{{$item['ip']}}</td>
                                    <td>
                                        <a href="#" class="show-dd-geo-params" number="{{$item['id']}}">Показать</a>
                                        <div class="dd-geo-params-{{$item['id']}}" style="display: none;">
                                            {{ var_dump($item['json_data'],true) }}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="show-request-params" number="{{$item['id']}}">Показать</a>
                                        <div class="request-params-{{$item['id']}}" style="display: none;">
                                            {{ var_dump($item['json_request_param'],true) }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="truncateSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="splitsSettingModalLabel">Транкейтнуть таблицу с логами??</h4>
                </div>
                <div id="truncateSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="/admin/analyze/tb_log_truncate" method="POST">
                        <input type="hidden" id="truncateToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="truncate_id_input" name="truncate_id"/>
                        <button type="button" class="btn btn-default" id="truncateSettingsClose">Закрыть</button>
                        <button type="submit" class="btn btn-primary" id="truncateSettingsAccept">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection