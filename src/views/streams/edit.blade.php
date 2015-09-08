@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/streams/edit" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Редактирование потока {{$stream['name']}}</h2>
                </header>
                <div class="panel-body">

                    @if($stream['status_comment'] != null)
                        <b><p class="text-warning" >Комментарий администратора: {{$stream['status_comment']}}</p></b>
                    @endif

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="stream_id" value="{{$stream['id_stream']}}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$stream['name']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Категория <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="category" id="category">
                                @foreach($categories as $item)
                                    <option value="{{$item['category_id']}}" @if($item['category_id'] == $stream['id_category']) selected @endif>{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tb_url">Trafficback URL <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="tb_url" name="tb_url" placeholder="http://example.com/" value="{{$stream['tb_url']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="time_cookie">Время жизни куки<span style="color:#ff0000">*</span><br>(в минутах, 0 - бесконечно)</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="time_cookie" name="time_cookie" value="{{$stream['time_cookie']}}">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Размер сплита<span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="split_size" name="split_size" min="1" max="5" value="{{$stream['split_size']}}">
                        </div>
                    </div>

                    <div class="form-group" id="type_split">
                        <label class="col-md-3 control-label">Тип сплита</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_split" id="optionsRadios1" value="1" @if($stream['split_type'] == 1) checked="" @endif>
                                    Админ
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_split" id="optionsRadios2" value="2" @if($stream['split_type'] == 2) checked="" @endif>
                                    Партнер
                                </label>
                            </div>
                        </div>
                    </div>
                    -->

                    <div class="form-group" id="type_traffic">
                        <label class="col-md-3 control-label">Тип трафика</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_traffic" id="optionsRadios1" value="1" @if($stream['traffic_type'] == 1) checked="" @endif>
                                    Свой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_traffic" id="optionsRadios2" value="2" @if($stream['traffic_type'] == 2) checked="" @endif>
                                    Покупной
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="domen_park">URL домена для парковки</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="domen_park" name="domen_park" value="{{$stream['domen_park']}}">
                        </div>
                    </div>

                    <div class="form-group" id="type_redirect">
                        <label class="col-md-3 control-label">Тип редиректа</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="1" @if($stream['type_redirect'] == 1) checked @endif >
                                    Прямой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="2" @if($stream['type_redirect'] == 2) checked @endif >
                                    Кликандер
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="3" @if($stream['type_redirect'] == 3) checked @endif >
                                    Блайнд
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="4" @if($stream['type_redirect'] == 4) checked @endif >
                                    Баннер
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="source_list">Источники траффика<span style="color:#ff0000">*</span> <br> (по одному в строке) </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="source_list" rows="3" id="textareaDefault" >{{$stream['source_list']}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >
                        </label>
                        <div class="col-md-6">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="auto_buyout" id="auto_buyout" @if($stream['auto_buyout'] == 1) checked="" @endif>
                                <label for="auto_buyout">Включить автовыкуп подписок</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >
                        </label>
                        <div class="col-md-6">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback" id="postback" @if($stream['postback_enable']) checked="" @endif>
                                <label for="postback">Включить POSTBACK</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="postback_url">PostBack URL</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="postback_url" name="postback_url" placeholder="http://example.com/?" value="{{$stream['postback_url']}}">
                        </div>
                    </div>

                    <div class="form-group" id="postback_method">
                        <label class="col-md-3 control-label">Метод отправки POSTBACK</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="postback_method" id="postback_method" value="get" @if($stream['postback_method'] == 'get') checked="" @endif>
                                    GET
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="postback_method" id="postback_method" value="post" @if($stream['postback_method'] == 'post') checked="" @endif >
                                    POST
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >
                            События, на которые отправлять
                        </label>
                        <div class="col-md-6">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="subscribe" @if( $stream['postback_events']!== null && array_search('subscribe',$stream['postback_events']) !== false) checked="" @endif >
                                <label for="postback_event">Подписка</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="unsubscribe" @if( $stream['postback_events']!== null && array_search('unsubscribe',$stream['postback_events']) !== false) checked="" @endif >
                                <label for="postback_event">Отписка</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="rebill" @if( $stream['postback_events']!== null && array_search('rebill',$stream['postback_events']) !== false) checked="" @endif >
                                <label for="postback_event">Ребилл</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="sell" @if( $stream['postback_events']!== null && array_search('sell',$stream['postback_events']) !== false) checked="" @endif >
                                <label for="postback_event">Продажа</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="autobuyout" @if( $stream['postback_events']!== null && array_search('autobuyout',$stream['postback_events']) !== false) checked="" @endif >
                                <label for="postback_event">Выкуп подписки</label>
                            </div>
                        </div>
                    </div>


                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Изменить поток</button>
                </footer>
            </section>
        </form>
    </div>
@endsection