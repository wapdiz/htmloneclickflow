
@if($count_rebills_summ_today_current = current($count_rebills_summ_today))@endif
@if($count_rebills_summ_yesterday_current = current($count_rebills_summ_yesterday))@endif

<tr style="background-color:#F6F6F6;" class="date_subs_from_{{$date_subs_from}}">
    <td>Сегодня: {{($count_rebills_summ_today_current['count'] > 0) ? $count_rebills_summ_today_current['count'] : 0 }} / {{\ViewHelper::moneyFormat($count_rebills_summ_today_current['sum'])}}</td>
    <td>Вчера: {{($count_rebills_summ_yesterday_current['count'] > 0) ? $count_rebills_summ_yesterday_current['count'] : 0 }} / {{\ViewHelper::moneyFormat($count_rebills_summ_yesterday_current['sum'])}}</td>

</tr>