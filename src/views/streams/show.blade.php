@extends('main-layout')

@section('content')
    <div class="container-fluid">

        <section class="panel">
            <header class="panel-heading">
                <h2>Поток</h2>
            </header>
            <div class="panel-body">
                @if(isset($status_comment))
                    <b><p class="text-warning" >Комментарий администратора: {{$status_comment}}</p></b>
                @endif
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Порядок в сплите</th>
                            <th>Ленды</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($splits as $item)
                            <tr>
                                <td>{{$item['split_order']}}</td>
                                <td>
                                    @foreach($item['land_array'] as $land)
                                        {{$land['name']}} ({{$land['opsos']}})
                                    @endforeach
                                </td>
                                <td>
                                    {{--<a href="/streams/add_land?id={{$item['id_split']}}">Добавить лендинги в поток в сплит</a><br>--}}
                                    <a href="/streams/edit_split?id={{$item['id_split']}}">Редактировать уровень</a><br>
                                    <a href="/streams/delete_split?id={{$item['id_split']}}">Удалить уровень сплита</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a href="/streams/add_split_level?id={{$stream_id}}">Добавить уровень</a>
            </footer>
        </section>
    </div>
@endsection