@extends('main-layout')

@section('content')
    <div class="container-fluid">
            <form method="POST" action="/streams/store_edit_split_level" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Уровень сплита</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_split" value="{{$split['id_split']}}">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="time_cookie">Уровень<span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="level" name="level" min="1" max="{{$stream['split_size']}}" value="{{$split['split_order']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Лендинги:</label>
                        <div class="col-md-6">
                            @foreach($landings as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="landing[]" value="{{$item['id_land']}}" @if(array_search($item['id_land'],$split['land_array']) !== false) checked @endif >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Операционные системы:</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="os_all" value="all" @if($split['os_array'] == 'all') checked @endif >Все
                            </label>
                            @foreach($os_list as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="os[]" value="{{$item['os_id']}}" @if(is_array($split['os_array']) && (array_search($item['os_id'],$split['os_array']) !== false) ) checked @endif >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Браузеры:</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="browser_all" value="all" @if($split['browser_array'] == 'all') checked @endif >Все
                            </label>
                            @foreach($browser_list as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="browser[]" value="{{$item['browser_id']}}" @if(is_array($split['browser_array']) && (array_search($item['browser_id'],$split['browser_array']) !== false) ) checked @endif  >{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group" id="type_split">
                        <label class="col-md-3 control-label">Тип устройства</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="device_type" value="1" @if( $split['device_type'] == 1 ) checked @endif>
                                    Мобильное
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="device_type" value="2" @if( $split['device_type'] == 2 ) checked @endif >
                                    Десктоп
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="type_redirect">
                        <label class="col-md-3 control-label">Тип редиректа</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" value="0" @if( $split['redirect_type'] == 0 ) checked @endif>
                                    Как в стриме
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" value="1" @if( $split['redirect_type'] == 1 ) checked @endif>
                                    Прямой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" value="2" @if( $split['redirect_type'] == 2 ) checked @endif>
                                    Кликандер
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" value="3" @if( $split['redirect_type'] == 3 ) checked @endif>
                                    Блайнд
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_redirect" value="4" @if( $split['redirect_type'] == 4 ) checked @endif>
                                    Баннер
                                </label>
                            </div>
                        </div>
                    </div>


                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Добавить лендинг</button>
                </footer>
            </section>
        </form>
    </div>
@endsection