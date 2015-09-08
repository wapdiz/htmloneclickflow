@foreach($ticket as $item)
    <li>
        <a href="/tickets/view?id={{$item['params']['ticket_id']}}&readed=1"
            <span class="title">
                {{$item['params']['title']}}
            </span>
            <span class="message">
                {{$item['params']['body']}}
            </span>
        </a>
    </li>
@endforeach