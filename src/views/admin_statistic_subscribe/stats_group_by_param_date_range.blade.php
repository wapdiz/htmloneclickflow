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
                          
                        <input style="display:inline-block;" type="text" class="form-control" name="start" value="{{date('d.m.Y',time()-60*60*24*7)}}" id="statistic_date_start_{{$name}}" >
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
                    @include('admin_statistic_subscribe/custom_where_params', ['name' => $name, 'customFilter' => $customFilter])
                @endif
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Подписок</th>
                                <th>Подписок выкуплено</th>
                                <th>Подписки кандидаты на выкуп</th>
                                <th>Отписок</th>
                                <th>Отписок без ребилла</th>
                                <th>Отписки за 10 минут</th>
                                <th title="Без учёта кандидатов на выкуп">Активная база</th>
                                <th>Ребиллов</th>
                                <th title="Будут переданы системному пользователю, либо оставлены у первого владельца">Ребиллов отложено</th> 
                                <th title="Ребиллов всего = Ребиллов + Ребиллов отложено">Ребиллов всего</th> 
                                <th title="Без учёта отложенных ребиллов">Деньги партнёра</th>                                
                                <th title="Без учёта отложенных ребиллов">Деньги реферера</th>
                                <th title="Без учёта отложенных ребиллов">Деньги системы</th>
                                <th title="Без учёта отложенных ребиллов">Деньги все</th>
                                <th title="Начислено пользователю">Плата за выкуп</th>
                                <th title="За это количество начисляется - 'Плата за выкуп'">Количество оплаченных-выкупленных подписок</th>
                                <th title="Начислено пользователю">Плата за кредит</th>
                                <th title="За это количество начисляется - 'Плата за кредит'">Прокредитованные подписки</th>
                                <th>Ребиллов на абонента</th>
                                <th>Ребиллов на абонента без учёта отписки за 10 минут</th>
                                <th>Стоимость подписки для партнёра</th>
                                <th>Стоимость подписки для партнёра без учёта  отписки за 10 минут</th>
                                <th>Дней ребиллится</th>
                            </tr>
                        </thead>
                        <tbody id="stats_content_{{$name}}">                                
                        @if(!empty($stats_group_by_param))                           
                            @include('admin_statistic_subscribe/stats_group_by_param_content',
                                ['stats_group_by_param' => $stats_group_by_param, 'read_more' => $read_more, 'name' => $name])                                    
                        @else
                            <tr>
                                <td colspan="20" style="text-align:center;">
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