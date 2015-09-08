@foreach($payments as $item)
    <tr>
        <td><input type="checkbox" class="add_in_list_checkbox" number="{{$item['id']}}" @if($item['status'] =='process') process="1" @endif />&nbsp; {{$item['id']}}</td>
        <td>{{$item['datetime']}}</td>
        <td><a href="/admin/users/edit?id={{$item['user_id']}}">{{$item['name']}}</a></td>
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
        </td>
        <td>
            @if($item['status'] == 'process')
                <p class="text-warning item_status"  number="{{$item['id']}}">
                    В обработке
                </p>
            @endif
            @if($item['status'] == 'decline' )
                <p class="text-danger item_status" number="{{$item['id']}}">
                    Отклонен
                </p>
            @endif
            @if($item['status'] == 'success')
                <p class="text-success item_status" number="{{$item['id']}}" >
                    Успешно
                </p>
            @endif
        </td>
        <td>
            RUB: {{$item['balance_rub']/100}} USD: {{$item['balance_usd']/100}} EUR: {{$item['balance_eur']/100}}
        </td>
        <td id="in_list_{{$item['id']}}">
            @if($item['in_list'] == 1) Да @endif
            @if($item['in_list'] == 0) Нет @endif
        </td>
        <td>
            <a href="#">Посмотреть статистику</a><br>
            @if($item['in_list'] == 0 && $item['status'] == 'process') <a href="#" class="decline_payment" number="{{$item['id']}}" >Отклонить</a><br>@endif
            {{--                                    <a href="/admin/users/edit?id={{$item['user_id']}}">Открыть профиль пользователя</a><br>--}}
            @if($item['in_list'] == 0 && $item['status'] == 'process') <a href="#" class="add_in_payment_list" number="{{$item['id']}}" >Добавить в очередь на выплату</a> @endif

        </td>

    </tr>
@endforeach