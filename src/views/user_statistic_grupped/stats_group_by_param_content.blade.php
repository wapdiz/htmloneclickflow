@if(!empty($stats_group_by_param))     

    @if ($count = count($stats_group_by_param)) @endif
    @if ($loop = 0) @endif

    @foreach($stats_group_by_param as $key => $value)

        @if ($loop++) @endif

        <tr @if($count === $loop) class="inTotal" @endif>
            <td>{{$value['name']}}<br>
                @if($read_more == 1 AND $value['name'] != 'Итого:')
                    <a href='#' onClick="return get_stats_group_by_split(this);" class="get_stats_group_by_split" name_stats="{{$name}}" stream_id="{{$value['id']}}" >подробнее</a>
                @endif
            </td>
            <td>{{$value['hits']}}</td>
            <td>{{ ($value['nonValidHits'] > 0)? $value['nonValidHits'] .'&nbsp;('. round($value['nonValidHits'] / $value['hits']  * 100, 0) . '%)' : '0%' }}</td>
            <td>{{$value['subscribes']}}</td>
            <td>{{$value['subscribesBuyout']}}</td>
            <td>{{$value['subscribesBuyoutCandidate']}}</td>
            <td>{{$value['subscribesDead']}}</td>
            <td>{{$value['subscribesLive']}}</td>
            <td>{{($value['subscribes'] > 0)? '1:' . floor($value['hits'] / $value['subscribes']) : 0 }}</td>
            <td>{{$value['rebills']}}</td>      
            <td>{{$value['rebillsDelayed']}}</td> 
            <td>{{$value['rebills'] + $value['rebillsDelayed']}}</td>           
            <td>{{$value['ic']}}</td>            
            <td>{{\ViewHelper::moneyFormat($value['partnerMoney'])}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['partner_buyout_money'] )}}</td>
            <td>{{$value['partner_buyout_count']}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['credit_money'] )}}</td>
            <td>{{$value['credit_subs_count']}}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="14" style="text-align:center;">
            Нет данных
        </td>
    </tr>
@endif