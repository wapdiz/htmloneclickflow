        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">   
                        <h2>{{$title}}</h2>
                    </header>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table mb-none">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Подписок&nbsp;активно</th>
                                        <th>Трафикбек&nbsp;-&nbsp;%</th>
                                        <th>Хитов</th>
                                        <th>ИК</th>
                                        <th>Подписок</th>
                                        <th>Отписок</th>
                                        <th>Ребиллов</th>
                                        <th>Заработок</th>
                                    </tr>
                                </thead>
                                <tbody>     
                                                        
                                    @foreach($stats_group_by_param as $key => $value)
                                        <tr>
                                            <td>{{$value['name']}}<br>
                                                @if($read_more == 1)
                                                    <a href='#' class="get_stats_group_by_split" name_stats="{{$name}}" stream_id="{{$value['id']}}" >подробнее</a>
                                                @endif
                                                <input type="hidden" id="statistic_date_start" value="{{$today_stream_stats_date_start}}">
                                                <input type="hidden" id="statistic_date_end" value="{{$today_stream_stats_date_end}}">
                                            </td>
                                            <td>{{$value['subscribesLive']}}</td>
                                            <td>{{$value['tbPercent']}}</td>
                                            <td>{{$value['hits']}}</td>
                                            <td>{{$value['ic']}}</td>
                                            <td>{{$value['subscribes']}}</td>
                                            <td>{{$value['subscribesDead']}}</td>
                                            <td>{{$value['rebills']}}</td>
                                            <td>{{number_format($value['partnerMoney'], 2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>