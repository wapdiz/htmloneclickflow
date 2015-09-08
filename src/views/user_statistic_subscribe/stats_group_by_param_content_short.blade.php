@if(!empty($stats_group_by_param))     

    @if ($count = count($stats_group_by_param)) @endif
    @if ($loop = 0) @endif

    @foreach($stats_group_by_param as $key => $value)

        @if ($loop++) @endif

        <tr @if($count === $loop) class="inTotal" @endif>
            <td>{{$value['name']}}</td>
            <td>{{$value['subs_all']}}</td>
            <td>{{$value['subs_dead']}}&nbsp;&nbsp;({{round( $value['subs_dead'] / ($value['subs_all'] / 100), 0 )}}%)</td>
            <td>{{$value['subs_dead_with_no_rebill']}}&nbsp;&nbsp;({{round( $value['subs_dead_with_no_rebill'] / ($value['subs_all'] / 100), 0 )}}%)</td>
            <td>{{$value['subs_dead_with_duration_live_10_min']}}&nbsp;&nbsp;({{round( $value['subs_dead_with_duration_live_10_min'] / ($value['subs_all'] / 100), 0 )}}%)</td>
            <td>{{$value['subs_live']}}&nbsp;&nbsp;({{round( $value['subs_live'] / ($value['subs_all'] / 100), 0 )}}%)</td>
            <td>{{$value['rebills_notdelayed']}}</td>    
            <td>{{\ViewHelper::moneyFormat( $value['money_partner'] )}}</td>
            <td>{{number_format($value['rebills_all'] / $value['subs_all'], 2, ',', '&nbsp;')}}</td>
            <td>{{number_format($value['rebills_all'] / ($value['subs_all'] - $value['subs_dead_with_duration_live_10_min']), 2, ',', '&nbsp;')}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['money_partner'] / $value['subs_all'] )}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['money_partner'] / ($value['subs_all'] - $value['subs_dead_with_duration_live_10_min']) )}}</td>
            <td>@if($value['date'] !== null){{date_diff(new \DateTime(), new \DateTime($value['date']))->days}}@endif</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="15" style="text-align:center;">
            Нет данных
        </td>
    </tr>
@endif