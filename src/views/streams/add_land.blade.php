@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/streams/add_land" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Добавить лендинги</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_split" value="{{$id_split}}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Лендинги:</label>
                        <div class="col-md-6">
                            @foreach($landings as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="landing[]" value="{{$item['id_land']}}">{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Операционные системы:</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="os_all" value="all">Все
                            </label>
                            @foreach($os_list as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="os[]" value="{{$item['os_id']}}">{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Браузеры:</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="browser_all" value="all">Все
                            </label>
                            @foreach($browser_list as $item)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="browser[]" value="{{$item['browser_id']}}">{{$item['name']}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group" id="type_split">
                        <label class="col-md-3 control-label">Тип устройства</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="device_type" value="mobile" checked="">
                                    Мобильное
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="device_type" value="desktop">
                                    Десктоп
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