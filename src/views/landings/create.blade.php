@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/landings/store" id="landing-form" class="form-horizontal form-bordered" enctype="multipart/form-data" >
            <section class="panel">
                <header class="panel-heading">
                    <h2>Добавить лендинг</h2>
                </header>
                <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group" id="country">
                        <label class="col-md-3 control-label">Страна</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="country" id="country_select">
                                @foreach($countrys as $item)
                                    <option value="{{$item['country_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="operator">
                        <label class="col-md-3 control-label">Оператор</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="operator" id="operator_select">
                                <option value="" id="empty_operator"></option>
                                @foreach($operators as $item)
                                    <option value="{{$item['operator_id']}}" country_id="{{$item['country']}}" class="operator_option">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group" id="agregator">
                        <label class="col-md-3 control-label">Платежный агрегатор</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="agregator">
                                @foreach($agregators as $item)
                                    <option value="{{$item['agregator_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="namePromo">Название промо <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="namePromo" name="namePromo" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="weight">Вес</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="weight" name="weight" >
                        </div>
                    </div>

                    <div class="form-group" id="category">
                        <label class="col-md-3 control-label">Категория</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="category" id="category_select">
                                @foreach($categories as $item)
                                    <option value="{{$item['category_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group" id="type_sp">
                        <label class="col-md-3 control-label">Тип списания</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_sp" id="optionsRadios1" value="single" checked="">
                                    Разовое списание
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_sp" id="optionsRadios2" value="subscribe">
                                    Подписка
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="currency">
                        <label class="col-md-3 control-label">Валюта</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="currency">
                                @foreach($currency as $item)
                                    <option value="{{$item['currency_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="abonent_price">Цена для абонента</label>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control" id="abonent_price" name="abonent_price" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="allocation">Процент выплат</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="allocation" name="allocation" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="ua_ex">Стоп-слова<br>(через запятую)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="ua_ex" name="ua_ex" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Загрузить скрин</label>
                        <div class="col-md-6">
                            <input type="file" name="land_img"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">C триал-периодом</label>
                        <div class="col-md-6">
                            <input type="checkbox" name="trial-period" id="trial-period-checkbox" value="1" style="margin-top: 12px !important;">
                        </div>
                    </div>

                    <div class="form-group" id="trial-period-number" >
                        <label class="col-md-3 control-label" for="trial-period">Продолжительность триал-периода (дни)</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control"  name="trial-period-number" value="1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="alerts_flag">Включить алерты</label>
                        <div class="col-md-6">
                            <input type="checkbox" name="alerts_flag" id="alerts_flag_checkbox" value="1" style="margin-top: 12px !important;">
                        </div>
                    </div>

                    @for ($i = 0; $i < 5; $i++)
                        <div class="form-group alert_phrase_form" >
                            <label class="col-md-3 control-label" for="alert_phrase_form_{{$i}}">Фраза для алерта</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"  name="alert_phrase_form_{{$i}}" >
                            </div>
                        </div>
                    @endfor

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="auto_buyout_type">Автовыкуп подписок</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="auto_buyout_type" value="off" checked="">
                                    Выключено
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="auto_buyout_type" value="rebill">
                                    При первом ребиле
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="auto_buyout_type" value="time">
                                    По истечении времени
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="auto_buyout_time" style="display: none;">
                        <label class="col-md-3 control-label" for="auto_buyout_time">Срок выкупа, в минутах</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="auto_buyout_time" step="1" value="1" >
                        </div>
                    </div>

                    <div class="form-group" id="auto_buyout_price" style="display: none;">
                        <label class="col-md-3 control-label" for="auto_buyout_price">Цена выкупа, в рублях</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="auto_buyout_price" step="0.01" value="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Включить кредитование</label>
                        <div class="col-md-6">
                            <input type="checkbox" name="credit_enable" id="credit_enable_checkbox" value="1" style="margin-top: 12px !important;">
                        </div>
                    </div>

                    <div class="form-group" id="credit_price_input" style="display:none" >
                        <label class="col-md-3 control-label" for="credit_price_input">Размер кредита за подписку</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="credit_price_input" step="0.01" value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Тип URL</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_url" id="optionsRadios1" value="simple" checked="">
                                    Простой
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type_url" id="optionsRadios2" value="curl">
                                    Получение c помощью cURL
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  id="simple_url">
                        <label class="col-md-3 control-label" for="ua_ex">URL</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" name="url" >
                        </div>
                    </div>

                    <div class="form-group curl-url">
                        <label class="col-md-3 control-label">Лендинг агрегатор</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="land_agregator">
                                @foreach($land_agregators as $item)
                                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Тип устройства</label>
                        <div class="col-md-6">
                            <div class="checkbox">
                                @foreach($device_types as $value)
                                    <label><input type="checkbox" name="device_type[]" checked="checked" value="{{$value['id']}}"/>{{$value['name']}}</label><br>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">ОС</label>
                        <div class="col-md-6">
                            <select class="form-control" name="os" id="os">                               
                                <option value="all">Все</option>
                                <option value="equal">Совпадая</option>
                                <option value="not_equal">Исключая</option>                                
                            </select>
                        </div>
                    </div>

                    <input type="hidden" id="osStorageIds" name="osStorageIds">
                    <input type="hidden" id="osLastState">

                    <!-- Modal os  -->
                    <div class="modal fade" data-backdrop="true"  id="osModal" style="z-index:9003;" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="osModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" style="width:800px;">
                            <div class="modal-header">
                              <h4 class="modal-title" id="osModalLabel">Выбор ОС</h4>
                            </div>
                            <div id="osModalContent" class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" id="osModalClose">Закрыть</button>
                              <button type="button" class="btn btn-primary" id="osModalSave">Сохранить</button>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Браузеры</label>
                        <div class="col-md-6">
                            <select class="form-control" name="browser" id="browser">                               
                                <option value="all">Все</option>
                                <option value="equal">Совпадая</option>
                                <option value="not_equal">Исключая</option>                                
                            </select> 
                        </div>
                    </div>

                    <input type="hidden" id="browserStorageIds" name="browserStorageIds">
                    <input type="hidden" id="browserLastState">

                    <!-- Modal browser  -->
                    <div class="modal fade" data-backdrop="true" id="browserModal" style="z-index:9003;" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="browserModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" style="width:800px;">
                            <div class="modal-header">
                              <h4 class="modal-title" id="browserModalLabel">Выбор браузеров</h4>
                            </div>
                            <div id="browserModalContent" class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" id="browserModalClose">Закрыть</button>
                              <button type="button" class="btn btn-primary" id="browserModalSave">Сохранить</button>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Лендинг для автозамены</label>
                        <div class="col-md-6">
                            <select class="form-control" name="replace_landing_id" id="replace_landing_id">
                                <option value="0"  id="replace_landing_none_select" >Нет</option>
                                @foreach($landings as $landing)
                                    <option class="replace_landing_option" value="{{$landing['id_land']}}" category_id="{{$landing['id_category']}}" operator_id="{{$landing['id_operator']}}" >{{$landing['name']}}</option>
                                @endforeach
                            </select>
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