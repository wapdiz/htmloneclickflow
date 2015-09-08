@foreach($splits as $split)
    <tr class="split_info_{{$stream_id}}">
    <td>Уровень {{$split['order']}}:</td>
    <td>{{$split['active_subs']}}</td>
    <td>{{$split['tb_percent']}}</td>
    <td>{{$split['hits']}}</td>
    <td>{{$split['IK']}}</td>
    <td>{{$split['subs_today']}}</td>
    <td>{{$split['unsubs_today']}}</td>
    <td>{{$split['rebills']}}</td>
    <td>{{$split['today_money']}}</td>
    </tr>
@endforeach