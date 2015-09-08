@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Кредитование</h2>
            </header>
            <div class="panel-body">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-sm-2">
                        <p>Статус</p>
                        <select id="credit_status_filter" name="status" class="form-control mb-md">
                            <option value="all">Любой</option>
                            <option value="request">Запрошен</option>
                            <option value="accept">Одобрен</option>
                            <option value="decline">Отклонен</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <p>Дата</p>
                        <input type="text" class="form-control" name="date" value="{{date('d.m.Y')}}" id="datepicker">
                    </div>
                    <div class="col-sm-2" style="padding-top: 26px;">
                        <button id="filter_submit" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Применить</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Число подписок</th>
                            <th>Статус</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody id="tbody_container">
                            {!! $render_table !!}
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
@endsection