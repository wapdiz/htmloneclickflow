<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">   
                <h2>{{$title}}</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-1 control-label" style="margin-top:5px;"><b>Выбрать дату</b></label>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                          
                        <input style="display:inline-block;" type="text" class="form-control" name="start" value="@if($name == 'hour'){{date('d.m.Y',time())}}@else{{date('d.m.Y',time()-60*60*24*7)}}@endif" id="statistic_date_start_{{$name}}" >
                        <span style="display:inline-block;" >до</span>
                        <input style="display:inline-block;" type="text" class="form-control" name="end" value="{{date('d.m.Y',time())}}" id="statistic_date_end_{{$name}}" >  
                
                        <script>
                            datepickerCustom.init('{{$name}}');                            
                        </script>

                    </div>

                    <div class="col-md-2">

                        <button onClick="return get_stats_group_by_param(this);"
                         @if($customWhereParams == 1) customWhereParams="1" @else customWhereParams="0" @endif
                         type="button" class="mb-xs mt-xs mr-xs btn"
                         id="load_statistic_data" name_stats="{{$name}}" style="margin-top:0px !important;">Выгрузить</button>
                    </div>

                    <div id="dpFastButtonsPanel_{{$name}}" class="col-sm-12"></div>
                </div>
                @if($customWhereParams == 1)
                    @include('user_statistic_grupped/custom_where_params', ['name' => $name, 'customFilter' => $customFilter])
                @endif
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Хитов</th>
                                <th>ТБ</th>
                                <th>Подписок</th>
                                <th>Подписок выкуплено</th>
                                <th>Подписки кандидаты на выкуп</th>
                                <th>Отписок</th>
                                <th title="Без учёта кандидатов на выкуп">Активные&nbsp;подписки</th>
                                <th title="Ратио = Подписок всего / Хиты">Ратио</th>
                                <th>Ребиллов</th>
                                <th title="При выкупе будут переданы системному пользователю, либо оставлены у первого владельца в случае отписки раньше выкупа">Ребиллов отложено</th> 
                                <th title="Ребиллов всего = Ребиллов + Ребиллов отложено">Ребиллов всего</th>       
                                <th>ИК</th>
                                <th title="Без учёта отложенных ребиллов">Заработок</th>
                                <th title="Начислено пользователю">Плата за выкуп</th>
                                <th title="За это количество начисляется - 'Плата за выкуп'">Количество оплаченных-выкупленных подписок</th>
                                <th title="Начислено пользователю">Плата за кредит</th>
                                <th title="За это количество начисляется - 'Плата за кредит'">Прокредитованные подписки</th>
                            </tr>
                        </thead>
                        <tbody id="stats_content_{{$name}}">                                
                        @if(!empty($stats_group_by_param))                           
                            @include('user_statistic_grupped/stats_group_by_param_content',
                                ['stats_group_by_param' => $stats_group_by_param, 'read_more' => $read_more, 'name' => $name])                                    
                        @else
                            <tr>
                                <td colspan="14" style="text-align:center;">
                                @if($download_data == 1)
                                    Нет данных
                                @else
                                    Нажмите - Выгрузить
                                @endif
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>