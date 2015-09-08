@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/stream/store_status" id="operator-form" class="form-horizontal form-bordered">
        <section class="panel">
            <header class="panel-heading">
                Просмотр стрима {{$stream['name']}}
            </header>
            <div class="panel-body">

                    {{--{{var_dump($stream)}}--}}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="stream_id" value="{{$stream['id_stream']}}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$stream['name']}}" id="name" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="user">Название</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$user['name']}}" id="user" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Категория</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$category['name']}}" id="category" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tb_url">URL TrafficBack</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$stream['tb_url']}}" id="tb_url" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="time_cookie">Время жизни куки</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$stream['time_cookie']}}" id="time_cookie" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Размер сплита</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$stream['split_size']}}" id="split_size" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Источник трафика</label>
                        <div class="col-md-6">
                            <input type="text" id="traffic_type" class="form-control" readonly="readonly"
                                @if($stream['traffic_type'] == 1) value="Свой"  @endif
                                @if($stream['traffic_type'] == 2) value="Покупной"  @endif
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Тип сплита</label>
                        <div class="col-md-6">
                            <input type="text" id="split_type" class="form-control" readonly="readonly"
                                @if($stream['split_type'] == 1) value="Админ"  @endif
                                @if($stream['split_type'] == 2) value="Партнер"  @endif
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type_redirect">Тип редиректа</label>
                        <div class="col-md-6">
                            <input type="text" id="type_redirect" class="form-control" readonly="readonly"
                                @if($stream['type_redirect'] == 1) value="Прямой"  @endif
                                @if($stream['type_redirect'] == 2) value="Кликандер"  @endif
                                @if($stream['type_redirect'] == 3) value="Блайнд"  @endif
                                @if($stream['type_redirect'] == 4) value="Баннер"  @endif
                            >
                        </div>
                    </div>

                    @if($stream['postback_enable'] == 1)
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="postback">Postback</label>
                            <div class="col-md-6">
                                <input type="text" value="Включен" id="postback" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="postback_url">Postback URL</label>
                            <div class="col-md-6">
                                <input type="text" value="{{$stream['postback_url']}}" id="postback_url" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="postback_method">Postback метод</label>
                            <div class="col-md-6">
                                <input type="text" value="{{$stream['postback_method']}}" id="postback_method" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="postback_events">Postback метод</label>
                            <div class="col-md-6">
                                <input type="text" id="postback_events" class="form-control" readonly="readonly"
                                    value="@if(array_search('subscribe',$stream['postback_events']) !== false) подписка  @endif @if(array_search('unsubscribe',$stream['postback_events']) !== false) отписка  @endif @if(array_search('rebill',$stream['postback_events']) !== false) ребил  @endif  @if(array_search('sell',$stream['postback_events']) !== false) продажа  @endif"
                                >
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="status">Перевести в статус</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status" id="status">
                                <option value="moderation">На модерации</option>
                                <option value="off">Выключен</option>
                                <option value="active">Активен</option>
                                <option value="refuse">Отклонено</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="status_comment">Оставить комментарий</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="status_comment" name="status_comment" >
                        </div>
                    </div>


            </div>

            <footer class="panel-footer">
                <button class="btn btn-primary">Изменить поток</button>
            </footer>
        </section>

        @if(isset($splits) && count($splits) !== 0 )
            @foreach($splits as $split)
            <section class="panel">
                <header class="panel-heading">
                    Уровень: {{$split['split_order']}}
                </header>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Уровень в сплите</label>
                        <div class="col-md-6">
                            <input type="text" value="{{$split['split_order']}}" id="split_level" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Тип устройства</label>
                        <div class="col-md-6">
                            <input type="text" value="@if($split['device_type'] == 1)Мобильное @endif @if($split['device_type'] == 2)Десктоп @endif " id="split_level" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Тип редиректа</label>
                        <div class="col-md-6">
                            <input type="text" id="split_level" class="form-control" readonly="readonly"
                                   @if($split['redirect_type'] == 0)value="Как в стриме" @endif
                                   @if($split['redirect_type'] == 1)value="Прямой" @endif
                                   @if($split['redirect_type'] == 2)value="Кликандер" @endif
                                   @if($split['redirect_type'] == 3)value="Блайнд" @endif
                                   @if($split['redirect_type'] == 4)value="Баннер" @endif

                                     >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Тип устройства</label>
                        <div class="col-md-6">
                            @foreach($lands as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" disabled name="landing[]" value="{{$item['id_land']}}" @if(array_search($item['id_land'],$split['land_array']) !== false) checked @endif >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Операционные системы</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="os_all" disabled value="all" @if($split['os_array'] == 'all') checked @endif >Все
                            </label>
                            @foreach($os as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" disabled name="os[]" value="{{$item['os_id']}}" @if(is_array($split['os_array']) && (array_search($item['os_id'],$split['os_array']) !== false) ) checked @endif >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_level">Браузеры</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" disabled name="os_all" disabled value="all" @if($split['os_array'] == 'all') checked @endif >Все
                            </label>
                            @foreach($browser as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" disabled name="browser[]" value="{{$item['browser_id']}}" @if(is_array($split['browser_array']) && (array_search($item['browser_id'],$split['browser_array']) !== false) ) checked @endif  >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
            @endforeach
        @endif

        </form>
    </div>
@endsection