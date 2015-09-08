@foreach($credits as $item)
    <tr>
        <td>{{$item['email']}}</td>
        <td>
            {{$item['value']/100}}
            @if($item['currency'] == 1) рублей @endif
            @if($item['currency'] == 2) долларов @endif
            @if($item['currency'] == 3) евро @endif
        </td>
        <td>
            {{$item['subs_amount']}}
        </td>
        <td td_credit_id="{{$item['id']}}" >
            @if($item['status'] == 'request') Запрошен @endif
            @if($item['status'] == 'accept') Одобрен @endif
            @if($item['status'] == 'decline') Отклонен @endif
        </td>
        <td>
            {{$item['created_at']}}
        </td>
        <td>
            @if($item['status'] == 'request')
                <button type="button"  credit_id="{{$item['id']}}" class="accept_button mb-xs mt-xs mr-xs btn btn-success">Одобрить</button>
                <button type="button"  credit_id="{{$item['id']}}" class="decline_button mb-xs mt-xs mr-xs btn btn-danger">Отклонить</button>
            @endif
        </td>
    </tr>
@endforeach