@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Потоки</h2>
            </header>
            <div class="panel-body">
                @if(count($streams) != 0)
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Статус</th>
                            <th>Действия</th>
                            <th>Скрипт</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($streams as $item)
                            <tr>
                                <td>{{$item['id_stream']}}</td>
                                <td><a href="/splits_settings/?id={{$item['id_stream']}}">{{$item['name']}}</a></td>
                                <td>
                                    @if($item['status'] == 'active') Активен @endif
                                    @if($item['status'] == 'off') Выключен @endif
                                    @if($item['status'] == 'refuse') Отклонен @endif
                                    @if($item['status'] == 'moderation') На модерации @endif
                                </td>
                                <td>
                                    {{--<a href="/streams/delete?stream_id={{$item['id_stream']}}">Удалить</a><br>--}}
                                    {{--<a href="">Редактировать</a><br>--}}
                                    <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/streams/edit?stream_id={{$item['id_stream']}}">Редактировать</a>
                                    @if($item['status'] == 'active' )
                                        <a class="mb-xs mt-xs mr-xs btn btn-danger" href="/streams/status?status=off&stream_id={{$item['id_stream']}}">Выключить</a>
                                    @endif
                                    @if($item['status'] == 'off' )
                                        <a class="mb-xs mt-xs mr-xs btn btn-success" href="/streams/status?status=active&stream_id={{$item['id_stream']}}">Включить</a>
                                    @endif
                                </td>
                                <td>
                                    <b>Скрипт:</b> &lt;script src="apimobi.com/route?hash={{$item['hash']}}"&gt;&lt;/script&gt; <br>
                                    <b>Прямая ссылка:</b> apimobi.com/route?hash={{$item['hash']}}&type=direct
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning">
                        Вы еще не создали ни одного потока!
                    </div>
                @endif
            </div>
            <footer class="panel-footer">
                {{--<a href="">Добавить</a>--}}
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/streams/create">Добавить</a>
            </footer>
        </section>
    </div>
@endsection