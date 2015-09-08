@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Новости</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Заголовок</th>
                            <th>Создано</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['title']}}</td>
                                <td>{{$item['created_at']}}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/news/edit?id={{$item['id']}}">Редактировать</a>
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger news_delete" news_id="{{$item['id']}}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                {{--<a href="/admin/news/new">Добавить</a>--}}
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/news/new">Добавить</a>
            </footer>
        </section>
    </div>

    <div class="modal fade" id="newsSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="newsSettingModalLabel">Удалить запись?</h4>
                </div>
                <div id="newsSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="newsToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="news_id_input" name="news_id"/>
                        <button type="button" class="btn btn-default" id="newsSettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="newsSplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection