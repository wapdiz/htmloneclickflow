@foreach($streams as $item)
    <tr>
        <td>{{$item['id_stream']}}</td>
        <td>{{$item['stream_name']}}</td>
        <td>
            <a href="/admin/users/edit?id={{$item['user_id']}}">{{$item['user_name']}}</a>
        </td>
        <td>
            {{--<a href="">Просмотр</a><br>--}}
            <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/stream/view?id={{$item['id_stream']}}">Просмотр</a><br>
            @if($item['status'] == 'moderation')
                <a class="mb-xs mt-xs mr-xs btn btn-success accept-stream" number="{{$item['id_stream']}}" href="#">Принять</a>
                <a class="mb-xs mt-xs mr-xs btn btn-danger decline-stream" number="{{$item['id_stream']}}" href="#">Отклонить</a>
            @endif
        </td>
    </tr>
@endforeach