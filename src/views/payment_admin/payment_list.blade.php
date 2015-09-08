@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Формируемый список</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>ID Платежа</th>
                            <th>Имя пользователя</th>
                            <th>Email</th>
                            <th>Сумма</th>
                            <th>Валюта</th>
                            <th>Тип платежа</th>
                            <th>Дата</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lastItems as $item)
                            <tr>
                                <td>{{$item['payment_id']}}</td>
                                <td>{{$item['name']}}</td>
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
                                        Кредит
                                    @endif
                                </td>
                                <td>{{$item['datetime']}}</td>
                                <td><a href="#" class="delete_from_list" number="{{$item['payment_id']}}">Удалить из списка</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <form method="POST" action="/admin/payment_list/create" id="" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-primary">Сформировать</button>
                </form>
            </footer>
        </section>


        <section class="panel">
            <header class="panel-heading">
                <h2>Сформированные списки</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Действия</th>
                            <th>Идентификатор</th>
                            <th>Пользователь</th>
                            <th>Email</th>
                            <th>Сумма</th>
                            <th>Валюта</th>
                            <th>Тип платежа</th>
                            {{--<th>Дата запроса</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paymentLists as $item)
                            <tr>
                                <td>{{$item['date']}}</td>
                                <td>
                                    <a href="#" class="get_payment_list_info" hash="{{$item['hash']}}">Показать подробно</a><br>
                                    <a href="/files/payments/{{$item['hash']}}.csv">Скачать CSV</a><br>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                {{--<td></td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection