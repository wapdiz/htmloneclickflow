@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Последние выплаты</h2>
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-2" >
                        <p>Валюта</p>
                        <select id="filter_currency" class="form-control mb-md">
                            <option value="all">Любая</option>
                            <option value="1" >Российский рубль</option>
                            <option value="2">Американский доллар</option>
                            <option value="3">Евро</option>
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Статус</p>
                        <select id="filter_status" class="form-control mb-md">
                            <option value="all">Любой</option>
                            <option value="decline">Отклонено</option>
                            <option value="success">Успешно</option>
                            <option value="process" >В обработке</option>
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Тип платежа</p>
                        <select id="filter_type" class="form-control mb-md">
                            <option value="all" >Любой</option>
                            <option value="regular">Регулярная выплата</option>
                            <option value="request">По запросу</option>
                            <option value="credit">Кредитование</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <p>Дата</p>
                        <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</span>
                            <input type="text" data-plugin-datepicker="" class="form-control" id="filter_datepicker">
                        </div>
                    </div>
                    <div class="col-sm-2" style="padding-top: 26px;">
                        <button id="filter_submit" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Применить</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="main_checkbox"/>&nbsp;#</th>
                            <th>Когда</th>
                            <th>Имя пользователя</th>
                            <th>E-mail</th>
                            <th>Сумма</th>
                            <th>Валюта</th>
                            <th>Тип</th>
                            <th>Статус</th>
                            <th>Баланс пользователя</th>
                            <th>
                                Добавлен в лист<br>
                                на выплату
                            </th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody id="content_container">
                        @foreach($payments as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="add_in_list_checkbox" number="{{$item['id']}}" @if($item['status'] =='process') process="1" @endif />&nbsp; {{$item['id']}}
                                </td>
                                <td>{{$item['datetime']}}</td>
                                <td><a href="/admin/users/edit?id={{$item['user_id']}}">{{$item['name']}}</a></td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['amount']/100}}</td>
                                <td>
                                    @if($item['currency'] == 1)
                                        Рубли
                                    @endif
                                    @if($item['currency'] == 2)
                                        USD
                                    @endif
                                    @if($item['currency'] == 3)
                                        EUR
                                    @endif
                                </td>
                                <td>
                                    @if($item['type'] == 'request')
                                        По запросу
                                    @endif
                                    @if($item['type'] == 'regular')
                                        Регулярная
                                    @endif
                                    @if($item['type'] == 'credit')
                                        Кредитование
                                    @endif
                                </td>
                                <td>
                                    @if($item['status'] == 'process')
                                        <p class="text-warning item_status"  number="{{$item['id']}}">
                                            В обработке
                                        </p>
                                    @endif
                                    @if($item['status'] == 'decline' )
                                        <p class="text-danger item_status" number="{{$item['id']}}">
                                            Отклонен
                                        </p>
                                    @endif
                                    @if($item['status'] == 'success')
                                        <p class="text-success item_status" number="{{$item['id']}}" >
                                            Успешно
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    RUB: {{$item['balance_rub']/100}} USD: {{$item['balance_usd']/100}} EUR: {{$item['balance_eur']/100}}
                                </td>
                                <td id="in_list_{{$item['id']}}">
                                    @if($item['in_list'] == 1) Да @endif
                                    @if($item['in_list'] == 0) Нет @endif
                                </td>
                                <td>
                                    <a href="#">Посмотреть статистику</a><br>
                                    @if($item['in_list'] == 0 && $item['status'] == 'process') <a href="#" class="decline_payment" number="{{$item['id']}}" >Отклонить</a><br>@endif
{{--                                    <a href="/admin/users/edit?id={{$item['user_id']}}">Открыть профиль пользователя</a><br>--}}
                                    @if($item['in_list'] == 0 && $item['status'] == 'process') <a href="#" class="add_in_payment_list" number="{{$item['id']}}" >Добавить в очередь на выплату</a> @endif

                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a href="#" id="add_all_in_payment_list">Добавить выделенные в очередь на выплату</a>
            </footer>
        </section>
    </div>
@endsection