@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/streams/create" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Создание потока </h2>
                </header>
                <div class="panel-body">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" @if(isset($old['name'])) value="{{$old['name']}}" @endif >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Категория <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="category" id="category">
                                @foreach($categories as $item)
                                    <option value="{{$item['category_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tb_url">Trafficback URL <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="tb_url" name="tb_url" placeholder="http://example.com/" @if(isset($old['tb_url'])) value="{{$old['tb_url']}}" @endif>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="time_cookie">Время жизни куки<span style="color:#ff0000">*</span><br>(в минутах, 0 - бесконечно)</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="time_cookie" name="time_cookie" @if(isset($old['time_cookie'])) value="{{$old['time_cookie']}}" @endif >
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Размер сплита<span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="split_size" name="split_size" min="1" max="5" @if(isset($old['split_size'])) value="{{$old['split_size']}}" @endif>
                        </div>
                    </div>

                    <div class="form-group" id="type_split">
                        <label class="col-md-3 control-label">Тип сплита</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_split" id="optionsRadios1" value="1" @if(isset($old['type_split']) && $old['type_split'] == 1) checked @endif @if(!isset($old['type_split'])) checked @endif >
                                    Админ
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_split" id="optionsRadios2" value="2" @if(isset($old['type_split']) && $old['type_split'] == 2) checked @endif >
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
                                    <input type="radio" name="type_traffic" id="optionsRadios1" value="1" @if(isset($old['type_traffic']) && $old['type_traffic'] == 1) checked @endif @if(!isset($old['type_traffic'])) checked @endif>
                                    Свой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_traffic" id="optionsRadios2" value="2" @if(isset($old['type_traffic']) && $old['type_traffic'] == 2) checked @endif >
                                    Покупной
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="domen_park">URL домена для парковки</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="domen_park" name="domen_park" @if(isset($old['domen_park'])) value="{{$old['domen_park']}}" @endif >
                        </div>
                    </div>

                    <div class="form-group" id="type_redirect">
                        <label class="col-md-3 control-label">Тип трафика</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="1" @if(isset($old['type_redirect']) && $old['type_redirect'] == 1) checked @endif @if(!isset($old['type_redirect'])) checked @endif>
                                    Прямой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="2" @if(isset($old['type_redirect']) && $old['type_redirect'] == 2) checked @endif>
                                    Кликандер
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="3" @if(isset($old['type_redirect']) && $old['type_redirect'] == 3) checked @endif>
                                    Блайнд
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" id="type_redirect" value="4" @if(isset($old['type_redirect']) && $old['type_redirect'] == 4) checked @endif >
                                    Баннер
                                </label>
                            </div>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-3 control-label" for="source_list">Источники траффика <br> (по одному в строке, например:<br>--}}
                            {{--<a href="#">http://example.com/</a> ) </label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<textarea class="form-control" name="source_list" rows="3" id="textareaDefault"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <label class="col-md-3 control-label" >
                        </label>
                        <div class="col-md-6">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="auto_buyout" id="auto_buyout">
                                <label for="auto_buyout">Включить автовыкуп подписок</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" >
                        </label>
                        <div class="col-md-6">
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback" id="postback" @if(isset($old['postback']) && $old['postback'] == 1) checked @endif>
                                <label for="postback">Включить POSTBACK</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="postback_url">PostBack URL</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" id="postback_url" name="postback_url" placeholder="http://example.com/?" @if(isset($old['postback_url'])) value="{{$old['postback_url']}}" @endif >
                        </div>
                    </div>

                    <div class="form-group" id="postback_method">
                        <label class="col-md-3 control-label">Метод отправки POSTBACK</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="postback_method" id="postback_method" value="get" @if(isset($old['postback_method']) && $old['postback_method'] == 'get') checked @endif @if(!isset($old['postback_method'])) checked @endif>
                                    GET
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="postback_method" id="postback_method" value="post" @if(isset($old['postback_method']) && $old['postback_method'] == 'post') checked @endif >
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
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="subscribe" @if(isset($old['postback_event']) && array_search('subscribe',$old['postback_event']) !== false) checked @endif >
                                <label for="postback_event">Подписка</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="unsubscribe" @if(isset($old['postback_event']) && array_search('unsubscribe',$old['postback_event']) !== false) checked @endif >
                                <label for="postback_event">Отписка</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="rebill" @if(isset($old['postback_event']) && array_search('rebill',$old['postback_event']) !== false) checked @endif >
                                <label for="postback_event">Ребилл</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="sell" @if(isset($old['postback_event']) && array_search('sell',$old['postback_event']) !== false) checked @endif >
                                <label for="postback_event">Продажа</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" name="postback_event[]" id="postback_event" value="autobuyout" @if(isset($old['postback_event']) && array_search('autobuyout',$old['postback_event']) !== false) checked @endif >
                                <label for="postback_event">Выкуп подписки</label>
                            </div>
                        </div>
                    </div>

                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Создать поток</button>
                </footer>
            </section>
        </form>
    </div>
@endsection