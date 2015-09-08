@foreach($splits as $split)
    <tr class="split_info_range_{{$stream_id}}">
        {{--<td>Уровень {{$split['order']}}:</td>--}}
        {{--<td>{{$split['active_subs']}}</td>--}}
        <td>Уровень в сплите: {{$split['split_order']}}</td>
        <td>{{$split['tb_percent']}}</td>
        <td>{{$split['hits']}}</td>
        <td>{{$split['IC']}}</td>
        <td>{{$split['subscribes']}}</td>
        <td>{{$split['unsubscribes']}}</td>
        <td>{{$split['rebills']}}</td>
        <td>{{$split['money']}}</td>
    </tr>
@endforeach