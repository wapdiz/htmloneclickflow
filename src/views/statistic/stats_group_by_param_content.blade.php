@if(!empty($stats_group_by_param))                    
    @foreach($stats_group_by_param as $key => $value)
        <tr>
            <td>{{$value['name']}}<br>
                @if($read_more == 1)
                    <a href='#' onClick="return get_stats_group_by_split(this);" class="get_stats_group_by_split" name_stats="{{$name}}" stream_id="{{$value['id']}}" >подробнее</a>
                @endif
            </td>
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
@else
    <tr>
        <td colspan="9" style="text-align:center;">
            Нет данных
        </td>
    </tr>
@endif