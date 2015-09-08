
{{$stats_count = count(current($stats_group_by_param)) + 1}}
<tr style="background-color:#F6F6F6;" class="split_info_{{$stream_id}}">
    <td colspan="@if($stats_count < 2) 9 @else {{$stats_count}} @endif">
        {{$title}} @if($stats_count < 2) - нет данных @endif
    </td>
</tr>         
@foreach($stats_group_by_param as $key => $value)
    <tr style="background-color:#F6F6F6;" class="split_info_{{$stream_id}}">
            <td>{{$value['name']}}</td>
            <td>{{$value['hits']}}</td>
            <td>{{ ($value['nonValidHits'] > 0)? $value['nonValidHits'] .'&nbsp;('. round($value['nonValidHits'] / $value['hits']  * 100, 0) . '%)' : '0%' }}</td>
            <td>{{$value['subscribes'] + $value['subscribesBuyout']}}</td>
            <td>{{$value['subscribesBuyout']}}</td>
            <td>{{$value['subscribesDead']}}</td>
            <td>{{$value['subscribesLive']}}</td>
            <td>{{($value['subscribes'] > 0)? '1:' . floor($value['hits'] / $value['subscribes']) : 0 }}</td>
            <td>{{$value['rebills']}}</td>      
            <td>{{$value['ic']}}</td>            
            <td>{{\ViewHelper::moneyFormat($value['partnerMoney'])}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['partner_buyout_money'] )}}</td>    
            <td>{{\ViewHelper::moneyFormat( $value['credit_money'] )}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['partnerMoney'] + $value['partner_buyout_money'] + $value['credit_money'])}}</td>   
    </tr>
@endforeach
