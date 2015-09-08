<table class="table mb-none">
    <thead>
    <tr style="width: 100%">
        <th>Название</th>
        <th>Трафикбэк, %</th>
        <th>Хитов</th>
        <th>ИК</th>
        <th>Подписок</th>
        <th>Отписок</th>
        <th>Ребиллов</th>
        <th>Заработок</th>
    </tr>
    </thead>
    <tbody>
    @foreach($streams as $stream)
        <tr id="">
            <td>
                {{$stream['name']}}<br>
                <a href="#" stream_id="{{$stream['id']}}" start="{{$start}}" end="{{$end}}" class="get_split_info_range" >Подробнее</a>
            </td>
            <td>{{$stream['tb_percent']}}</td>
            <td>{{$stream['hits']}}</td>
            <td>{{$stream['IC']}}</td>
            <td>{{$stream['subscribes']}}</td>
            <td>{{$stream['unsubscribes']}}</td>
            <td>{{$stream['rebills']}}</td>
            <td>{{$stream['money']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>