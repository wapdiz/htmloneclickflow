@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Лендинги</h2>
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-2" >
                        <p>Страна</p>
                        <select id="land_country" name="country" class="form-control mb-md">
                            <option value="all">Любая</option>
                            @foreach($countrys as $country)
                                <option value="{{$country['country_id']}}">{{$country['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Оператор</p>
                        <select id="land_operator" name="operator" class="form-control mb-md">
                            <option value="all">Любой</option>
                            @foreach($operators as $operator)
                                <option value="{{$operator['operator_id']}}">{{$operator['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Категория</p>
                        <select id="land_category" name="category" class="form-control mb-md">
                            <option value="all">Любая</option>
                            @foreach($categories as $category)
                                <option value="{{$category['category_id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2" >
                        <p>Агрегатор</p>
                        <select id="land_agregator" name="agregator" class="form-control mb-md">
                            <option value="all">Любой</option>
                            @foreach($agregators as $agregator)
                                <option value="{{$agregator['agregator_id']}}">{{$agregator['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-2" style="padding-top: 26px;">
                        <button id="filter_submit" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Применить</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Статус</th>
                            <th>Страна</th>
                            <th>Оператор</th>
                            <th>Категория</th>
                            <th>Агрегатор</th>
                            <th>Цена</th>
                            <th>URL</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody id="tbody_container">
                        @foreach($landings as $landing)
                            <tr>
                                <td>{{$landing['id_land']}}</td>
                                <td>
                                    <a class="landing_name" land_img="{{$landing['img_name']}}" href="">{{$landing['name']}}</a>
                                </td>
                                <td landing_id="{{$landing['id_land']}}">
                                    @if($landing['disabled'] == 1)
                                        <span class="label label-danger">Выключен</span>
                                    @else
                                        <span class="label label-success">Включен</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $countrys[$landing['id_country']]['name'] }}
                                </td>
                                <td>
                                    {{ $operators[$landing['id_operator']]['name'] }}
                                </td>
                                <td>
                                    {{ $categories[$landing['id_category']]['name'] }}
                                </td>
                                <td>
                                    {{ $agregators[$landing['id_agregator']]['name'] }}
                                </td>
                                <td>
                                    {{ $landing['abonent_price'] / 100 }}
                                    @if($landing['currency'] == 1)
                                        Рублей
                                    @elseif($landing['currency'] == 2)
                                        USD
                                    @elseif($landing['currency'] == 3)
                                        EUR
                                    @endif
                                </td>
                                <td>{{$landing['land_url']}}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/landings/edit?id={{$landing['id_land']}}">Редактировать</a>

                                    <a class="mb-xs mt-xs mr-xs btn btn-success landing_enable_button" style="display: @if($landing['disabled'] == 1) inline-block @else none @endif" href="#" landing_id="{{$landing['id_land']}}">Включить</a>
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger landing_disabled_button" style="display: @if($landing['disabled'] == 1) none @else inline-block @endif" href="#" landing_id="{{$landing['id_land']}}">Выключить</a>

                                    <a class="mb-xs mt-xs mr-xs btn btn-info landing_replace_button" href="#replaceLandingModal" landing_id="{{$landing['id_land']}}">Заменить</a>
                                    <a class="mb-xs mt-xs mr-xs modal-basic btn btn-danger landing_delete" landing_id="{{$landing['id_land']}}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/landings/new">Добавить</a>
            </footer>
        </section>
    </div>

    <div class="modal fade" id="landingSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="splitsSettingModalLabel">Удалить лендинг?</h4>
                </div>
                <div id="landingSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="landingToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="landing_id_input" name="landing_id"/>
                        <button type="button" class="btn btn-default" id="landingSettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="landingSplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="landingReplaceModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="landingReplaceModal">
        <div class="modal-dialog" role="document">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Замена лендинга</h2>
                </header>
                <div class="panel-body">
                    <form action="" class="form-horizontal mb-lg" id="landingReplaceModalForm">

                    </form>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-default" id="landingReplaceModalClose">Закрыть</button>
                            <button type="button" class="btn btn-primary" id="landingReplaceModalApply">Выполнить</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>

    <div class="modal fade" id="landingDisableModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="landingDisableModal">
        <div class="modal-dialog" role="document">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Выключить лендинг</h2>
                </header>
                <div class="panel-body">
                    <form action="" class="form-horizontal mb-lg" id="landingDisableModalForm">

                    </form>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-default" id="landingDisableModalClose">Закрыть</button>
                            <button type="button" class="btn btn-primary" id="landingDisableModalApply">Выполнить</button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>



    <div id="landing_preview_container" style="z-index: 999;display: none; position: fixed; overflow: hidden">
        <img id="landing_preview_img" src="#" alt=""/>
    </div>
@endsection