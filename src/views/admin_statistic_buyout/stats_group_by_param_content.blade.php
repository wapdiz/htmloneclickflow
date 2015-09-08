@if(!empty($stats_group_by_param))     

    @if ($count = count($stats_group_by_param)) @endif
    @if ($loop = 0) @endif

    @foreach($stats_group_by_param as $key => $value)

        @if($value['date'] !== null ? $days_rebill = date_diff(new \DateTime(), new \DateTime($value['date']))->days : $days_rebill = '')@endif




        @if ($loop++) @endif

        <tr @if($count === $loop) class="inTotal" @endif>
            <td>{{$value['name']}}</td>
            <td>{{$value['subs_buyout']}}</td>
            <td>{{$value['subs_buyed_live']}} ({{ ($value['subs_buyout'] > 0)? round($value['subs_buyed_live'] / $value['subs_buyout']  * 100, 0) : 0 }}%)</td>
            <td>{{$value['rebills_buyed']}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['money_partner_buyed'] )}}</td>

            <td>{{$value['rebills_buyed_today']}} / {{\ViewHelper::moneyFormat( $value['money_partner_buyed_today'] )}}</td>
            <td>{{$value['rebills_buyed_yesterday']}} / {{\ViewHelper::moneyFormat( $value['money_partner_buyed_yesterday'] )}}</td>

            <td>{{\ViewHelper::moneyFormat( $value['partner_buyout_money'] )}}</td>
            <td>{{$value['partner_buyout_count']}}</td>
            <td>{{\ViewHelper::moneyFormat( $value['partner_buyout_money'] - $value['money_partner_buyed'] )}}
                ({{ ($value['partner_buyout_money'] > 0)? 100 - round($value['money_partner_buyed'] / $value['partner_buyout_money']  * 100, 0) : 0 }}%)</td>
            <td>{{$days_rebill}}</td>
            <td>{{\ViewHelper::prognisisProfitDays($days_rebill, $value['subs_buyout'], $value['subs_buyed_live'], $value['money_partner_buyed'], $value['partner_buyout_money'])}}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="20" style="text-align:center;">
            Нет данных
        </td>
    </tr>
@endif