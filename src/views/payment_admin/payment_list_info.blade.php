@foreach($paymentList as $item)
    <tr hash="{{$item['hash']}}">
        <td></td>
        <td></td>
        <td>{{$item['payment_id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['amount']/100}}</td>
        <td>
            @if($item['currency'] == 1)
                Рубли
            @endif
            @if($item['currency'] == 2)
                USD
            @endif
            @if($item['currency'] == 3)
                EUR
            @endif
        </td>
        <td>
            @if($item['type'] == 'request')
                По запросу
            @endif
            @if($item['type'] == 'regular')
                Регулярная
            @endif
            @if($item['type'] == 'credit')
                Кредит
            @endif
        </td>
    </tr>
@endforeach