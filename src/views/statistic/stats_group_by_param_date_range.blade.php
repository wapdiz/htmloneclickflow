<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">   
                <h2>{{$title}}</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-2 control-label" style="margin-top:5px;"><b>Выбрать дату</b></label>
                    <div class="col-md-4">
                        <div class="input-daterange input-group" data-plugin-datepicker>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            <input type="text" class="form-control" name="start" value="{{date('m/d/Y',time()-60*60*24*7)}}" id="statistic_date_start_{{$name}}" >
                            <span class="input-group-addon">до</span>
                            <input type="text" class="form-control" name="end" value="{{date('m/d/Y',time()-60*60*24*1)}}" id="statistic_date_end_{{$name}}" >                                
                        </div>                                
                    </div>
                    <div class="col-md-1">

                        <button onClick="return get_stats_group_by_param(this);"
                         @if($customWhereParams == 1) customWhereParams="1" @else customWhereParams="0" @endif
                         type="button" class="mb-xs mt-xs mr-xs btn"
                         id="load_statistic_data" name_stats="{{$name}}" style="margin-top:0px !important;">Выгрузить</button>
                    </div>
                </div>
                @if($customWhereParams == 1)
                    @include('statistic/custom_where_params', ['name' => $name, 'customFilter' => $customFilter])
                @endif
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
                        <tbody id="stats_content_{{$name}}">                                
                        @if(!empty($stats_group_by_param))                           
                            @include('statistic/stats_group_by_param_content',
                                ['stats_group_by_param' => $stats_group_by_param, 'read_more' => $read_more, 'name' => $name])                                    
                        @else
                            <tr>
                                <td colspan="9" style="text-align:center;">
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