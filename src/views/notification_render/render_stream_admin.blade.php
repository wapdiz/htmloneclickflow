@foreach($stream as $item)
    <li>
        <a href="/admin/stream/view?id={{$item['params']['stream_id']}}&readed=1">
            <span class="title">
                {{$item['text']}}
            </span>
            <span class="message">
                {{$item['params']['text']}}
            </span>
        </a>
    </li>
@endforeach