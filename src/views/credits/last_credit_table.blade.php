<h2>Запрошенные кредиты:</h2>
<div class="table-responsive">
    <table class="table mb-none">
        <thead>
        <tr>
            <th>Сумма</th>
            <th>Валюта</th>
            <th>Число кредитованных подписок</th>
            <th>Статус</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($creditItems as $item)
            <tr>
                <td>{{$item['value']/100}}</td>
                <td>@if($item['currency'] ==1 ) Рубли @endif</td>
                <td>{{$item['subs_amount']}}</td>
                <td>@if($item['status'] == 'request') Запрошено @elseif($item['status'] == 'accept') Одобрено @elseif($item['status'] == 'decline') Отклонено @endif</td>
                <td>{{$item['created_at']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>