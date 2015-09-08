@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Категории лендингов</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            {{--<th>Страна</th>--}}
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $item)
                            <tr>
                                <td>{{$item['category_id']}}</td>
                                <td>{{$item['name']}}</td>
{{--                                <td>{{ $country[$item['country']]['name'] }}</td>--}}
                                <td>
                                    <a class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="/admin/categories/edit?id={{$item['category_id']}}">Редактировать</a>
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger category_delete" category_id="{{$item['category_id']}}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/categories/new">Добавить</a>
                <!-- Modal SplitSettings-->
            </footer>
        </section>
    </div>

    <div class="modal fade" id="categoriesSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="splitsSettingModalLabel">Удалить категорию?</h4>
                </div>
                <div id="categorySettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="categoryToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="category_id_input" name="category_id"/>
                        <button type="button" class="btn btn-default" id="categorySettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="categorySplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection