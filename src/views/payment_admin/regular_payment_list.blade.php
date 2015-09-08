@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Список регулярных выплат</h2>
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
                        @foreach($lastRegularItems as $item)
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
                <form method="POST" action="/admin/regular_payment_list/create" id="" class="form-horizontal form-bordered">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-primary">Сформировать</button>
                </form>
            </footer>
        </section>
    </div>
@endsection