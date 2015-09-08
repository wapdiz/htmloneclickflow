@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Последние выплаты</h2>
            </header>

            <div class="panel-body">
                @if(count($payments) !== 0)
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Когда</th>
                            <th>Сумма</th>
                            <th>Валюта</th>
                            <th>Тип</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['datetime']}}</td>
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
                                <td>
                                    @if($item['status'] == 'process')
                                        <p class="text-warning">
                                            В обработке
                                        </p>
                                    @endif
                                    @if($item['status'] == 'decline')
                                            <p class="text-danger">
                                                Отклонен
                                            </p>
                                    @endif
                                    @if($item['status'] == 'success')
                                            <p class="text-success">
                                                Успешно
                                            </p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning">
                        Выплат пока не проводилось!
                    </div>
                @endif
            </div>
            <footer class="panel-footer">
                {{--<a href=""></a>--}}
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/payment/request">Запросить</a>
            </footer>
        </section>
    </div>
@endsection