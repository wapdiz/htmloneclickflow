@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Статические страницы</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Тип</th>
                            <th>Название</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page['page_id']}}</td>
                                <td>
                                    @if($page['type'] == 'parent')
                                        Контейнер
                                    @elseif($page['type'] == 'link')
                                        Ссылка
                                    @elseif($page['type'] == 'child')
                                        Вложенная ссылка
                                    @endif
                                </td>
                                <td>{{$page['title']}}</td>
                                <td>
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/articles/edit?id={{$page['page_id']}}">Редактировать</a>
                                    @if(isset($page['child']))
                                        Невозможно удалить, есть потомки
                                    @else
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger static_page_delete" static_page_id="{{$page['page_id']}}" href="#">Удалить</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/static_pages/create">Создать</a>
            </footer>
        </section>
    </div>

    <div class="modal fade" id="staticPageSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="splitsSettingModalLabel">Удалить статическую страницу?</h4>
                </div>
                <div id="staticPageSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="staticPageToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="staticPage_id_input" name="staticPage_id"/>
                        <button type="button" class="btn btn-default" id="staticPageSettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="staticPageSplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection