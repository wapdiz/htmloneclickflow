@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Операторы сотовой связи</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Страна</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operators as $item)
                            <tr>
                                <td>{{$item['operator_id']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{ $country[$item['country']]['name'] }}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="/admin/operators/edit?id={{$item['operator_id']}}">Редактировать</a>
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger operator_delete" operator_id="{{$item['operator_id']}}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="/admin/operators/create">Добавить</a>
            </footer>
        </section>
    </div>

    <div class="modal fade" id="operatorSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="splitsSettingModalLabel">Удалить оператора?</h4>
                </div>
                <div id="operatorSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="operatorToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="operator_id_input" name="operator_id"/>
                        <button type="button" class="btn btn-default" id="operatorSettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="operatorSplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection