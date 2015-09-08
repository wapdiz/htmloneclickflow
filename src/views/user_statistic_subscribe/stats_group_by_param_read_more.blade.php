
{{$stats_count = count(current($stats_group_by_param))}}
<tr style="background-color:#F6F6F6;" class="split_info_{{$stream_id}}">
    <td colspan="@if($stats_count < 2) 9 @else {{$stats_count}} @endif">
        {{$title}} @if($stats_count < 2) - нет данных @endif
    </td>
</tr>         
@foreach($stats_group_by_param as $key => $value)
    <tr style="background-color:#F6F6F6;" class="split_info_{{$stream_id}}">
        <td>{{$value['name']}}</td>
        <td>{{$value['subscribesLive']}}</td>
        <td>{{$value['tbPercent']}}</td>
        <td>{{$value['hits']}}</td>
        <td>{{$value['ic']}}</td>
        <td>{{$value['subscribes']}}</td>
        <td>{{$value['subscribesDead']}}</td>
        <td>{{$value['rebills']}}</td>
        <td>{{number_format($value['partnerMoney'], 2)}}</td>
    </tr>
@endforeach
