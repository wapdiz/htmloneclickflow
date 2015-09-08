@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Общая статистика</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Описание</th>
                                    <th>Значение</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($common_stats as $item)
                                    <tr>
                                        <td>{{$item['message']}}</td>
                                        <td>{{$item['value']}}</td>
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Статистика за неделю</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Переходы</th>
                                    <th>TrafficBack %</th>
                                    <th>Заработок</th>
                                    <th>Подписок</th>
                                    <th>Отписок</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($week_data as $item)
                                    <tr>
                                        <td>{{$item['date']}}</td>
                                        <td>{{$item['hits']}}</td>
                                        <td>{{$item['tb_percent']}}</td>
                                        <td>{{$item['money']}}</td>
                                        <td>{{$item['subs']}}</td>
                                        <td>{{$item['unsubs']}}</td>
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Статистика по подпискам</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Описание</th>
                                    <th>Значение</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribe_stats as $item)
                                    <tr>
                                        <td>{{$item['message']}}</td>
                                        <td>{{$item['value']}}</td>
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Статистика по лендингам</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Название лендинга</th>
                                    <th>Переходов за день</th>
                                    <th>Переходов за неделю</th>
                                    <th>Заработок системы за день</th>
                                    <th>Заработок системы за неделю</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($land_money as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['day_hit']}}</td>
                                        <td>{{$item['week_hit']}}</td>
                                        <td>{{$item['day_money']}}</td>
                                        <td>{{$item['week_money']}}</td>
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Статистика по юзерам</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Переходов за день</th>
                                    <th>Переходов за неделю</th>
                                    <th>Заработок пользователя за день</th>
                                    <th>Заработок пользователя за неделю</th>
                                    <th>Заработок системы за день</th>
                                    <th>Заработок системы за неделю</th>
                                    <th>% Трафикбэка за день</th>
                                    <th>% Трафикбэка за неделю</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_stats as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['day_hits']}}</td>
                                        <td>{{$item['week_hits']}}</td>
                                        <td>{{$item['day_user_money']}}</td>
                                        <td>{{$item['week_user_money']}}</td>
                                        <td>{{$item['day_system_money']}}</td>
                                        <td>{{$item['week_system_money']}}</td>
                                        <td>{{$item['day_tb_percent']}}</td>
                                        <td>{{$item['week_tb_percent']}}</td>
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
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>Последние записи</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP</th>
                                    <th>OS</th>
                                    <th>Browser</th>
                                    <th>Device Type</th>
                                    <th>TB Reason</th>
                                    <th>Referer (short)</th>
                                    <th>Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($last_items as $item)
                                    <tr>
                                        <td>{{$item['id_click']}}</td>
                                        <td>{{$item['ip']}}</td>
                                        <td>{{$item['os']}}</td>
                                        <td>{{$item['browser']}}</td>
                                        <td>{{$item['device_type']}}</td>
                                        <td>{{$item['tb_reason']}}</td>
                                        <td>{{$item['ref']}}</td>
                                        <td>{{$item['location']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection